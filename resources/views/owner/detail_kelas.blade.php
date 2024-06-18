@include('htmlhead')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas</title>

  <!-- font awsome -->
  <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

  <!-- google font for icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">


  <div class="flex flex-col bg-white dark:dark-mode">
    <main class="flex flex-col self-center w-full px-8 sm:px-16 lg:px-20 my-4 md:my-12">
      <div class="flex items-center gap-6 mb-12">
          <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left rounded-full bg-white p-3 drop-shadow-regularShadow dark:bg-[#313A49]"></i></a>

          <p class="font-semibold text-subtitle">Detail Kelas</p>
      </div>
      
      <section class="flex gap-5 justify-between px-0.5 max-md:flex-wrap max-md:max-w-full">
        <div class="flex flex-col self-start">
          <h2 class="text-title font-semibold">{{ $kelas->nama }}</h2>

          <p class="font-semibold text-[#E9940C] md:text-[18px] lg:text-[20px]">
          Rp{{ number_format($kelas->harga, 0, ',', '.') }} <br><span
              class="text-smallContent text-greyIcon font-normal">{{ $kelas->rentang }} / bulan</span></p>

              
          <h3 class="mt-4 md:mt-8 text-subtitle font-semibold">Waktu</h3>

          <div class="flex flex-col gap-3">
              <div class="flex gap-2 items-center mt-4">
                  <span class="material-symbols-outlined">calendar_today</span>  
                  <p class="my-auto font-normal">
                      <span class="font-semibold">Jadwal :</span> {{ $kelas->jadwal_hari }}
                  </p>
              </div>
              <div class="flex gap-2 items-center">
                  <i class="fa-lg fa-regular fa-clock"></i>  
                  <p class="my-auto font-normal">
                    <span class="font-semibold ms-1">Durasi :</span> {{ $kelas->durasi }} /sesi
                  </p>
              </div>
          </div>

        </div>
      </section>

      <h3 class="text-subtitle font-semibold max-w-3/4 mt-8 md:mt-4">Deskripsi</h3>
      <p class="mt-1.5  w-full md:w-3/4">
      {{ $kelas->deskripsi }}
      </p>

      <h3 class="mt-8 text-subtitle font-semibold max-md:mt-10 max-md:max-w-full">Fasilitas</h3>
      <ul class="mt-2 max-md:max-w-full flex flex-col gap-1">

        @foreach(explode(',', $kelas->fasilitas) as $fasilitas)
        <li>{{ $fasilitas }}</li>
        @endforeach
      </ul>
      
    </main>
  </div>

  @include('components.footer')


  <script src="{{asset('js/style.js')}}"></script>
  <script>
    tippy('#daftarSkrgTip', {
    content: 'Daftar Kelas',
    });

 
    // price card detail tawaran kelas
      function handleScroll() {
        const daftarSkrg = document.getElementById('daftarSkrg');
        const priceCard = document.getElementById('priceCard');
        const scroll = window.scrollY;

        if (window.innerWidth > 768) {
          if (scroll > 280) {
            daftarSkrg.classList.remove('hidden');
          } else {
            daftarSkrg.classList.add('hidden');
            
          }
        } else {
          if (scroll > 500) {
            daftarSkrg.classList.remove('hidden');
          } else {
            daftarSkrg.classList.add('hidden');
            
          }
        }
      }

    handleScroll();
    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);
  </script>
</body>

</html>