<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>
<body class="font-Inter text-regularContent">
    <div>
    @include('components.pengajar.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
            @include('components.pengajar.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">

                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href="">Dashboard</a>
                </div>

                <div class="bg-baseDarkerGreen rounded-xl p-12 relative my-7 font-semibold text-white">
                    <div class="flex flex-col gap-2 text-start w-1/2">
                        <p class="text-subtitle">Hello namapengajar!</p>
                        <p>Jangan lupa kelas kamu selanjutnya di hari Selasa pukul 10.00 ya!</p>
                    </div>
                    <div class="absolute right-5 top-0 invisible md:visible">
                        <img src="{{asset('images/cartoon4dashboardUser.png')}}" alt="" width=220>
                    </div>
                </div>

                <div class="flex gap-14 mt-12">
                    <div class="w-2/3">
                        <div class="flex justify-between">
                            <p class="text-subtitle font-semibold">Baru diakses</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>

                        <!-- baru diakses -->
                        <div class="flex flex-col gap-4 my-5">
                            <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow">
                                <div class="flex justify-between">
                                    <div class="flex flex-col">
                                        <p class="font-semibold">Pertemuan X</p>
                                        <p class="">Nama Materi</p>
                                        <p class="text-greyIcon text-smallContent mt-3">30 April 2024</p>
                                    </div>
                                    <div class="flex my-auto gap-6">
                                        <p class="text-baseDarkerGreen bg-baseDarkerGreen/20 h-fit p-2 px-4 rounded-full">April</p>
                                        <button class="bg-white border-2 border-baseBlue text-baseBlue px-4 rounded-full">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- daftar kelas -->
                        <div class="flex justify-between my-5 mt-12">
                            <p class="text-subtitle font-semibold">Kelas</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 pengajar</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 pengajar</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 pengajar</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 pengajar</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>
                        </div>
                        <!-- akhir dari daftar kelas -->

                        <div class="flex justify-between my-5 mt-12">
                            <p class="text-subtitle font-semibold">Sertifikat terbaru</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>
                    </div>

                    <div class="w-1/3">
                        <p class="text-subtitle font-semibold">Kalender</p>

                        <!-- baru diakses -->
                        <div class="flex flex-col gap-4 my-5">
                            <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow">
                                <div class="flex justify-between">
                                    tes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('components.footer')


<script src="{{asset('js/style.js')}}"></script>
</body>
</html>