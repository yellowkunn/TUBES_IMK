@include('htmlhead')

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

    <div class=" px-8 sm:px-16 lg:px-20 flex justify-center" id="session">
    @if (session('success_fp'))
        <div id="success" class="mt-5 bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 items-center px-8 py-3 justify-center rounded-2xl flex unselectable">
            <div class="flex justify-between items-center gap-4 lg:gap-36">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                    <p class="text-lg text-greyIcon">{{ session('success_fp') }}</p>
                </div>

                <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('success').classList.add('hidden')"></i>
            </div>
        </div>
    
        @elseif (session('error_fp'))
        <div id="error" class="bg-[#ffefef] border border-[#ff3838] shadow-[0px_0px_6px_2px_rgba(227,0,0,0.2)] z-20 gap-2 items-center w-fit px-8 py-3 justify-center rounded-2xl flex unselectable">
            <div class="flex justify-between items-center gap-36">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-exclamation fa-lg p-4 bg-error rounded-full text-white"></i>
                    <p class="text-lg text-greyIcon">{{ session('error_fp') }}</p>
                </div>

                <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('error').classList.add('hidden')"></i>
            </div>
        </div>
    @endif
    </div>

    <main class="flex flex-col self-center w-full max-md:max-w-full sm:pt-4 lg:pt-6 bg-white dark:dark-mode">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
       
        <!-- section 1 -->
        <div class="flex justify-between px-8 sm:px-16 lg:px-20">
            <div class="mt-10 flex flex-col gap-8">

                <p id="typewriter" class="font-semibold text-red-700 text-[50px] lg:text-[55px] xl:text-[70px] leading-tight lg:w-2/3 h-[180px] hidden md:block"></p>
                <p class="md:hidden text-red-700 font-semibold text-subtitle text-balance">Gabung dan dapatkan pembelajaran terbaik dari kami!</p>
                <p class="leading-tight sm:text-subtitle w-full lg:w-3/4 dark:dark-mode">Di setiap langkah yang kami ambil, kami percaya bahwa pendidikan adalah kunci untuk membuka pintu masa depan yang gemilang.</p>
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/formulirpendaftaran') }}" class="dark:text-red-500 text-red-700 sm:text-[20px] w-[120px] sm:w-[150px] py-2 border-2 border-red-700/50 text-center hover:text-white hover:bg-red-700 hover:border-none mb-16">Daftar Kelas</a>
                @else
                <a href=" {{ route('login') }} " class="dark:text-red-500 text-red-700 sm:text-[20px] w-[120px] sm:w-[150px] py-2 border-2 border-red-700/50 text-center hover:text-white hover:bg-red-700 hover:border-none mb-16">Daftar Kelas</a>
                @endauth
                @endif

            </div>

            <div class="lg:w-1/2 flex justify-end self-end hidden md:flex">
                <img src="{{asset('images/smiley-woman-with-laptop-copy-space.png')}}" class="lg:w-[40vw]" alt="">
            </div>
        </div>
        <!-- akhir section 1 -->

        <!-- section 2 -->
        <div class="p-8 sm:px-16 sm:py-12 lg:p-20 bg-baseCream text-center dark:dark-mode dark:border-2 dark:border-t-lg dark:border-white">
            <div data-aos="fade-up">

                <p class="font-semibold text-subtitle sm:text-title md:text-[40px] text-[#333333] dark:text-white">Program Unggulan FEC</p>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 sm:mt-12">
                    @if(count($kelass) > 0)
                    @foreach($kelass->slice(0, 8) as $kelas)
                    <article class="flex flex-col">
                        <a href="{{ url('/detailkelas/' . $kelas->id_kelas) }}" class="flex flex-col justify-center">
                            <div class="group transform transition-transform hover:scale-95 flex flex-col p-5 sm:p-7 w-full drop-shadow-regularShadow bg-white hover:drop-shadow-none rounded-xl">
                                <div class="flex flex-col items-start text-neutral-700">
                                    <h4 class="font-semibold text-subtitle  ">{{ $kelas->nama }}</h4>
                                    <!-- <p class="text-smallContent italic font-light">kurikulum nasional</p> -->
                                </div>
                                <img loading="lazy" src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="mt-4 max-h-48 w-full object-cover rounded-lg" />

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
                                            {{ $kelas->durasi }} /sesi
                                        </p>
                                    </div>
                                </div>

                                <p class="text-justify text-neutral-600 mt-2 break-pretty">
                                    <span class="text-[20px] sm:text-subtitle font-semibold text-amber-500">Rp{{ number_format($kelas->harga, 0, ',', '.') }}</span>/bulan
                                </p>
                                <a href="{{ url('/detailkelas/' . $kelas->id_kelas) }}" class="py-2 w-full text-white bg-baseBlue/90 group-hover:bg-baseBlue rounded-lg mt-3">
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
        setTimeout(function() {
            const session = document.getElementById('session');
            if (session) {
                session.classList.add('hidden');
            }
        }, 6000);

        
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