<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajar</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div>
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('pengaturanruangan') }}" class="hover:font-semibold">Kalender Pendidikan</a>
                    </div>

                    <div class="flex justify-between mt-8">
                        <p class="text-title font-semibold">Kalender Pendidikan</p>   
                        
                        <button id="" class="bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-5 py-2 rounded-lg">
                        <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                            <p class="text-greyIcon font-semibold">Tambah kegiatan</p>
                        </button>
                    </div>

                    <div class="mt-10 flex justify-center">
                        <img src="{{ asset('images/cal.png') }}" alt="calender" class="w-3/4">
                    </div>

                    <p class="font-semibold text-subtitle mt-8">Keterangan:</p>

                    <div class="flex flex-col gap-4 mt-4">
                        <div class="flex gap-2 items-center">
                            <div class="w-24 h-6 bg-baseLighterGreen opacity-35"></div>
                            <p>: lorem</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="w-24 h-6 bg-baseBlue opacity-25"></div>
                            <p>: lorem</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="w-24 h-6 bg-baseCream"></div>
                            <p>: lorem</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 my-8">
                        <p class="font-semibold">02 s.d 07 Mei 2024 <span class="ms-6 font-normal">Judul</span></p>
                        <p class="font-semibold">11 s.d 13 Mei 2024 <span class="ms-6 font-normal">Judul</span></p>
                        <p class="font-semibold">15 s.d 19 Mei 2024 <span class="ms-6 font-normal">Judul</span></p>
                        <p class="font-semibold">23 s.d 25 Mei 2024 <span class="ms-6 font-normal">Judul</span></p>
                        <p class="font-semibold">31 Mei s.d 04 Juni 2024 <span class="ms-6 font-normal">Judul</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')

</body>
</html>