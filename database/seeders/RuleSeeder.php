<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
  public function run(): void
  {
    $rules = [

      // EKONOMI
      ['kode_rule' => 'R1', 'kondisi' => 'pendapatan=RENDAH,pangsa_pangan=TINGGI', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R2', 'kondisi' => 'pendapatan=RENDAH,pengeluaran_pangan=TINGGI', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R3', 'kondisi' => 'pendapatan=CUKUP,pangsa_pangan=RENDAH', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R4', 'kondisi' => 'pendapatan=RENDAH', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R5', 'kondisi' => 'pendapatan=RENDAH,anggota=BANYAK', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R6', 'kondisi' => 'pendapatan=CUKUP,anggota=SEDIKIT', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R7', 'kondisi' => 'pendapatan=RENDAH,pengeluaran_pangan=RENDAH', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R8', 'kondisi' => 'pendapatan=TINGGI', 'kesimpulan' => 'Tahan Pangan'],

      // POLA KONSUMSI
      ['kode_rule' => 'R9', 'kondisi' => 'konsumsi=RENDAH', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R10', 'kondisi' => 'konsumsi=CUKUP', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R11', 'kondisi' => 'energi=KURANG,protein=KURANG', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R12', 'kondisi' => 'energi=KURANG', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R13', 'kondisi' => 'protein=KURANG', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R14', 'kondisi' => 'energi=CUKUP,protein=CUKUP', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R15', 'kondisi' => 'frekuensi_makan=KURANG', 'kesimpulan' => 'Rawan Pangan Berat'],

      // JUMLAH ANGGOTA
      ['kode_rule' => 'R16', 'kondisi' => 'anggota=BANYAK,pendapatan=RENDAH', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R17', 'kondisi' => 'anggota=BANYAK', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R18', 'kondisi' => 'anggota=SEDIKIT,pendapatan=CUKUP', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R19', 'kondisi' => 'anggota=SEDIKIT', 'kesimpulan' => 'Rentan Pangan'],

      // COPING STRATEGIES
      ['kode_rule' => 'R20', 'kondisi' => 'coping=TINGGI', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R21', 'kondisi' => 'coping=SEDANG', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R22', 'kondisi' => 'coping=RENDAH', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R23', 'kondisi' => 'coping=TINGGI,frekuensi_makan=KURANG', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R24', 'kondisi' => 'coping=SEDANG,konsumsi=RENDAH', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R25', 'kondisi' => 'coping=RENDAH,konsumsi=CUKUP', 'kesimpulan' => 'Tahan Pangan'],

      // AKSES & STABILITAS
      ['kode_rule' => 'R26', 'kondisi' => 'cadangan_pangan=TIDAK', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R27', 'kondisi' => 'cadangan_pangan=ADA', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R28', 'kondisi' => 'akses_pangan=SULIT', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R29', 'kondisi' => 'akses_pangan=MUDAH', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R30', 'kondisi' => 'bantuan=ADA,konsumsi=CUKUP', 'kesimpulan' => 'Rentan Pangan'],

      // KOMBINASI
      ['kode_rule' => 'R31', 'kondisi' => 'pendapatan=RENDAH,coping=TINGGI,konsumsi=RENDAH', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R32', 'kondisi' => 'pendapatan=CUKUP,coping=RENDAH,konsumsi=CUKUP', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R33', 'kondisi' => 'pangsa_pangan=TINGGI,frekuensi_makan=KURANG', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R34', 'kondisi' => 'pendapatan=RENDAH,coping=SEDANG', 'kesimpulan' => 'Rawan Pangan Sedang'],
      ['kode_rule' => 'R35', 'kondisi' => 'pendapatan=CUKUP,coping=SEDANG', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R36', 'kondisi' => 'konsumsi=CUKUP,coping=RENDAH', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R37', 'kondisi' => 'anggota=BANYAK,coping=TINGGI', 'kesimpulan' => 'Rawan Pangan Berat'],
      ['kode_rule' => 'R38', 'kondisi' => 'pendapatan=TINGGI,coping=RENDAH', 'kesimpulan' => 'Tahan Pangan'],
      ['kode_rule' => 'R39', 'kondisi' => 'bantuan=ADA,pengeluaran_pangan=TINGGI', 'kesimpulan' => 'Rentan Pangan'],
      ['kode_rule' => 'R40', 'kondisi' => 'bantuan=TIDAK,pengeluaran_pangan=TINGGI', 'kesimpulan' => 'Rawan Pangan Sedang'],
    ];

    Rule::insert($rules);
  }
}
