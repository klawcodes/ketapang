<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
  public function run(): void
  {
    $questions = [

      // EKONOMI
      [
        'kode' => 'pendapatan',
        'pertanyaan' => 'Bagaimana tingkat pendapatan rumah tangga Anda?'
      ],
      [
        'kode' => 'pangsa_pangan',
        'pertanyaan' => 'Bagaimana proporsi pengeluaran pangan dibandingkan total pengeluaran rumah tangga?'
      ],
      [
        'kode' => 'pengeluaran_pangan',
        'pertanyaan' => 'Bagaimana tingkat pengeluaran pangan rumah tangga per bulan?'
      ],

      // KONSUMSI & GIZI
      [
        'kode' => 'konsumsi',
        'pertanyaan' => 'Bagaimana tingkat pola konsumsi pangan rumah tangga secara umum?'
      ],
      [
        'kode' => 'energi',
        'pertanyaan' => 'Apakah konsumsi energi (kalori) rumah tangga sudah mencukupi kebutuhan?'
      ],
      [
        'kode' => 'protein',
        'pertanyaan' => 'Apakah konsumsi protein rumah tangga sudah mencukupi kebutuhan?'
      ],

      // see家庭
      [
        'kode' => 'anggota',
        'pertanyaan' => 'Bagaimana jumlah anggota keluarga dalam rumah tangga?'
      ],

      // COPING STRATEGIES
      [
        'kode' => 'coping',
        'pertanyaan' => 'Seberapa sering rumah tangga melakukan strategi bertahan pangan (mengurangi porsi, melewatkan makan, dll)?'
      ],

      // STABILITAS
      [
        'kode' => 'frekuensi_makan',
        'pertanyaan' => 'Bagaimana frekuensi makan anggota rumah tangga dalam sehari?'
      ],
      [
        'kode' => 'cadangan_pangan',
        'pertanyaan' => 'Apakah rumah tangga memiliki cadangan pangan untuk beberapa hari ke depan?'
      ],

      // AKSES
      [
        'kode' => 'akses_pangan',
        'pertanyaan' => 'Bagaimana kemudahan akses rumah tangga terhadap pangan (pasar/toko)?'
      ],

      // BANTUAN SOSIAL
      [
        'kode' => 'bantuan',
        'pertanyaan' => 'Apakah rumah tangga menerima bantuan sosial pangan dari pemerintah?'
      ],

    ];

    Question::insert($questions);
  }
}
