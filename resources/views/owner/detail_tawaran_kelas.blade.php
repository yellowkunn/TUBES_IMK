<!DOCTYPE html>
<html lang="en">

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

  <div class="flex flex-col bg-white">
    <main class="flex flex-col self-center w-full px-8 sm:px-16 lg:px-20 my-4 md:my-12">
      <section class="flex gap-5 justify-between px-0.5 max-md:flex-wrap max-md:max-w-full">
        <div class="flex flex-col self-start">
          <h2 class="text-title font-semibold">{{ $kelas->nama }}</h2>
          <h3 class="mt-8 text-subtitle max-md:mt-10 font-semibold">Waktu</h3>

          <div class="flex flex-col gap-3">
              <div class="flex gap-2 justify-center items-center mt-4">
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
        
        <div class="flex flex-col justify-center px-8 py-8 text-white bg-baseBlue rounded-xl max-md:px-5">
          <div class="flex flex-col">
            <p>Hanya</p>
            <p class="mt-5 leading-6">
              <span class="text-subtitle font-semibold">Rp{{ number_format($kelas->harga, 0, ',', '.') }}</span>
              <br />
              /{{ $kelas->rentang }}
            </p>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/formulirpendaftaran') }}" class="justify-center text-black items-center px-16 py-2.5 mt-5 bg-white rounded-[30px] max-md:px-5 font-semibold">
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
    </main>
  </div>
  
  <a href="" class="flex justify-end bottom-10 mx-5 md:mx-10 sticky z-10 my-5 animate-bounce" id="daftarSkrg">
    <div class="bg-baseBlue hover:bg-[#415474] text-white rounded-full p-2 px-3.5 drop-shadow-lg w-fit h-fit cursor-pointer">
    <span class="material-symbols-outlined pt-1.5">add_shopping_cart</span>
    </div>
  </a>

  @include('components.footer')
</body>

</html>