<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Kuesioner | SP-KETAPANG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

  <div class="max-w-3xl mx-auto px-6 py-12">

    <!-- HEADER -->
    <div class="text-center mb-10">
      <h1 class="text-3xl font-bold text-green-700 mb-2">
        Kuesioner Ketahanan Pangan
      </h1>
      <p class="text-gray-600">
        Jawab pertanyaan berikut sesuai kondisi rumah tangga Anda
      </p>
    </div>

    <!-- PROGRESS -->
    <div class="mb-8">
      <div class="flex justify-between text-sm text-gray-600 mb-2">
        <span id="progressText">Pertanyaan 1 / {{ count($questions) }}</span>
        <span>{{ count($questions) }} Pertanyaan</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2">
        <div id="progressBar"
          class="bg-green-600 h-2 rounded-full transition-all duration-300"
          style="width: {{ 100 / count($questions) }}%">
        </div>
      </div>
    </div>

    <!-- FORM -->
    <form action="{{ url('/kuesioner/proses') }}" method="POST" id="quizForm">
      @csrf

      @foreach ($questions as $index => $q)
      <div class="question-step {{ $index === 0 ? '' : 'hidden' }}"
        data-step="{{ $index + 1 }}">

        <!-- PERTANYAAN -->
        <h2 class="text-2xl font-semibold mb-6">
          {{ $index + 1 }}. {{ $q->pertanyaan }}
        </h2>

        <!-- OPSI -->
        <!-- OPSI -->
        <div class="space-y-4">
          @foreach($opsiJawaban[$q->kode] ?? [] as $value => $label)
          <label
            class="flex items-center gap-4 p-4 border border-gray-300 rounded-xl
             cursor-pointer transition-all
             hover:border-green-500 hover:bg-green-50
             active:scale-[0.99]">

            <input
              type="radio"
              name="{{ $q->kode }}"
              value="{{ $value }}"
              required
              class="peer hidden">

            <!-- RADIO BULAT -->
            <div
              class="w-5 h-5 rounded-full
              bg-gray-200
              transition-all
              peer-checked:bg-green-600
              peer-checked:scale-110">
              <div
                class="w-3 h-3 rounded-full bg-green-600 hidden
                 peer-checked:block"></div>
            </div>

            <!-- TEKS -->
            <span class="text-gray-800 text-base">
              {{ $label }}
            </span>
          </label>
          @endforeach
        </div>




      </div>
      @endforeach

      <!-- NAVIGATION -->
      <!-- NAVIGATION -->
      <div class="flex flex-col gap-4 mt-10">

        <!-- NAV STEP -->
        <div class="flex justify-between">
          <button type="button"
            id="prevBtn"
            class="px-6 py-3 rounded-lg border border-gray-300
             text-gray-600 hover:bg-gray-100 hidden">
            Kembali
          </button>

          <button type="button"
            id="nextBtn"
            class="ml-auto px-6 py-3 rounded-lg
             bg-green-700 text-white
             hover:bg-green-800">
            Selanjutnya
          </button>

          <button type="submit"
            id="submitBtn"
            class="ml-auto px-6 py-3 rounded-lg
             bg-green-700 text-white
             hover:bg-green-800 hidden">
            Lihat Hasil
          </button>
        </div>

        <!-- BACK TO HOME -->
        <div class="text-center">
          <a href="{{ url('/') }}"
            class="inline-flex items-center gap-2
             text-sm text-gray-500 hover:text-green-700
             transition">
            ← Kembali ke Beranda
          </a>
        </div>

      </div>

    </form>

  </div>
  <x-footer />


  <!-- SCRIPT STEP -->
  <script>
    const steps = document.querySelectorAll('.question-step');
    const totalSteps = steps.length;
    let currentStep = 0;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressText = document.getElementById('progressText');
    const progressBar = document.getElementById('progressBar');

    function updateUI() {
      steps.forEach((step, index) => {
        step.classList.toggle('hidden', index !== currentStep);
      });

      progressText.innerText = `Pertanyaan ${currentStep + 1} / ${totalSteps}`;
      progressBar.style.width = `${((currentStep + 1) / totalSteps) * 100}%`;

      prevBtn.classList.toggle('hidden', currentStep === 0);
      nextBtn.classList.toggle('hidden', currentStep === totalSteps - 1);
      submitBtn.classList.toggle('hidden', currentStep !== totalSteps - 1);
    }

    nextBtn.addEventListener('click', () => {
      const currentQuestion = steps[currentStep];
      const checked = currentQuestion.querySelector('input[type="radio"]:checked');

      if (!checked) {
        alert('Silakan pilih salah satu jawaban.');
        return;
      }

      currentStep++;
      updateUI();
    });



    prevBtn.addEventListener('click', () => {
      currentStep--;
      updateUI();
    });
  </script>


</body>

</html>