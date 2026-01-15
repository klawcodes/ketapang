<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Fact;
use App\Models\Rule;
use Illuminate\Http\Request;

class PakarController extends Controller
{
  // 1️⃣ KUESIONER
  public function kuesioner()
  {
    $questions = Question::all();
    return view('kuesioner', compact('questions'));
  }

  // 2️⃣ SIMPAN JAWABAN
  public function simpanJawaban(Request $request)
  {
    Fact::truncate();

    foreach ($request->except('_token') as $kode => $nilai) {
      Fact::create([
        'kode' => $kode,
        'nilai' => $nilai
      ]);
    }

    return redirect('/hasil');
  }

  // 3️⃣ INFERENSI (MESIN PAKAR)
  public function inferensi()
  {
    // 1️⃣ Ambil fakta dari database
    $facts = Fact::all()->pluck('nilai', 'kode')->toArray();

    // 2️⃣ Ambil semua rule + CF
    $rules = Rule::all();

    // 3️⃣ Penampung CF per kesimpulan
    $cfKesimpulan = [];

    foreach ($rules as $rule) {
      $kondisi = explode(',', $rule->kondisi);
      $cocok = true;

      // 4️⃣ Cek kecocokan rule
      foreach ($kondisi as $k) {
        [$key, $value] = explode('=', $k);

        if (!isset($facts[$key]) || $facts[$key] !== $value) {
          $cocok = false;
          break;
        }
      }

      // 5️⃣ Jika rule terpenuhi
      if ($cocok) {
        $cfRule = $rule->cf;          // CF pakar
        $kesimpulan = $rule->kesimpulan;

        // 6️⃣ Gabungkan CF jika kesimpulan sama
        if (!isset($cfKesimpulan[$kesimpulan])) {
          $cfKesimpulan[$kesimpulan] = $cfRule;
        } else {
          $cfKesimpulan[$kesimpulan] =
            $cfKesimpulan[$kesimpulan]
            + ($cfRule * (1 - $cfKesimpulan[$kesimpulan]));
        }
      }
    }

    // 7️⃣ Tentukan kesimpulan akhir
    if (count($cfKesimpulan) > 0) {
      arsort($cfKesimpulan);

      $kesimpulan = array_key_first($cfKesimpulan);
      $confidence = min(round($cfKesimpulan[$kesimpulan] * 100, 2), 99.9);
    } else {
      $kesimpulan = 'Tidak dapat ditentukan';
      $confidence = 0;
    }

    // 8️⃣ Narasi penjelasan
    $narasi = $this->narasiKesimpulan($kesimpulan);

    return view('hasil', compact(
      'kesimpulan',
      'confidence',
      'narasi',
      'cfKesimpulan'
    ));
  }
  // 🔥 POIN 1 DIDEFINISIKAN DI SINI
  private function narasiKesimpulan($kesimpulan)
  {
    if ($kesimpulan === 'Tahan Pangan') {
      return "Rumah tangga dikategorikan tahan pangan karena memiliki kondisi ekonomi dan konsumsi yang relatif baik. Pendapatan rumah tangga mencukupi kebutuhan pangan, pola konsumsi sudah sesuai kebutuhan energi dan protein, serta tidak ditemukan strategi bertahan pangan.";
    }

    if ($kesimpulan === 'Rentan Pangan') {
      return "Rumah tangga dikategorikan rentan pangan karena terdapat potensi kerentanan dalam pemenuhan pangan, meskipun belum berada pada kondisi rawan. Kondisi ini menunjukkan perlunya perhatian terhadap kestabilan pangan rumah tangga.";
    }

    if ($kesimpulan === 'Rawan Pangan Sedang') {
      return "Rumah tangga dikategorikan rawan pangan tingkat sedang karena terdapat keterbatasan dalam pemenuhan kebutuhan pangan. Pendapatan dan pola konsumsi yang belum optimal menunjukkan adanya tekanan terhadap ketahanan pangan.";
    }

    if ($kesimpulan === 'Rawan Pangan Berat') {
      return "Rumah tangga dikategorikan rawan pangan berat karena mengalami keterbatasan serius dalam pemenuhan kebutuhan pangan. Kondisi ini ditandai dengan rendahnya pendapatan, keterbatasan konsumsi, dan tingginya strategi bertahan pangan.";
    }

    return "Sistem belum dapat menentukan tingkat ketahanan pangan rumah tangga berdasarkan data yang dimasukkan.";
  }
}
