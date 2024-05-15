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
    <div>
    @include('components.siswa.navbar')

    <div class="flex max-w-[1440px]">
        <div class="w-1/6" id="sidebar">
            @include('components.siswa.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">

            <div class="flex flex-col bg-white">
              <main class="flex flex-col self-center px-5 w-full">
                <section class="flex gap-5 justify-between px-0.5 max-md:flex-wrap max-md:max-w-full">
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
              </div>
              </main>
            </div>
        </div>
    </div>
    </div>

  @include('components.footer')

  <script>
    function handleScroll() {
    const priceCard = document.getElementById('priceCard');
    const scroll = window.scrollY;

    if (scroll < 70) {
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