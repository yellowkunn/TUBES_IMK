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

    <main class="flex flex-col self-center w-full max-md:max-w-full mt-8">
        <!-- section 1 -->
        <div class="flex justify-between px-20">
            <div class="mt-10 flex flex-col gap-8">
                <p id="typewriter" class="font-semibold text-red-700 text-[70px] leading-tight w-2/3 h-[180px]"></p>
                <p class="leading-tight text-subtitle w-3/4">Di setiap langkah yang kami ambil, kami percaya bahwa pendidikan adalah kunci untuk membuka pintu masa depan yang gemilang.</p>
                <a href="" class="text-red-700 text-[20px] w-[150px] py-2 border-2 border-red-700/50 text-center hover:text-white hover:bg-red-700 hover:border-none">Lihat Kelas</a>
            </div>

            <div class="w-1/2 flex justify-end self-end hidden md:flex">
                <img src="{{asset('images/smiley-woman-with-laptop-copy-space.png')}}" class="w-[40vw]" alt="">
            </div>
        </div>
        <!-- akhir section 1 -->
        
        <!-- section 2 -->
        <div class="p-20 bg-baseCream text-center">
            <div data-aos="fade-up">
            <p class="font-semibold text-[40px] text-[#333333]">Program Unggulan FEC</p>

            <div class="grid grid-cols-4 gap-8 mt-12">
                <article class="flex flex-col max-md:ml-0 max-md:w-full">
                    <a href="" class="flex flex-col grow justify-center max-md:mt-5">
                        <div class="flex flex-col p-8 w-full border-2 border-greyBorder bg-white/50 hover:bg-white hover:border-none rounded-xl">
                        <div class="flex gap-2.5 items-start text-neutral-700">
                            <div class="shrink-0 bg-baseBlue rounded-full h-[30px] w-[30px]"></div>
                            <div class="flex flex-col">
                            <h4 class="font-semibold">Bahasa Inggris</h4>
                            <p class="text-smallContent italic font-light">kurikulum nasional</p>
                            </div>
                        </div>
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a9d649e5d3f12aafc79229e974e098d601878ee8ae388a23229704f8f6b346f2?apiKey=8e216de591ec44d2b3973e5d1e77a02f&" alt="Bahasa Inggris class" class="mt-4 w-full aspect-[1.69]" />
                        <p class="mt-6 text-smallContent text-neutral-700 text-start">
                        matematika adalah pelajaran paporit jerome
                        </p>
                        <div class="flex gap-5 justify-between items-center mt-3">
                        <p class=" text-smallContent text-justify text-neutral-600">
                            <span class="text-subtitle font-semibold text-amber-500">Rp500.000</span>
                            <br>/bulan
                        </p>
                        <a href="#" class="justify-center py-1 px-5 font-semibold text-lime-50 whitespace-nowrap bg-baseBlue rounded-full max-md:px-5">
                            Lihat
                        </a>
                        </div>
                    </div>
                    </a>
                </article>

                <article class="flex flex-col max-md:ml-0 max-md:w-full">
                    <a href="" class="flex flex-col grow justify-center max-md:mt-5">
                        <div class="flex flex-col p-8 w-full border-2 border-greyBorder bg-white/50 hover:bg-white hover:border-none rounded-xl">
                        <div class="flex gap-2.5 items-start text-neutral-700">
                            <div class="shrink-0 bg-baseBlue rounded-full h-[30px] w-[30px]"></div>
                            <div class="flex flex-col">
                            <h4 class="font-semibold">Bahasa Inggris</h4>
                            <p class="text-smallContent italic font-light">kurikulum nasional</p>
                            </div>
                        </div>
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a9d649e5d3f12aafc79229e974e098d601878ee8ae388a23229704f8f6b346f2?apiKey=8e216de591ec44d2b3973e5d1e77a02f&" alt="Bahasa Inggris class" class="mt-4 w-full aspect-[1.69]" />
                        <p class="mt-6 text-smallContent text-neutral-700 text-start">
                        matematika adalah pelajaran paporit jerome
                        </p>
                        <div class="flex gap-5 justify-between items-center mt-3">
                        <p class=" text-smallContent text-justify text-neutral-600">
                            <span class="text-subtitle font-semibold text-amber-500">Rp500.000</span>
                            <br>/bulan
                        </p>
                        <a href="#" class="justify-center py-1 px-5 font-semibold text-lime-50 whitespace-nowrap bg-baseBlue rounded-full max-md:px-5">
                            Lihat
                        </a>
                        </div>
                    </div>
                    </a>
                </article>

            </div>
            </div>
        </div>
        <!-- akhir section 2 -->

        <!-- section 3 -->
        <div class="relative p-20 bg-cover bg-center text-white" style="background-image: url('/images/kids-getting-back-school-together.jpg');">
            <div class="absolute inset-0 bg-black opacity-80"></div>

            <div class="flex flex-col gap-20">
                <div data-aos="fade-right">
                    <p class="font-semibold text-title w-1/2">Mengapa saya harus mengambil kursus di <span class="text-[40px]">Fortunate Education Center?</span></p>
                </div>

                <div data-aos="fade-right" class="text-wrap border-2 border-white p-5 rounded-xl w-1/2">
                    <p class="font-semibold mb-2">Latihan soal</p>
                    <p>Kamu bisa melatih pemahamanmu dengan tingkatan soal yang beragam untuk setiap pertemuannya!</p>
                </div>

                <div data-aos="fade-left" class="text-wrap border-2 border-white p-5 rounded-xl w-1/2 self-end">
                    <p class="font-semibold mb-2">Ujian dan Rapor</p>
                    <p>Tersedia ujian dan rapor untuk melihat perkembangan kemampuanmu setiap bulan maupun semesternya.</p>
                </div>

                <div data-aos="fade-right" class="text-wrap border-2 border-white p-5 rounded-xl w-1/2">
                    <p class="font-semibold mb-2">Ruangan nyaman</p>
                    <p>Setiap kelas yang ada sudah menggunakan AC dan tersedia proyektor yang pastinya dapat meningkatkan pengalaman belajar kamu ya!</p>
                </div>

                <div data-aos="fade-left" class="text-wrap border-2 border-white p-5 rounded-xl w-1/2 self-end">
                    <p class="font-semibold mb-2">Sertifikat</p>
                    <p>Dapatkan sertifikat-sertifikat menarik yang dapat kamu letakkan pada portofoliomu.</p>
                </div>
            </div>
            
        </div>
        <!-- akhir section 3 -->

        <!-- section 4 -->
        <div class="p-20">
            <div data-aos="fade-up" class="flex flex-col items-center">
                <p class="font-semibold text-title w-1/2">Apa kata mereka yang sudah belajar di FEC?</p>
                
                <div class="flex justify-between items-center mt-20 mb-12 w-[850px]">
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
    const words = ["Education Beyond Boundaries.", "Come Join Us Now!!!", "Fortunate Education Center."];
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