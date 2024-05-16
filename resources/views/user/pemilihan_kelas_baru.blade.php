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
                </div>

                <p class="text-subtitle font-semibold my-7">Pilih Kelas</p>
    
                <div class="grid grid-cols-4">
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
                            <a href="#" class="justify-center py-2 px-5 font-semibold text-lime-50 whitespace-nowrap bg-baseBlue rounded-full max-md:px-5">
                                Lihat
                            </a>
                            </div>
                        </div>
                        </div>
                    </article>
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