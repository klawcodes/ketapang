<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>SP-KETAPANG | Sistem Pakar Ketahanan Pangan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- HERO -->
  <section class="bg-green-700 text-white py-20">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">
        SP-KETAPANG
      </h1>
      <p class="text-xl md:text-2xl mb-6">
        Sistem Pakar Ketahanan Pangan Rumah Tangga
      </p>
      <p class="max-w-3xl mx-auto text-green-100">
        Sistem berbasis pengetahuan untuk membantu mengidentifikasi tingkat ketahanan pangan rumah tangga
        berdasarkan indikator ekonomi, konsumsi, dan strategi bertahan pangan.
      </p>
    </div>
  </section>

  <!-- WHY -->
  <section class="py-16">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl font-semibold mb-6 text-center">
        Mengapa Ketahanan Pangan Penting?
      </h2>
      <p class="text-lg leading-relaxed text-gray-700 text-justify">
        Ketahanan pangan merupakan kondisi terpenuhinya kebutuhan pangan bagi rumah tangga yang tercermin
        dari ketersediaan pangan yang cukup, akses yang memadai, serta pemanfaatan pangan yang optimal.
        Ketahanan pangan yang baik berperan penting dalam menjaga kesehatan, produktivitas, dan kesejahteraan
        masyarakat, terutama pada tingkat rumah tangga sebagai unit terkecil dalam sistem pangan nasional.
      </p>
    </div>
  </section>

  <!-- ABOUT SYSTEM -->
  <section class="bg-white py-16">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl font-semibold mb-6 text-center">
        Tentang Sistem Pakar SP-KETAPANG
      </h2>
      <p class="text-lg leading-relaxed text-gray-700 text-justify mb-4">
        SP-KETAPANG merupakan sistem pakar berbasis aturan (rule-based expert system) yang dirancang untuk
        menganalisis tingkat ketahanan pangan rumah tangga. Sistem ini menggunakan metode <strong>Forward Chaining</strong>
        dan pendekatan <strong>Certainty Factor (CF)</strong> untuk menentukan kesimpulan beserta tingkat keyakinannya.
      </p>
      <p class="text-lg leading-relaxed text-gray-700 text-justify">
        Dengan memanfaatkan jawaban pengguna terhadap sejumlah pertanyaan kunci, sistem ini mampu memberikan
        hasil diagnosis yang disertai penjelasan secara sistematis dan mudah dipahami.
      </p>
    </div>
  </section>

  <!-- DISCLAIMER -->
  <section class="bg-gray-100 py-16">
    <div class="max-w-5xl mx-auto px-6">
      <h2 class="text-3xl font-semibold mb-6 text-center text-red-700">
        Disclaimer
      </h2>
      <p class="text-lg leading-relaxed text-gray-700 text-justify mb-4">
        Pengetahuan yang digunakan dalam sistem pakar ini diperoleh dari kajian literatur dan
        beberapa jurnal ilmiah nasional maupun internasional yang membahas ketahanan pangan rumah tangga.
        Aturan dan nilai keyakinan dalam sistem disusun berdasarkan interpretasi terhadap indikator
        ketahanan pangan yang umum digunakan dalam penelitian akademik.
      </p>
      <p class="text-lg leading-relaxed text-gray-700 text-justify">
        Hasil diagnosis yang diberikan oleh sistem ini bersifat sebagai <strong>alat bantu pengambilan keputusan</strong>
        dan tidak dimaksudkan sebagai pengganti penilaian ahli atau kebijakan resmi pemerintah.
      </p>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-16">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-semibold mb-4">
        Mulai Analisis Ketahanan Pangan
      </h2>
      <p class="text-lg text-gray-700 mb-6">
        Lakukan analisis ketahanan pangan rumah tangga dengan menjawab beberapa pertanyaan sederhana.
      </p>
      <a href=" /quiz" class="inline-block bg-green-700 text-white px-8 py-3 rounded-lg shadow hover:bg-green-800 transition">
        Mulai Kuesioner
      </a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-gray-800 text-gray-300 py-6">
    <div class="max-w-5xl mx-auto px-6 text-center text-sm">
      © {{ date('Y') }} SP-KETAPANG — Muhammad Dimas under Sumpah Mati Exclusive Agreements.
    </div>
  </footer>

</body>

</html>