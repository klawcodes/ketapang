<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Hasil Analisis | SP-KETAPANG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-100 via-white to-green-50 min-h-screen text-gray-800">

  <!-- HEADER -->
  <header class="bg-gradient-to-r from-green-700 to-green-500 text-white py-12">
    <div class="max-w-6xl mx-auto px-6">
      <h1 class="text-3xl font-bold mb-2">
        Hasil Analisis Ketahanan Pangan
      </h1>
      <p class="text-green-100">
        Berikut merupakan hasil analisis berdasarkan jawaban kuesioner yang diberikan.
      </p>
    </div>
  </header>

  <!-- CONTENT -->
  <main class="py-16">
    <div class="max-w-5xl mx-auto px-6 space-y-10">

      @php
      $ranking = collect($skorAkhir)
      ->sortDesc()
      ->map(fn($v) => number_format($v * 100, 2))
      ->toArray();

      $labels = array_keys($ranking);
      $values = array_values($ranking);
      @endphp

      <!-- PODIUM -->
      <div class="bg-white rounded-3xl shadow-xl p-10">
        <h2 class="text-xl font-semibold text-center mb-10">
          Kesimpulan Sistem Pakar
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">

          <!-- RANK 2 -->
          @if(isset($labels[1]) && count($labels) >= 3)
          <div class="text-center">
            <div class="bg-green-100 rounded-2xl py-8">
              <p class="text-4xl font-bold text-green-700">2</p>
              <p class="font-semibold mt-3">{{ $labels[1] }}</p>
              <p class="text-sm text-gray-600">{{ $values[1] }}%</p>
            </div>
          </div>
          @endif

          <!-- RANK 1 -->
          <div class="text-center scale-105">
            <div class="bg-gradient-to-br from-green-600 to-green-400 text-white rounded-3xl py-12 shadow-lg">
              <p class="text-5xl font-extrabold">1</p>
              <p class="text-lg font-bold mt-4">{{ $labels[0] }}</p>
              <p class="text-base opacity-90 mt-1">{{ $values[0] }}%</p>
            </div>
          </div>

          <!-- RANK 3 -->
          @if(isset($labels[2]))
          <div class="text-center">
            <div class="bg-green-100 rounded-2xl py-8">
              <p class="text-4xl font-bold text-green-700">3</p>
              <p class="font-semibold mt-3">{{ $labels[2] }}</p>
              <p class="text-sm text-gray-600">{{ $values[2] }}%</p>
            </div>
          </div>
          @endif

        </div>
      </div>

      <!-- Tambahkan peringatan jika ada ambiguitas -->
      @php
      // Hitung selisih antara peringkat 1 dan 2
      $selisih = isset($values[1]) ? ($values[0] - $values[1]) : 0;
      @endphp

      @if($selisih < 5) {{-- Jika selisih kurang dari 5% --}}
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
        <div class="flex">
          <div class="flex-shrink-0">
            <i class="fas fa-exclamation-triangle text-yellow-400"></i>
          </div>
          <div class="ml-3">
            <p class="text-sm text-yellow-700">
              <strong>Perhatian:</strong> Hasil analisis menunjukkan beberapa kategori dengan tingkat keyakinan yang hampir sama.
              Sistem memilih <strong>{{ $labels[0] }}</strong> sebagai kesimpulan utama berdasarkan tingkat keyakinan tertinggi.
            </p>
          </div>
        </div>
    </div>
    @endif

    <!-- DETAIL PROGRESS -->
    <div class="bg-white rounded-3xl shadow-xl p-10">
      <h3 class="text-lg font-semibold mb-6">
        Tingkat Keyakinan Setiap Kesimpulan
      </h3>

      <div class="space-y-5">
        @foreach($ranking as $label => $val)
        <div>
          <div class="flex justify-between mb-1 text-sm font-medium">
            <span>{{ $label }}</span>
            <span>{{ $val }}%</span>
          </div>
          <div class="w-full bg-green-100 rounded-full h-3 overflow-hidden">
            <div
              class="bg-gradient-to-r from-green-500 to-green-400 h-3 rounded-full transition-all duration-700"
              style="width: {{ $val }}%">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <!-- NARASI -->
    <div class="bg-white rounded-3xl shadow-xl p-10 text-gray-700 leading-relaxed text-justify">
      {{ $narasi }}
    </div>

    <!-- ACTION -->
    <div class="flex flex-col md:flex-row gap-4 justify-center">
      <a href="/quiz"
        class="bg-green-600 text-white px-8 py-4 rounded-xl text-center font-semibold hover:bg-green-700 transition">
        Ulangi Kuesioner
      </a>

      <a href="/"
        class="bg-gray-200 text-gray-800 px-8 py-4 rounded-xl text-center font-semibold hover:bg-gray-300 transition">
        Kembali ke Beranda
      </a>
    </div>

    </div>
  </main>

  <!-- FOOTER -->
  <x-footer />


</body>

</html>