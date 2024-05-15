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

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
@include('components.navbar')

    <main class="flex flex-col self-center w-full max-md:max-w-full mt-8">
        <div class="lg:flex gap-8 max-md:max-w-full text-white px-10">
            <div class="rounded-2xl bg-[#393939] w-full lg:w-2/3 rounded-[50px] relative">
                <img src="{{ asset('images/manReadingBook.png') }}">
                <div class="absolute right-48 top-12">
                    <p class="text-[85px]">Les Privat <br>Offline</p>
                    <p>Fortunate Education Centre</p>
                    <p>Langkah Awal Menuju Kesuksesan!</p>
                </div>
            </div>
            <div class="flex lg:flex-col gap-6 w-1/2 lg:w-1/3">
                <img src="{{ asset('images/2peopleReadingBook.png') }}" class="rounded-[50px]">
                <div class="grid content-between rounded-2xl bg-baseBlue text-white p-12 h-full rounded-[50px]">
                    <div class="flex justify-between">
                        <div class="font-semibold lg:text-subtitle">
                            TK/PAUD, SD, SMP,
                            <br>SMA, Gap Year,
                            <br>Universitas dan Umum
                        </div>
                        <div>
                        <span class="material-symbols-outlined text-4xl">north_east</span>
                        </div>
                    </div>

                    <div>
                        <a href="" class=" text-title lg:text-[48px] font-medium">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-baseBlue rounded-t-[120px] mt-24">
            <div class="grid grid-cols-4 gap-4 p-24">
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
                    <a href="#" class="justify-center py-1 px-5 font-semibold text-lime-50 whitespace-nowrap bg-baseBlue rounded-full max-md:px-5">
                        Lihat
                    </a>
                    </div>
                </div>
                </div>
            </article>
            </div>
        </div>

        <div class="bg-baseLighterGreen">
            <div class="py-20">
                <div class="grid grid-rows-5 gap-8 place-content-center">
                    <div class="flex gap-4">
                        <div class="nomor w-3/4">tes</div>
                        <div class="1/4">tes</div>
                    </div>
                </div>
            </div>
        </div>
    </main>   

@include('components.footer')
</body>
</html>