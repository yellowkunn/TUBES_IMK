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
@include('components.navbar')

  <div class="flex flex-col bg-white dark:dark-mode">
    <main class="flex flex-col self-center w-full px-8 sm:px-16 lg:px-20 my-4 md:my-12">
      <section class="flex gap-5 justify-between px-0.5 max-md:flex-wrap max-md:max-w-full">
        <div class="flex flex-col self-start">
          <h2 class="text-title font-semibold">{{ $kelas->nama }}</h2>
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
        
        <div class="flex flex-col justify-center px-8 py-8 text-white bg-baseBlue dark:bg-baseBlue/70 rounded-xl max-md:px-5">
          <div class="flex flex-col">
            <p>Hanya</p>
            <p class="mt-5 leading-6">
              <span class="text-subtitle font-semibold">Rp{{ number_format($kelas->harga, 0, ',', '.') }}</span>
              <br />
              /{{ $kelas->rentang }}
            </p>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/formulirpendaftaran') }}" class="dark:bg-[#313A49]/40 dark:hover:bg-[#313A49]/70 dark:font-normal dark:text-white dark:rounded-lg justify-center text-black items-center px-16 py-2.5 mt-5 bg-white rounded-[30px] max-md:px-5 font-semibold">
              Daftar Sekarang
            </a>
            @else
            <a href="{{ route('login') }}" class="justify-center text-black items-center px-16 py-2.5 mt-5 bg-white rounded-[30px] max-md:px-5 font-semibold">
              Daftar Sekarang
            </a>
            @endauth
            @endif

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
  
  <section class="flex gap-5 justify-between items-center mt-16 max-md:flex-wrap max-md:max-w-full">
    <p class="text-title font-semibold">Kelas Lainnya</p>
    <a href="{{ route('tawarankelas') }}" class="text-blue-700 whitespace-nowrap">
      Selengkapnya
    </a>
  </section>
  <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 my-8 md:mb-36 sm:mt-12">
      @foreach($class->slice(0,4) as $kls)
      <article class="flex flex-col">
          <a href="{{ route('detailkelas', $kls->id_kelas) }}" class="flex flex-col justify-center">
              <div class="group transform transition-transform hover:scale-95 flex flex-col p-5 sm:p-7 w-full drop-shadow-regularShadow bg-white rounded-xl">
                  <div class="flex flex-col items-start text-neutral-700">
                      <h4 class="font-semibold text-subtitle  ">{{ $kls->nama }}</h4>
                      <!-- <p class="text-smallContent italic font-light">kurikulum nasional</p> -->
                  </div>
                  <img loading="lazy" src="{{ asset('berkas_ujis/' . $kls->foto) }}" alt="{{ $kls->nama }}" class="mt-4 max-h-48 w-full object-cover rounded-lg" />

                  <div class="flex flex-col gap-1">
                      <div class="flex gap-2 items-center mt-3">
                          <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                          <p class="my-auto font-normal">
                              3 pertemuan /minggu
                          </p>
                      </div>
                      <div class="flex gap-2 items-center">
                          <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                          <p class="my-auto font-normal">
                              {{ $kls->durasi }} /sesi
                          </p>
                      </div>
                  </div>

                  <p class="text-justify text-neutral-600 mt-2 break-pretty">
                      <span class="text-[20px] sm:text-subtitle font-semibold text-amber-500">Rp{{ number_format($kls->harga, 0, ',', '.') }}</span>/bulan
                  </p>
                  <a href="{{ route('detailkelas', $kls->id_kelas) }}" class="py-2 w-full text-white text-center bg-baseBlue/90 group-hover:bg-baseBlue rounded-lg mt-3">
                      Lihat
                  </a>

              </div>
          </a>
      </article>
      @endforeach
  </div>

  <a href="" class="flex justify-end bottom-10 mx-5 md:mx-10 sticky z-10 my-5 animate-bounce" id="daftarSkrg">
    <div id="daftarSkrgTip" class="bg-baseBlue hover:bg-[#415474] text-white rounded-full p-2 px-3.5 drop-shadow-lg w-fit h-fit cursor-pointer">
    <span class="material-symbols-outlined pt-1.5">add_shopping_cart</span>
    </div>
  </a>
</div>
</main>

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