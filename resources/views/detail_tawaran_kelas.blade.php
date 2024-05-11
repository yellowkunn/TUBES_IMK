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
  <main class="flex flex-col self-center px-5 w-full max-w-[1238px] max-md:max-w-full">
    <section class="flex gap-5 justify-between px-0.5 mt-8 max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
      <div class="flex flex-col self-start">
        <h2 class="text-title font-semibold">Matematika</h2>
        <h3 class="mt-8 text-subtitle max-md:mt-10 font-semibold">Waktu</h3>

        <div class="flex flex-col gap-3">
            <div class="flex gap-2 justify-center items-center mt-4">
            <span class="material-symbols-outlined">calendar_today</span>  
                <p class="my-auto font-normal">
                    <span class="font-semibold">Jadwal :</span> Senin, Rabu, Jumat
                </p>
            </div>
            <div class="flex gap-2 items-center">
                <i class="fa-lg fa-regular fa-clock"></i>  
                <p class="my-auto font-normal">
                <span class="font-semibold ms-1">Durasi :</span> 50 menit /sesi
            </p>
            </div>
        </div>

      </div>

      <div id="priceCard" class="flex flex-col justify-center px-8 py-8 text-white bg-baseBlue rounded-xl max-md:px-5 md:fixed top-40 right-5 lg:right-20">
    <div class="flex flex-col">
      <p>Hanya</p>
      <p class="mt-5 leading-6 max-md:mr-2">
        <span class="text-subtitle font-semibold">Rp 500.000</span>
        <br />
        / 8 pertemuan !!!
      </p>
      <button class="justify-center text-black items-center px-16 py-2.5 mt-5 bg-white rounded-[30px] max-md:px-5 font-semibold">
        Daftar Sekarang
      </button>
    </div>
  </div>
    </section>

    <h3 class="text-subtitle font-semibold max-w-3/4 mt-8">Deskripsi</h3>
    <p class="mt-1.5 w-3/4">
      Lorem ipsum dolor sit amet consectetur. Dignissim dictum ornare vestibulum sit lectus tempor sagittis. Urna vulputate non volutpat aliquam phasellus. Et purus porta nunc pretium cras nec a donec ultricies. Et elit turpis fringilla leo. Lorem ipsum dolor sit amet consectetur. Dignissim dictum ornare vestibulum sit lectus tempor sagittis. Urna vulputate non volutpat aliquam phasellus. Et purus porta nunc pretium cras nec a donec ultricies. Et elit turpis fringilla leo. Lorem ipsum dolor sit amet consectetur.
    </p>

    <h3 class="mt-8 text-subtitle font-semibold max-md:mt-10 max-md:max-w-full">Fasilitas</h3>
    <ul class="mt-2 max-md:max-w-full flex flex-col gap-1">
      <li>Sertifikat</li>
      <li>Latihan Soal</li>
      <li>Ruangan ber-AC</li>
      <li>Proyektor</li>
      <li>Free Wi-Fi</li>
    </ul>
    <section class="flex gap-5 justify-between mt-12 max-md:flex-wrap max-md:max-w-full">
      <h3 class="text-subtitle font-semibold">Kelas Lainnya</h3>
      <a href="#" class="text-blue-700 whitespace-nowrap">
        Selengkapnya
      </a>
    </section>
    <div class="mt-8 max-md:max-w-full mb-36">
      <div class="grid grid-cols-4 gap-5 max-md:flex-col max-md:gap-0">

        <article class="flex flex-col max-md:ml-0 max-md:w-full">
          <div class="flex flex-col grow justify-center max-md:mt-5">
            <div class="flex flex-col px-5 py-6 w-full bg-white rounded-lg drop-shadow-regularShadow">
              <div class="flex gap-2.5 items-start text-neutral-700">
                <div class="shrink-0 bg-baseBlue rounded-full h-[30px] w-[30px]"></div>
                <div class="flex flex-col">
                  <h4 class="font-semibold">Bahasa Inggris</h4>
                  <p class="text-smallContent italic font-light">kurikulum nasional</p>
                </div>
            </div>
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a9d649e5d3f12aafc79229e974e098d601878ee8ae388a23229704f8f6b346f2?apiKey=8e216de591ec44d2b3973e5d1e77a02f&" alt="Bahasa Inggris class" class="mt-4 w-full aspect-[1.69]" />
            <p class="mt-6 text-smallContent text-neutral-700">
              lorem lorem lorem lorem lorem lorem
              <br />
              lorem lorem lorem lorem lorem
            </p>
            <div class="flex gap-5 justify-between items-center mt-5">
              <p class=" text-smallContent text-justify text-neutral-600">
                <span class="text-subtitle font-semibold text-amber-500">Rp500.000</span>
                <br>/bulan
              </p>
              <a href="#" class="justify-center py-2 px-5 font-semibold text-lime-50 whitespace-nowrap bg-baseBlue rounded-full max-md:px-5">
                Lihat
              </a>
            </div>
          </div>
        </div>
        </article>

    </div>
  </div>
</main>

  @include('components.footer')

  <script>
    function handleScroll() {
    const priceCard = document.getElementById('priceCard');
    const scroll = window.scrollY;

    if (scroll < 170) {
      priceCard.classList.add('top-40');
      priceCard.classList.remove('top-6');
    } else {
      priceCard.classList.add('top-6');
      priceCard.classList.remove('top-40');
    }
  }
  handleScroll();
  window.addEventListener('scroll', handleScroll);
  </script>
</body>
</html>