<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Fact;
use App\Models\Rule;
use Illuminate\Http\Request;

class PakarController extends Controller
{
  /**
   * Bobot preferensi tingkat ketahanan pangan
   * (BUKAN ranking mutlak)
   */
  private const SEVERITY_WEIGHT = [
    'Tahan Pangan'        => 0.4,
    'Rentan Pangan'       => 0.6,
    'Rawan Pangan Sedang' => 0.8,
    'Rawan Pangan Berat'  => 1.0,
  ];

  // =========================
  // 1️⃣ KUESIONER
  // =========================
  public function kuesioner()
  {
    $questions = Question::all();

    $opsiJawaban = [
      'pendapatan' => [
        'RENDAH' => 'Rendah',
        'CUKUP'  => 'Cukup',
        'TINGGI' => 'Tinggi',
      ],
      'pangsa_pangan' => [
        'TINGGI' => '≥ 60%',
        'RENDAH' => '< 60%',
      ],
      'pengeluaran_pangan' => [
        'TINGGI' => 'Tinggi',
        'RENDAH' => 'Rendah',
      ],
      'konsumsi' => [
        'RENDAH' => 'Rendah',
        'CUKUP'  => 'Cukup',
      ],
      'energi' => [
        'KURANG' => 'Kurang',
        'CUKUP'  => 'Cukup',
      ],
      'protein' => [
        'KURANG' => 'Kurang',
        'CUKUP'  => 'Cukup',
      ],
      'anggota' => [
        'SEDIKIT' => 'Sedikit (≤ 4 orang)',
        'BANYAK'  => 'Banyak (> 4 orang)',
      ],
      'coping' => [
        'RENDAH' => 'Rendah',
        'SEDANG' => 'Sedang',
        'TINGGI' => 'Tinggi',
      ],
      'frekuensi_makan' => [
        'CUKUP'  => '≥ 3 kali sehari',
        'KURANG' => '< 3 kali sehari',
      ],
      'cadangan_pangan' => [
        'ADA'   => 'Ada',
        'TIDAK' => 'Tidak Ada',
      ],
      'akses_pangan' => [
        'MUDAH' => 'Mudah',
        'SULIT' => 'Sulit',
      ],
      'bantuan' => [
        'ADA'   => 'Ya',
        'TIDAK' => 'Tidak',
      ],
    ];

    return view('kuesioner', compact('questions', 'opsiJawaban'));
  }

  // =========================
  // 2️⃣ SIMPAN JAWABAN
  // =========================
  public function simpanJawaban(Request $request)
  {
    $sessionId = session()->getId();
    Fact::where('session_id', $sessionId)->delete();

    foreach ($request->except('_token') as $kode => $nilai) {
      Fact::create([
        'session_id' => $sessionId,
        'kode'       => $kode,
        'nilai'      => $nilai
      ]);
    }

    return redirect('/hasil');
  }

  // =========================
  // 3️⃣ INFERENSI (FINAL)
  // =========================
  public function inferensi()
  {
    $sessionId = session()->getId();

    $facts = Fact::where('session_id', $sessionId)
      ->pluck('nilai', 'kode')
      ->toArray();

    if (empty($facts)) {
      return redirect('/')
        ->with('error', 'Silakan isi kuesioner terlebih dahulu.');
    }

    // Rule paling spesifik diproses dulu
    $rules = Rule::all()->sortByDesc(
      fn($r) => count(explode(',', $r->kondisi))
    );

    $cfKesimpulan = [];
    $detailRuleAktif = [];
    $prosesCF = [];

    foreach ($rules as $rule) {

      // Cek kecocokan rule
      $kondisi = explode(',', $rule->kondisi);
      $cocok = true;

      foreach ($kondisi as $k) {
        [$key, $val] = explode('=', trim($k));
        if (($facts[$key] ?? null) !== $val) {
          $cocok = false;
          break;
        }
      }

      if (!$cocok) continue;

      $k = $rule->kesimpulan;
      $cfRule = $rule->cf ?? 0.5;

      // 🔥 Proses CF (TIDAK dobel)
      if (!isset($cfKesimpulan[$k])) {
        $cfKesimpulan[$k] = $cfRule;
        $prosesCF[$k][] = [
          'step' => 1,
          'cf_old' => null,
          'cf_new' => $cfRule,
          'hasil' => $cfRule
        ];
      } else {
        $cfLama = $cfKesimpulan[$k];
        $cfBaru = $cfLama + ($cfRule * (1 - $cfLama));
        $cfKesimpulan[$k] = $cfBaru;

        $prosesCF[$k][] = [
          'step' => count($prosesCF[$k]) + 1,
          'cf_old' => $cfLama,
          'cf_new' => $cfRule,
          'hasil' => $cfBaru
        ];
      }
      // 1. Filter dengan threshold minimal (misal 20%)
      $threshold = 0.20;
      foreach ($cfKesimpulan as $k => $cf) {
        if ($cf < $threshold) {
          unset($cfKesimpulan[$k]);
        }
      }

      // 2. Jika masih ada multiple high CF, pilih yang paling parah
      if (!empty($cfKesimpulan)) {
        // Urutkan: pertama berdasarkan CF, jika sama berdasarkan severity
        uksort($cfKesimpulan, function ($a, $b) use ($cfKesimpulan) {
          // Toleransi perbedaan kecil (0.5%)
          if (abs($cfKesimpulan[$a] - $cfKesimpulan[$b]) < 0.005) {
            // Prioritaskan yang lebih parah
            $severityOrder = [
              'Rawan Pangan Berat' => 4,
              'Rawan Pangan Sedang' => 3,
              'Rentan Pangan' => 2,
              'Tahan Pangan' => 1
            ];
            return ($severityOrder[$b] ?? 0) <=> ($severityOrder[$a] ?? 0);
          }
          return $cfKesimpulan[$b] <=> $cfKesimpulan[$a];
        });

        $kesimpulan = array_key_first($cfKesimpulan);
        $confidence = number_format($cfKesimpulan[$kesimpulan] * 100, 2);
      } else {
        $kesimpulan = 'Tidak Diketahui';
        $confidence = 0;
      }

      $detailRuleAktif[] = [
        'rule_id'    => $rule->id,
        'kondisi'    => $rule->kondisi,
        'kesimpulan' => $k,
        'cf_rule'    => $cfRule
      ];
    }

    // =========================
    // 🔥 SKOR AKHIR (CF × BOBOT)
    // =========================
    $skorAkhir = $cfKesimpulan;  // Tidak dikali bobot


    // ✅ RANKING BERDASARKAN SKOR AKHIR (sudah termasuk bobot)
    arsort($skorAkhir);

    // ✅ KESIMPULAN = kategori dengan skor akhir tertinggi
    $kesimpulan = array_key_first($skorAkhir);
    $confidence = number_format(($skorAkhir[$kesimpulan] ?? 0) * 100, 2);

    // ✅ Pastikan CF Kesimpulan juga diurutkan untuk konsistensi
    arsort($cfKesimpulan);

    // Narasi
    $narasi = $this->narasiKesimpulan($kesimpulan);

    return view('hasil', compact(
      'kesimpulan',
      'confidence',
      'narasi',
      'cfKesimpulan',
      'skorAkhir',  // ✅ Sudah terurut
      'detailRuleAktif',
      'prosesCF'
    ));
  }

  // =========================
  // 4️⃣ NARASI
  // =========================
  private function narasiKesimpulan($kesimpulan)
  {
    return match ($kesimpulan) {
      'Tahan Pangan' =>
      "Rumah tangga dikategorikan tahan pangan karena memiliki kondisi ekonomi dan konsumsi yang relatif baik.",

      'Rentan Pangan' =>
      "Rumah tangga dikategorikan rentan pangan karena terdapat potensi kerentanan dalam pemenuhan pangan.",

      'Rawan Pangan Sedang' =>
      "Rumah tangga dikategorikan rawan pangan tingkat sedang karena terdapat keterbatasan dalam pemenuhan kebutuhan pangan.",

      'Rawan Pangan Berat' =>
      "Rumah tangga dikategorikan rawan pangan berat karena mengalami keterbatasan serius dalam pemenuhan kebutuhan pangan.",

      default =>
      "Sistem belum dapat menentukan tingkat ketahanan pangan rumah tangga."
    };
  }
}
