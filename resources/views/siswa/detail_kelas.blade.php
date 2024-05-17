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

                <div class="my-8 flex flex-col gap-2">
                    <!-- perulangan pertemuan -->
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
                </div>
            </div>
        </div>
    </div>

    <script>
        function tab_pertemuan(idDD, contentPertemuan, tabPertemuan) {
            const dropdownButton = document.getElementById(idDD);
            const dropdownContent = document.getElementById(contentPertemuan);
            const hoverTab = document.getElementById(contentPertemuan);
            let isDropdownOpen = true;

            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    dropdownContent.classList.remove('hidden');
                    dropdownButton.classList.add('rotate-90');
                    hoverTab.classList.remove('bg-white');
                    hoverTab.classList.add('bg-baseBlue', 'text-white');
                } else {
                    dropdownContent.classList.add('hidden');
                    dropdownButton.classList.remove('rotate-90');
                }
            }

            toggleDropdown();

            dropdownButton.addEventListener('click', toggleDropdown);

            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                    dropdownContent.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });
        }

        for (let i = 0; i < 1; i++) {
            tab_pertemuan('iconDD-' + i, 'contentPertemuan-' + i, 'tabPertemuan-' + i);
        }
    </script>
</body>
</html>