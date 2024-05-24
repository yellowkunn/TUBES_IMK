<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengajar</title>

     <!-- google font for icon -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
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
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Jadwal</a>
                </div>

                <p class="text-title font-semibold my-7">Jadwal</p>

                <div class="flex flex-col gap-8">
                <div class="flex justify-between">
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Sen</button>
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Sel</button>
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Rab</button>
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Kam</button>
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Jum</button>
                    <button class="bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">Sab</button>
                </div>

                    <div class="w-full p-5 px-8 flex justify-between bg-white drop-shadow-regularShadow rounded-lg">
                        <p>14.30 - 13.20</p>
                        <p>Mapel</p>
                        <p>Ruang A1</p>
                    </div>
                    <div class="w-full p-5 px-8 flex justify-between bg-white drop-shadow-regularShadow rounded-lg">
                        <p>14.30 - 13.20</p>
                        <p>Mapel</p>
                        <p>Ruang A1</p>
                    </div>
                    <div class="w-full p-5 px-8 flex justify-between bg-white drop-shadow-regularShadow rounded-lg">
                        <p>14.30 - 13.20</p>
                        <p>Mapel</p>
                        <p>Ruang A1</p>
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