<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

     <!-- font awsome -->
     <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- AOS library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
@include('components.navbar')

    <main class="flex flex-col self-center w-full max-md:max-w-full sm:pt-4 lg:pt-6 bg-white">
        <!-- section 1 -->
        <div class="flex justify-between px-8 sm:px-16 lg:px-20">
            <div class="mt-10 flex flex-col gap-8">
            
                <p id="typewriter" class="font-semibold text-red-700 text-[50px] lg:text-[55px] xl:text-[70px] leading-tight lg:w-2/3 h-[180px] hidden md:block"></p>
                <p class="md:hidden text-red-700 font-semibold text-subtitle text-balance">Gabung dan dapatkan pembelajaran terbaik dari kami!</p>
                <p class="leading-tight sm:text-subtitle w-full lg:w-3/4">Di setiap langkah yang kami ambil, kami percaya bahwa pendidikan adalah kunci untuk membuka pintu masa depan yang gemilang.</p>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/formulirpendaftaran') }}" class="text-red-700 sm:text-[20px] w-[120px] sm:w-[150px] py-2 border-2 border-red-700/50 text-center hover:text-white hover:bg-red-700 hover:border-none mb-16">Daftar Kelas</a>
                @else
                <a href=" {{ route('login') }} " class="text-red-700 sm:text-[20px] w-[120px] sm:w-[150px] py-2 border-2 border-red-700/50 text-center hover:text-white hover:bg-red-700 hover:border-none mb-16">Daftar Kelas</a>
                @endauth
                @endif
                
            </div>

            <div class="lg:w-1/2 flex justify-end self-end hidden md:flex">
                <img src="{{asset('images/smiley-woman-with-laptop-copy-space.png')}}" class="lg:w-[40vw]" alt="">
            </div>
        </div>
        <!-- akhir section 1 -->
        
        <!-- section 2 -->
        <div class="p-8 sm:px-16 sm:py-12 lg:p-20 bg-baseCream text-center">
            <div data-aos="fade-up">

            <p class="font-semibold text-subtitle sm:text-title md:text-[40px] text-[#333333]">Program Unggulan FEC</p>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 sm:mt-12">
                @foreach($kelass as $kelas)
                <article class="flex flex-col">
                    <a href="{{ url('/detailkelas/' . $kelas->id_kelas) }}" class="flex flex-col justify-center">
                        <div class="flex flex-col p-5 sm:p-7 w-full drop-shadow-regularShadow bg-white hover:bg-white/75 hover:bg-white hover:drop-shadow-none rounded-xl">
                        <div class="flex flex-col items-start text-neutral-700">
                            <h4 class="font-semibold">{{ $kelas->nama }}</h4>
                            <!-- <p class="text-smallContent italic font-light">kurikulum nasional</p> -->
                        </div>
                        <img loading="lazy" src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }} alt="" class="mt-4 max-h-64 w-full object-cover rounded-lg" />

                        <p class="mt-6 text-smallContent text-neutral-700 text-start">
                        {{ $kelas->deskripsi }}
                        </p>

                        <p class="text-justify text-neutral-600 mt-2 break-pretty">
                            <span class="text-[20px] sm:text-subtitle font-semibold text-amber-500">Rp{{ number_format($kelas->harga, 0, ',', '.') }}</span>/bulan
                        </p>
                        <a href="{{ url('/detailkelas/' . $kelas->id_kelas) }}" class="py-2 w-full font-semibold text-white bg-baseBlue hover:bg-[#607FB2] rounded-lg mt-3">
                            Lihat
                        </a>
                        
                    </div>
                    </a>
                </article>
                @endforeach
                
            </div>
            </div>
        </div>
        <!-- akhir section 2 -->

        <!-- section 3 -->
        <div class="relative p-16 lg:p-20 bg-cover bg-center text-white" style="background-image: url('/images/kids-getting-back-school-together.jpg');">
            <div class="absolute inset-0 bg-black opacity-80"></div>

            <div data-aos="fade-right">
                <p class="font-semibold text-subtitle md:text-title lg:w-1/2 lg:px-16">Mengapa saya harus mengambil kursus di <span class="md:text-[40px]">Fortunate Education Center?</span></p>
            </div>

            <div class="flex flex-col sm:items-center md:items-start md:px-16 gap-6 md:gap-12 lg:gap-20 mt-12">
                <div data-aos="fade-right" class="break-words text-wrap border-2 border-white p-5 rounded-xl w-5/6 md:w-1/2">
                    <p class="font-semibold mb-2">Latihan soal</p>
                    <p>Kamu bisa melatih pemahamanmu dengan tingkatan soal yang beragam untuk setiap pertemuannya!</p>
                </div>

                <div data-aos="fade-left" class="break-words text-wrap border-2 border-white p-5 rounded-xl w-5/6 md:w-1/2 md:self-end">
                    <p class="font-semibold mb-2">Ujian dan Rapor</p>
                    <p>Tersedia ujian dan rapor untuk melihat perkembangan kemampuanmu setiap bulan maupun semesternya.</p>
                </div>

                <div data-aos="fade-right" class="break-words text-wrap border-2 border-white p-5 rounded-xl w-5/6 md:w-1/2">
                    <p class="font-semibold mb-2">Ruangan nyaman</p>
                    <p>Setiap kelas yang ada sudah menggunakan AC dan tersedia proyektor yang pastinya dapat meningkatkan pengalaman belajar kamu ya!</p>
                </div>

                <div data-aos="fade-left" class="break-words text-wrap border-2 border-white p-5 rounded-xl w-5/6 md:w-1/2 md:self-end">
                    <p class="font-semibold mb-2">Sertifikat</p>
                    <p>Dapatkan sertifikat-sertifikat menarik yang dapat kamu letakkan pada portofoliomu.</p>
                </div>
            </div>
            
        </div>
        <!-- akhir section 3 -->

        <!-- section 4 -->
        <div class="p-16 lg:p-20">
            <div data-aos="fade-up" class="flex flex-col items-center">
                <p class="font-semibold text-title w-1/2">Apa kata mereka yang sudah belajar di FEC?</p>
                
                <div class="flex justify-between items-center mt-20 mb-12 lg:w-[850px]">
                    <button class="flex p-3 py-6 hover:rounded-full hover:bg-baseBlue/20">
                        <i class="fa-solid fa-angle-left fa-lg text-baseBlue"></i>
                        <i class="fa-solid fa-angle-left fa-lg text-baseBlue"></i>
                    </button>

                    <div class="flex flex-col items-center text-center">
                        <p class="text-wrap w-1/2 mb-6">"Lesnya bagus sekali! Pengajar-pengajarnya super fun dan metode pembelajaran yang dipakai juga seru jadi nggak ngebosenin deh!"</p>
                        <div class="flex gap-4">
                            <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                            <div class="text-start">
                                <p class="font-semibold">Marissa</p>
                                <p class="text-neutral-700 text-smallContent">Mengikuti kelas IPA SMP 2017</p>
                            </div>
                        </div>
                    </div>

                    <button class="flex p-3 py-6 hover:rounded-full hover:bg-baseBlue/20">
                        <i class="fa-solid fa-angle-right fa-lg text-baseBlue"></i>
                        <i class="fa-solid fa-angle-right fa-lg text-baseBlue"></i>
                    </button>
                </div>
                
            </div>
        </div>
        <!-- akhir section 4 -->
    </main>   

@include('components.footer')

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    const words = ["Education Beyond Boundaries.", "Join & be part of us now!", "Fortunate Education Center."];
    let i = 0;
    let j = 0;
    let currentWord = "";
    let isDeleting = false;

    function type() {
        currentWord = words[i];
        if (isDeleting) {
            document.getElementById("typewriter").textContent = currentWord.substring(0, j);
            j--;
            if (j < 0) {
                isDeleting = false;
                i++;
                if (i == words.length) {
                    i = 0;
                }
                setTimeout(type, 100);
            } else {
                setTimeout(type, 50);
            }
        } else {
            document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
            j++;
            if (j > currentWord.length) {
                isDeleting = true;
                setTimeout(type, 1000);
            } else {
                setTimeout(type, 100);
            }
        }
    }

    type();
</script>

<script>
    AOS.init({
        easing: 'ease-out',
        duration: 600
    });
</script>
        
</body>
</html>