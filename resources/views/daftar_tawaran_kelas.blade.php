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

<body class="font-Inter text-regularContent dark:dark-mode">
@include('components.navbar')
  <div class="flex flex-col bg-white dark:dark-mode">
    <main class="flex flex-col self-center w-full px-8 sm:px-16 lg:px-20 my-4 md:my-12">
    <p class="font-semibold text-subtitle sm:text-title md:text-[40px] text-[#333333] dark:text-white">Daftar kelas tersedia</p>
    <p class="sm:text-subtitle text-[#333333] dark:text-white mt-2">Ada banyak pilihan yang bisa kamu pilih di FEC loh!</p>
  
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 sm:mt-12">
        @if(count($kelas) > 0)
        @foreach($kelas as $kelasItem)
          <article class="flex flex-col">
              <a href="{{ url('/detailkelas/' . $kelasItem->id_kelas) }}" class="flex flex-col justify-center">
                  <div class="group transform transition-transform hover:scale-95 flex flex-col p-5 sm:p-7 w-full drop-shadow-regularShadow bg-white dark:bg-[#374151]/40 rounded-xl">
                      <div class="flex flex-col items-start text-neutral-700 dark:text-white">
                          <h4 class="font-semibold text-subtitle">{{ $kelasItem->nama }}</h4>
                          <!-- <p class="text-smallContent italic font-light">kurikulum nasional</p> -->
                      </div>
                      <img loading="lazy" src="{{ asset('berkas_ujis/' . $kelasItem->foto) }}" alt="{{ $kelasItem->nama }}" class="mt-4 max-h-48 w-full object-cover rounded-lg" />

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
                                  {{ $kelasItem->durasi }} /sesi
                              </p>
                          </div>
                      </div>

                      <p class="text-justify text-neutral-600 dark:text-white mt-2 break-pretty">
                          <span class="text-[20px] sm:text-subtitle font-semibold text-amber-500">Rp{{ number_format($kelasItem->harga, 0, ',', '.') }} </span>/bulan
                      </p>
                      <a href="{{ url('/detailkelas/' . $kelasItem->id_kelas) }}" class="text-center py-2 w-full text-white dark:bg-[#313A49] bg-baseBlue/90 group-hover:bg-baseBlue rounded-lg mt-3">
                          Lihat
                      </a>

                  </div>
              </a>
          </article>
        @endforeach
        @else
          <p class="font-semibold text-subtitle sm:text-title md:text-[20px] text-[#333333]">Belum ada kelas yang tersedia saat ini.</p>
        @endif
        </div>

         <!-- pagination -->
         <div class="mt-16">{{ $kelas->links() }}</div>

    </main>
  </div>

  @include('components.footer')
</body>

</html>