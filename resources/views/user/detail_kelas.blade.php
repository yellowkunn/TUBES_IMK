<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>

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

                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href="">Dashboard</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Matematika SMP</a>
                </div>

                <div class="my-7">
                    <p class="text-subtitle font-semibold">Matematika SMP</p>
                    <p class="text-greyIcon">Miss Tiur</p>
                </div>
    
                <!-- card pertemuan -->
                <div class="cursor-pointer bg-white p-5 px-8 rounded-lg shadow-meetCardShadow my-7 hover:bg-baseDarkerGreen hover:text-white">
                    <div class="flex justify-between">
                        <div class="flex gap-6">
                            <div class="bg-baseDarkerGreen w-1 rounded-full"></div>
                        
                            <div class="flex flex-col">
                                <p class="font-semibold">Pertemuan X</p>
                                <p>Nama Materi</p>
                            </div>
                         </div>

                        <button class="my-auto">
                            <i class="fa-solid fa-caret-right fa-lg text-baseDarkerGreen"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    @include('components.footer')
</body>
</html>