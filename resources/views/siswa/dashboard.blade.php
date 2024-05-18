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
                </div>

                <div class="bg-baseDarkerGreen rounded-xl p-12 relative my-7 font-semibold text-white">
                    <div class="flex flex-col gap-2 text-start w-1/2">
                        <p class="text-subtitle">Hello namaSiswa!</p>
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
                        
                        <div class="flex gap-6 mt-12 mb-8">
                        <!-- filter bds kelas aktif/tdk -->
                        <div>
                            <button id="filter-0" class="bg-white flex items-center gap-24 border border-greyBorder px-4 py-2 rounded-lg">
                                <p class="text-greyIcon">Kelas Aktif</p>
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                            
                            <div id="menu-0" class="hidden ps-5 pe-20 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute z-10" style="color: #949494;">
                                <a href="#" class="block py-1">Kelas aktif</a>
                                <a href="#" class="block py-1">Kelas tidak aktif</a>
                            </div>
                        </div>
                        <!-- akhir dari filter -->

                        <div>
                            <a href="" class="bg-white flex items-center gap-2 border border-greyBorder px-4 py-2 rounded-lg">
                                <span class="material-symbols-outlined text-greyIcon">add_circle</span> 
                                <p class="text-greyIcon">Daftar kelas</p>
                            </a>
                        </div>
                        </div>

                        <!-- daftar kelas -->
                        <div class="grid grid-cols-2 gap-4 my-5">
                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 Siswa</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 Siswa</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 Siswa</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>

                            <div class="p-8 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                                <p class="font-semibold">Matematika</p>
                                <p class="text-greyIcon text-wrap">Lorem ipsum dolor sit amet consectetur. Nunc donec feugiat ullamcorper urna.</p>
                                <div class="flex items-center">
                                    <img src="" alt="">
                                    <p class="text-greyIcon">10 Siswa</p>
                                </div>
                                <button class="text-white font-semibold bg-baseBlue w-full rounded-full py-1.5 mt-2">Detail</button>
                            </div>
                        </div>
                        <!-- akhir dari daftar kelas -->
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

    <script>
        function initializeDropdown(buttonId, menuId) {
            const dropdownButton = document.getElementById(buttonId);
            const dropdownMenu = document.getElementById(menuId);
            let isDropdownOpen = true;

            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            }

            toggleDropdown();

            dropdownButton.addEventListener('click', toggleDropdown);

            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });
        }

        for (let i = 0; i < 1; i++) {
            initializeDropdown('filter-' + i, 'menu-' + i);
        }
    </script>
</body>
</html>