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
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
                @include('components.siswa.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="">Dashboard</a>
                    </div>

                    <div class="bg-baseDarkerGreen rounded-xl p-6 md:p-12 relative my-7 font-semibold text-white">
                        <div class="flex flex-col gap-2 text-start md:w-1/2">
                            <p class="text-subtitle">Hello {{ Auth::user()->username }}!</p>
                            <p>Jangan lupa kelas kamu selanjutnya di hari Selasa pukul 10.00 ya!</p>
                        </div>
                        <div class="absolute right-5 top-0 invisible md:visible">
                            <img src="{{asset('images/cartoon4dashboardUser.png')}}" alt="" width=220>
                        </div>
                    </div>

                    <div class="md:flex gap-14 mt-12">
                        <div class="md:w-2/3">
                            <div class="flex justify-between items-center">
                                <p class="md:text-subtitle font-semibold">Baru diakses</p>
                                <a href="" class="text-[#00e]">Selengkapnya</a>
                            </div>

                            <!-- baru diakses -->
                            <!-- perulangan pertemuan -->
                            <div class="dropdown" data-index="0">
                                <div id="tabPertemuan-0" class="mt-5 rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
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

                            <div class="sm:flex gap-6 mt-12 mb-3 md:mb-8">
                                <!-- filter bds kelas aktif/tdk -->
                                <div class="mb-3 md:mb-0">
                                    <select id="filterKelas" class="block appearance-none w-full sm:w-48 bg-white border border-greyBorder text-greyIcon px-4 py-2.5 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                        <option value="Kelas aktif">Kelas Aktif</option>
                                        <option value="Kelas tidak aktif">Kelas Tidak Aktif</option>
                                    </select>
                                </div>
                                <!-- akhir dari filter -->

                                <div>
                                    <a href=" {{url('/../formulirpendaftaran')}} " class="bg-white flex items-center gap-2 border border-greyBorder px-4 py-2 rounded-lg">
                                        <span class="material-symbols-outlined text-greyIcon">add_circle</span>
                                        <p class="text-greyIcon">Daftar kelas</p>
                                    </a>
                                </div>
                            </div>

                            <!-- daftar kelas -->
                            <div class="sm:grid grid-cols-2 gap-4">
                                @foreach($siswas as $siswa)
                                @php
                                $kelas = $siswa->kelas;
                                @endphp
                                @if($kelas)
                                <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0">
                                    <p class="font-semibold md:text-[20px] lg:text-subtitle">
                                        {{ $kelas->nama }}
                                    </p>
                                    <div class="flex items-center">
                                        @if($kelas->foto)
                                        <img src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                        @else
                                        <p class="text-greyIcon">Foto tidak tersedia</p>
                                        @endif
                                    </div>
                                    <p class="text-greyIcon text-wrap">
                                        {{ $kelas->deskripsi }}
                                    </p>
                                    <a href="{{ url('/siswa/detailkelas/' . $kelas->id_kelas) }}">
                                        <button class="text-white font-semibold bg-baseBlue w-full rounded-lg py-1.5 mt-4">Detail</button>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                            </div>

                            <!-- akhir dari daftar kelas -->
                        </div>

                        <div class="md:w-1/3">
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

    <div class="mt-12">
    @include('components.footer')
    </div>

    <script src="{{asset('js/style.js')}}"></script>
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