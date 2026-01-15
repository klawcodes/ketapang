<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Kuesioner Ketahanan Pangan | SP-KETAPANG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

  <!-- HEADER -->
  <header class="bg-green-700 text-white py-10">
    <div class="max-w-5xl mx-auto px-6">
      <h1 class="text-3xl font-bold mb-2">
        Kuesioner Ketahanan Pangan Rumah Tangga
      </h1>
      <p class="text-green-100">
        Silakan jawab pertanyaan berikut sesuai dengan kondisi rumah tangga Anda.
      </p>
    </div>
  </header>

  <!-- FORM -->
  <main class="py-12">
    <div class="max-w-3xl mx-auto px-6">
      <div class="bg-white shadow-md rounded-xl p-8">

        <form method="POST" action="/kuesioner/proses">
          @csrf

          @foreach($questions as $q)
          <div class="mb-6">
            <label class="block font-semibold mb-2">
              {{ $loop->iteration }}. {{ $q->pertanyaan }}
            </label>

            <select
              name="{{ $q->kode }}"
              required
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
              <option value="">-- Pilih Jawaban --</option>

              @if($q->kode == 'pendapatan')
              <option value="RENDAH">Rendah</option>
              <option value="CUKUP">Cukup</option>
              <option value="TINGGI">Tinggi</option>

              @elseif($q->kode == 'pangsa_pangan')
              <option value="TINGGI">≥ 60%</option>
              <option value="RENDAH">&lt; 60%</option>

              @elseif($q->kode == 'pengeluaran_pangan')
              <option value="TINGGI">Tinggi</option>
              <option value="RENDAH">Rendah</option>

              @elseif($q->kode == 'konsumsi')
              <option value="RENDAH">Rendah</option>
              <option value="CUKUP">Cukup</option>

              @elseif($q->kode == 'energi' || $q->kode == 'protein')
              <option value="KURANG">Kurang</option>
              <option value="CUKUP">Cukup</option>

              @elseif($q->kode == 'anggota')
              <option value="SEDIKIT">Sedikit (≤ 4 orang)</option>
              <option value="BANYAK">Banyak (&gt; 4 orang)</option>

              @elseif($q->kode == 'coping')
              <option value="RENDAH">Rendah</option>
              <option value="SEDANG">Sedang</option>
              <option value="TINGGI">Tinggi</option>

              @elseif($q->kode == 'frekuensi_makan')
              <option value="CUKUP">≥ 3 kali sehari</option>
              <option value="KURANG">&lt; 3 kali sehari</option>

              @elseif($q->kode == 'cadangan_pangan')
              <option value="ADA">Ada</option>
              <option value="TIDAK">Tidak Ada</option>

              @elseif($q->kode == 'akses_pangan')
              <option value="MUDAH">Mudah</option>
              <option value="SULIT">Sulit</option>

              @elseif($q->kode == 'bantuan')
              <option value="ADA">Ya</option>
              <option value="TIDAK">Tidak</option>
              @endif
            </select>
          </div>
          @endforeach

          <!-- SUBMIT -->
          <div class="mt-8 text-center">
            <button
              type="submit"
              class="bg-green-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-800 transition">
              Proses Analisis
            </button>
          </div>
        </form>

      </div>

      <!-- BACK LINK -->
      <div class="text-center mt-6">
        <a href="/" class="text-green-700 hover:underline text-sm">
          ← Kembali ke Beranda
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