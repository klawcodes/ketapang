<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Hasil Analisis | SP-KETAPANG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- HEADER -->
  <header class="bg-green-700 text-white py-10">
    <div class="max-w-5xl mx-auto px-6">
      <h1 class="text-3xl font-bold mb-2">
        Hasil Analisis Ketahanan Pangan
      </h1>
      <p class="text-green-100">
        Berikut merupakan hasil analisis berdasarkan jawaban kuesioner yang diberikan.
      </p>
    </div>
  </header>

  <!-- CONTENT -->
  <main class="py-12">
    <div class="max-w-3xl mx-auto px-6 space-y-8">

      <!-- HASIL UTAMA -->
      <div class="bg-white shadow-md rounded-xl p-8 text-center">
        <h2 class="text-xl font-semibold mb-4">
          Kesimpulan Sistem Pakar
        </h2>

        <p class="text-3xl font-bold text-green-700 mb-2">
          {{ $kesimpulan }}
        </p>

        <p class="text-gray-600">
          Tingkat Keyakinan Sistem (Certainty Factor)
        </p>

        <p class="text-2xl font-semibold mt-2">
          {{ $confidence }}%
        </p>
      </div>

      <!-- PENJELASAN -->
      <div class="bg-white shadow-md rounded-xl p-8">
        <h3 class="text-xl font-semibold mb-4">
          Penjelasan Hasil
        </h3>

        <p class="text-gray-700 leading-relaxed text-justify">
          {{ $narasi }}
        </p>
      </div>

      <!-- ACTION BUTTON -->
      <div class="flex flex-col md:flex-row gap-4 justify-center">
        <a
          href="/quiz"
          class="bg-green-700 text-white px-6 py-3 rounded-lg text-center font-semibold hover:bg-green-800 transition">
          Ulangi Kuesioner
        </a>

        <a
          href="/"
          class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg text-center font-semibold hover:bg-gray-300 transition">
          Kembali ke Beranda
        </a>
      </div>

    </div>
  </main>

  <!-- FOOTER -->
  <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
    <div class="max-w-5xl mx-auto px-6 text-center text-sm">
      © {{ date('Y') }} SP-KETAPANG — Sistem Pakar Ketahanan Pangan Rumah Tangga
    </div>
  </footer>

</body>

</html>