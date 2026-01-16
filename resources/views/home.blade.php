<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>SP-KETAPANG | Sistem Pakar Ketahanan Pangan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      font-family: Helvetica, Arial, sans-serif;
    }
  </style>
</head>

<body class="bg-emerald-50 text-gray-900">

  <!-- ================= HERO ================= -->
  <section class="bg-emerald-500">
    <div class="max-w-7xl mx-auto px-10 py-24 grid md:grid-cols-2 gap-16 items-center">

      <!-- TEXT -->
      <div class="text-white">
        <p class="uppercase tracking-widest text-sm mb-4 opacity-90">
          SP-KETAPANG | Sistem Pakar
        </p>

        <h1 class="text-5xl font-bold leading-tight mb-6">
          Analisis <br>
          Ketahanan Pangan <br>
          Rumah Tangga
        </h1>

        <p class="text-lg text-emerald-100 max-w-xl mb-8">
          Sistem pakar berbasis aturan untuk membantu mengidentifikasi
          tingkat ketahanan pangan rumah tangga berdasarkan indikator
          ekonomi, konsumsi, dan strategi bertahan pangan.
        </p>

        <a href="/quiz"
          class="inline-flex items-center gap-2 bg-white text-emerald-600 px-8 py-4 rounded-full font-semibold shadow hover:bg-emerald-100 transition">
          Mulai Kuesioner
        </a>
      </div>

      <!-- IMAGE -->
      <div class="relative">
        <!-- Shape -->
        <div class="absolute -top-10 right-10 w-96 h-96 bg-emerald-300 rounded-[60px] rotate-12"></div>

        <img
          src="https://images.unsplash.com/photo-1542838132-92c53300491e"
          class="relative rounded-[40px] shadow-xl w-full h-[520px] object-cover"
          alt="Ilustrasi Rumah Tangga">
      </div>

    </div>
  </section>

  <!-- ================= SECTION 2 ================= -->
  <section class="bg-emerald-50 py-28">
    <div class="max-w-7xl mx-auto px-10 grid md:grid-cols-2 gap-20 items-start">

      <!-- LEFT TEXT -->
      <div>
        <h2 class="text-4xl font-bold leading-tight mb-8">
          Seperti apa <br>
          <span class="inline-block bg-emerald-200 px-3 py-1 rounded-full">
            proses analisis
          </span>
          <br>
          dalam sistem ini?
        </h2>
      </div>

      <!-- RIGHT POINTS -->
      <div class="space-y-10">

        <div class="flex gap-5">
          <div class="w-20 h-11 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold">
            ✓
          </div>
          <div>
            <h4 class="font-semibold text-lg">
              Berbasis Aturan Pakar
            </h4>
            <p class="text-gray-700">
              Sistem menggunakan aturan IF–THEN yang disusun berdasarkan
              indikator ketahanan pangan rumah tangga dari kajian ilmiah.
            </p>
          </div>
        </div>

        <div class="flex gap-5">
          <div class="w-20 h-11 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold">
            ✓
          </div>
          <div>
            <h4 class="font-semibold text-lg">
              Metode Forward Chaining
            </h4>
            <p class="text-gray-700">
              Inferensi dimulai dari fakta jawaban pengguna menuju
              kesimpulan melalui pencocokan rule secara sistematis.
            </p>
          </div>
        </div>

        <div class="flex gap-5">
          <div class="w-20 h-11 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold">
            ✓
          </div>
          <div>
            <h4 class="font-semibold text-lg">
              Certainty Factor (CF)
            </h4>
            <p class="text-gray-700">
              Setiap kesimpulan disertai tingkat keyakinan untuk
              menunjukkan seberapa kuat hasil diagnosis sistem.
            </p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ================= CTA FINAL ================= -->
  <section class="bg-emerald-500 py-24">
    <div class="max-w-7xl mx-auto px-10 grid md:grid-cols-2 gap-16 items-center">

      <!-- IMAGE -->
      <div class="relative">
        <div class="absolute -top-6 -left-6 w-full h-full bg-emerald-300 rounded-[50px]"></div>
        <img
          src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d"
          class="relative rounded-[40px] shadow-xl w-full h-[420px] object-cover"
          alt="Ilustrasi Analisis">
      </div>

      <!-- TEXT -->
      <div class="text-white">
        <h2 class="text-4xl font-bold mb-6">
          Kami siap membantu <br>
          proses analisis Anda
        </h2>

        <p class="text-emerald-100 mb-8 max-w-xl">
          Sistem ini dirancang sebagai alat bantu akademik untuk
          menganalisis ketahanan pangan rumah tangga secara objektif,
          transparan, dan berbasis pengetahuan.
        </p>

        <a href="/quiz"
          class="inline-block bg-white text-emerald-600 px-10 py-4 rounded-full font-semibold shadow hover:bg-emerald-100 transition">
          Mulai Analisis
        </a>
      </div>

    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <x-footer />


</body>

</html>