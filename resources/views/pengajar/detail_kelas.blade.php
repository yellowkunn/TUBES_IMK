<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matematika SMP</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
    <div class="max-w-[1440px]">
    @include('components.pengajar.navbar')

    <div class="grid grid-cols-6">
        <div class="hidden md:flex">
            @include('components.pengajar.sidebar')
        </div>
        
        <!-- content -->
        <div class="col-span-5">
            <div id="content" class="px-7 py-28">
                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href="">Dashboard</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Matematika SMP</a>
                </div>

                <div class="flex justify-between mt-7">
                    <p class="text-title font-semibold">Matematika SMP</p>
                    <button onclick="showPopupListSiswa()" class="bg-white text-greyIcon font-semibold text-regularContent 
                                    flex items-center gap-2 w-fit p-3 px-4 rounded-full 
                                    border border-greyIcon"
                                    style="box-shadow: 0px 1px 10px rgba(0,0,0,0.1)">
                            <i class="fa-solid fa-user-group"></i>
                            <p>10 Siswa</p>
                    </button>
                </div>

                <div class="flex gap-2 items-center text-smallContent text-greyIcon mb-7">
                    <p>Senin</p>
                    <p>&#8226;</p>
                    <p>Rabu</p>
                    <p>&#8226;</p>
                    <p>Jumat</p>
                    <p class="text-2xl">&#8226;</p>
                    <p>50 menit/sesi</p>
                </div>

                <!-- button -->
                <div class="flex gap-4">
                    <div class="bg-baseDarkerGreen text-white text-regularContent 
                            flex items-center gap-2 w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                        <i class="fa-solid fa-circle-plus fa-lg"></i>
                        <p>Tambah Pertemuan</p>
                    </div>
                    <div class="bg-baseDarkerGreen text-white text-regularContent 
                            flex items-center gap-2 w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                        <i class="fa-solid fa-file-circle-plus fa-lg"></i>
                        <p>Absensi</p>
                    </div>
                </div>

                <div class="flex justify-between my-7">
                    <p class="text-subtitle font-semibold">Pertemuan yang telah dilakukan</p>

                    <!-- filter bds bulan -->
                    <div>
                        <button id="filter-0" class="bg-white flex items-center gap-24 border border-greyBorder px-4 py-2 rounded-lg">
                            <p class="text-greyIcon">Bulan</p>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                        
                        <div id="menu-0" class="hidden ps-5 pe-20 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute" style="color: #949494;">
                            <a href="#" class="block py-1">Januari</a>
                            <a href="#" class="block py-1">Febriari</a>
                            <a href="#" class="block py-1">Maret</a>
                            <a href="#" class="block py-1">April</a>
                            <a href="#" class="block py-1">Mei</a>
                            <a href="#" class="block py-1">Juni</a>
                            <a href="#" class="block py-1">Juli</a>
                            <a href="#" class="block py-1">Agustus</a>
                            <a href="#" class="block py-1">September</a>
                            <a href="#" class="block py-1">Oktober</a>
                            <a href="#" class="block py-1">November</a>
                            <a href="#" class="block py-1">Desember</a>
                        </div>
                    </div>
                    <!-- akhir dari filter -->

                </div>

                <!-- card pertemuan -->
                <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow my-8">
                    <div class="flex justify-between">
                        <div class="flex flex-col">
                            <p class="font-semibold text-regularContent">Pertemuan X</p>
                            <p class="text-regularContent">Nama Materi</p>
                            <p class="text-greyIcon text-smallContent mt-3">30 April 2024</p>
                        </div>
                        <div class="flex my-auto gap-6">
                            <p class="text-baseDarkerGreen bg-baseDarkerGreen/20 h-fit p-2 px-4 rounded-full">April</p>
                            <button class="bg-white border-2 border-baseBlue text-baseBlue px-4 rounded-full">Lihat Detail</button>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>

        <!-- konten pop up list siswa -->
        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
        id="popupListSiswa">
            <div class="flex flex-col justify-center">
                <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-4 rounded-t-xl">
                    <div>
                        <p class="font-semibold text-title">Daftar siswa</p>
                        <p>10 Siswa terdaftar dalam kelas ini</p></div>
                    <button onclick="showPopupListSiswa()">
                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3" style="background-color: #EAEAEA; color: #363636"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl">
                    <div class="grid grid-cols-3 gap-2 my-3">

                        <!-- perulangan data per siswa -->
                        <div class="p-3 px-5 bg-baseDarkerGreen/10 rounded-lg">
                            <div class="flex gap-3 items-center">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                                
                                <div>
                                    <p class="text-regularContent font-semibold">Marissa</p>
                                    <p class="text-smallContent text-greyIcon">marissa@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="bg-white text-center">
                        <button onclick="showPopupListSiswa()" class="w-fit p-2 px-4 text-baseDarkerGreen font-semibold text-regularContent border-2 border-baseDarkerGreen rounded-full" style="box-shadow: 0px 0px 5px 1px rgba(105,212,220,0.3);">
                        Tutup
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- akhir dari konten pop up list siswa -->
    </div>

    @include('components.footer')

    <script>
        const showPopupListSiswa = () => {
            const popup = document.getElementById('popupListSiswa');

            if (popup.classList.contains('hidden')) {
                popup.classList.remove('hidden')
            } else {
                popup.classList.add('hidden')
            }
        }

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

        // samakan dengan jumlah filter
        for (let i = 0; i < 1; i++) {
            initializeDropdown('filter-' + i, 'menu-' + i);
        }
    </script>
</body>
</html>