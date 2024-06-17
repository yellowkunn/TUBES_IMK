<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajar</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div class="relative flex justify-center items-center" id="session">
        @if (session('success'))
            <div id="success"
                class="fixed top-8 mt-5 bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 px-8 py-3 rounded-2xl unselectable translate-y-4 duration-300">
                <div class="flex justify-between items-center gap-4 lg:gap-36">
                    <div class="flex gap-4 items-center">
                        <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                        <p class="text-lg text-greyIcon">{{ session('success') }}</p>
                    </div>

                    <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full"
                        onclick="document.getElementById('success').classList.add('hidden')"></i>
                </div>
            </div>
        @elseif(session('error'))
            <div id="error"
                class="fixed top-8 mt-5 bg-[#ffefef] border border-[#ff3838] shadow-[0px_0px_6px_2px_rgba(227,0,0,0.2)] z-20 gap-2 items-center w-fit px-8 py-3 justify-center rounded-2xl flex unselectable">
                <div class="flex justify-between items-center gap-36">
                    <div class="flex gap-4 items-center">
                        <i class="fa-solid fa-exclamation fa-lg p-4 bg-error rounded-full text-white"></i>
                        <p class="text-lg text-greyIcon">
                        <ul class="list-disc pl-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>

                    <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full"
                        onclick="document.getElementById('error').classList.add('hidden')"></i>
                </div>
            </div>
        @endif

        @if (session('pesanPengajar'))
            <div id="pesan-pengajar"
                class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold"></strong>
                <span class="block sm:inline">{{ session('pesanPengajar') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                    onclick="document.getElementById('pesan-pengajar').classList.add('hidden')">
                    <svg class="fill-current h-6 w-6 text-yellow-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Tutup</title>
                        <path
                            d="M14.348 5.652a1 1 0 011.415 0l1.515 1.515a1 1 0 010 1.414l-8.648 8.648a1 1 0 01-1.415 0L2.122 8.59a1 1 0 010-1.415L3.637 5.652a1 1 0 011.414 0L10 10.586l4.348-4.348z" />
                    </svg>
                </span>
            </div>
        @endif
    </div>

    <div>
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300"
                id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    @livewire('pengatur-ruangan')

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        setTimeout(function() {
            const session = document.getElementById('session');
            if (session) {
                session.classList.add('hidden');
            }
        }, 4000);

        function showPopupAturRuangan(i) {
            document.getElementById('popupAturRuangan' + i).classList.toggle('hidden');
        }

        function showPopupEditRuangan(i) {
            document.getElementById('popupEditRuangan' + i).classList.toggle('hidden');
        }

        function showPopupHapusRuangan(i) {
            document.getElementById('popupHapusRuangan' + i).classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selectJam1 = document.getElementById('jam');
            const selectJam2 = document.getElementById('jamTambahan');

            selectJam1.addEventListener('change', function() {
                if (selectJam1.value !== "") {
                    selectJam2.selectedIndex = 0; // Reset the second select option
                }
            });

            selectJam2.addEventListener('change', function() {
                if (selectJam2.value !== "") {
                    selectJam1.selectedIndex = 0; // Reset the first select option
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const selectJam1 = document.getElementById('jam2');
            const selectJam2 = document.getElementById('jamTambahan2');

            selectJam1.addEventListener('change', function() {
                if (selectJam1.value !== "") {
                    selectJam2.selectedIndex = 0; // Reset the second select option
                }
            });

            selectJam2.addEventListener('change', function() {
                if (selectJam2.value !== "") {
                    selectJam1.selectedIndex = 0; // Reset the first select option
                }
            });
        });

        const tabBelumDiatur = document.getElementById('belumDiaturBtn');
        const tabSudahDiatur = document.getElementById('sudahDiaturBtn');
        const kontenBelumDiatur = document.getElementById('belumDiaturContent');
        const kontenSudahDiatur = document.getElementById('sudahDiaturContent');

        tabSudahDiatur.addEventListener("click", function() {
            if (kontenSudahDiatur.classList.contains('hidden')) {
                kontenBelumDiatur.classList.add('hidden');
                kontenSudahDiatur.classList.remove('hidden');

                tabSudahDiatur.classList.add('bg-baseBlue', 'text-white');
                tabSudahDiatur.classList.remove('bg-white', 'text-baseBlue');
                tabBelumDiatur.classList.remove('bg-baseBlue', 'text-white');
                tabBelumDiatur.classList.add('bg-white', 'text-baseBlue');
            }
        });

        tabBelumDiatur.addEventListener("click", function() {
            if (kontenBelumDiatur.classList.contains('hidden')) {
                kontenSudahDiatur.classList.add('hidden');
                kontenBelumDiatur.classList.remove('hidden');

                tabBelumDiatur.classList.add('bg-baseBlue', 'text-white');
                tabBelumDiatur.classList.remove('bg-white', 'text-baseBlue');
                tabSudahDiatur.classList.remove('bg-baseBlue', 'text-white');
                tabSudahDiatur.classList.add('bg-white', 'text-baseBlue');
            }
        });

        tippy('#hapus', {
            content: 'Hapus Ruangan',
        });
    </script>
</body>

</html>
