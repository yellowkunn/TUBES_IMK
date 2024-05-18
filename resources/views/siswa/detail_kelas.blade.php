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
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Matematika SMP</a>
                </div>

                <div class="mt-8">
                    <p class="text-title font-semibold">Matematika SMP</p>
                    <p class="text-smallContent text-greyIcon">Miss Tiur</p>
                </div>

                <div class="my-8 flex flex-col gap-6">
                    <!-- perulangan pertemuan -->
                    <div class="dropdown" data-index="0">
                        <div id="tabPertemuan-0" class="rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
                            <div>
                                <div>
                                    <div class="bg-baseBlue h-1/2 absolute top-5 left-4 rounded-full transform -translate-x-1/2 w-1"></div>
                                </div>
                                <div class="ms-1">
                                    <p class="font-semibold">Pertemuan 1</p>
                                    <p class="text-smallContent">Molekul</p>
                                </div>
                            </div>
                            <button id="iconDD-0">
                                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                            </button>
                        </div>

                        <div id="contentPertemuan-0" class="hidden">
                            <div class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-2.5">
                                <p class="font-semibold">Materi</p> 
                            </div>

                            <div class="bg-baseCream w-full rounded-b-xl">
                                <div class="grid divide-y-2">
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <p>Materi1</p> 
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                                <p class="font-semibold">Latihan</p> 
                            </div>

                            <div class="bg-baseCream w-full rounded-b-xl">
                                <div class="grid divide-y-2">
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <p>Latihan1</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- akhir dari perulangan pertemuan -->

                    <!-- perulangan pertemuan -->
                    <div class="dropdown" data-index="1">
                        <div id="tabPertemuan-1" class="rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
                            <div>
                                <div>
                                    <div class="bg-baseBlue h-1/2 absolute top-5 left-4 rounded-full transform -translate-x-1/2 w-1"></div>
                                </div>
                                <div class="ms-1">
                                    <p class="font-semibold">Pertemuan 2</p>
                                    <p class="text-smallContent">Molekul</p>
                                </div>
                            </div>
                            <button id="iconDD-1">
                                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                            </button>
                        </div>

                        <div id="contentPertemuan-1" class="hidden">
                            <div class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-2.5">
                                <p class="font-semibold">Materi</p> 
                            </div>

                            <div class="bg-baseCream w-full rounded-b-xl">
                                <div class="grid divide-y-2">
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <p>Materi1</p> 
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                                <p class="font-semibold">Latihan</p> 
                            </div>

                            <div class="bg-baseCream w-full rounded-b-xl">
                                <div class="grid divide-y-2">
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <p>Latihan1</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- akhir dari perulangan pertemuan -->
                </div>
            </div>
        </div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            const index = dropdown.getAttribute('data-index');
            tab_pertemuan('iconDD-' + index, 'contentPertemuan-' + index, 'tabPertemuan-' + index);
        });
    });

    function tab_pertemuan(idDD, contentPertemuan, tabPertemuan) {
        const dropdownButton = document.getElementById(idDD);
        const dropdownContent = document.getElementById(contentPertemuan);
        let isDropdownOpen = false;

        function toggleDropdown() {
            isDropdownOpen = !isDropdownOpen;
            if (isDropdownOpen) {
                dropdownContent.classList.remove('hidden');
                dropdownButton.classList.add('rotate-90');
            } else {
                dropdownContent.classList.add('hidden');
                dropdownButton.classList.remove('rotate-90');
            }
        }

        dropdownButton.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleDropdown();
        });

        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                dropdownContent.classList.add('hidden');
                dropdownButton.classList.remove('rotate-90');
                isDropdownOpen = false;
            }
        });
    }

    function selectOption(event, index, option) {
        event.preventDefault(); 
        document.getElementById('selectedOption-' + index).textContent = option;
        document.getElementById('tabPertemuan-' + index).value = option;
        document.getElementById('contentPertemuan-' + index).classList.add('hidden');
        document.getElementById('iconDD-' + index).classList.remove('rotate-90');
        isDropdownOpen = false;
    }

    </script>
</body>
</html>