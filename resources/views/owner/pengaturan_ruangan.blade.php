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

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('pengaturanruangan') }}" class="hover:font-semibold">Pengaturan Ruangan</a>
                    </div>

                    <div class="md:flex justify-between items-center mt-4 my-7">
                        <p class="text-title font-semibold mb-4 md:mb-0">Pengaturan Ruangan</p>
                        <form method="get" class="flex justify-between items-center relative">
                            <input autocomplete="off" type="text" id="search" name="search" value=""
                                class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full"
                                placeholder="Cari">
                            <button type="submit" class="absolute right-5"><i
                                    class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                        </form>
                    </div>

                    <!-- Pesan Error -->
                    @if ($errors->any())
                        <div id="error-messages"
                            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Terjadi kesalahan dengan input Anda:</span>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="dismissMessage('error-messages')">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 011.415 0l1.515 1.515a1 1 0 010 1.414l-8.648 8.648a1 1 0 01-1.415 0L2.122 8.59a1 1 0 010-1.415L3.637 5.652a1 1 0 011.414 0L10 10.586l4.348-4.348z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    <!-- Pesan Sukses -->
                    @if (session('success'))
                        <div id="success-message"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="dismissMessage('success-message')">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 011.415 0l1.515 1.515a1 1 0 010 1.414l-8.648 8.648a1 1 0 01-1.415 0L2.122 8.59a1 1 0 010-1.415L3.637 5.652a1 1 0 011.414 0L10 10.586l4.348-4.348z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    <!-- Pesan Pengajar -->
                    @if (session('pesanPengajar'))
                        <div id="pesan-pengajar"
                            class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold"></strong>
                            <span class="block sm:inline">{{ session('pesanPengajar') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="dismissMessage('pesan-pengajar')">
                                <svg class="fill-current h-6 w-6 text-yellow-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 011.415 0l1.515 1.515a1 1 0 010 1.414l-8.648 8.648a1 1 0 01-1.415 0L2.122 8.59a1 1 0 010-1.415L3.637 5.652a1 1 0 011.414 0L10 10.586l4.348-4.348z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    <script>
                        function dismissMessage(elementId) {
                            const message = document.getElementById(elementId);
                            message.style.transition = 'opacity 1s ease-out';
                            message.style.opacity = '0';
                            setTimeout(() => {
                                message.style.display = 'none';
                            }, 1000);
                        }

                        // Automatically dismiss the messages after 5 seconds
                        setTimeout(() => {
                            const successMessage = document.getElementById('success-message');
                            const pengajarMessage = document.getElementById('pesan-pengajar');
                            const errorMessages = document.getElementById('error-messages');

                            if (successMessage) {
                                successMessage.style.transition = 'opacity 1s ease-out';
                                successMessage.style.opacity = '0';
                                setTimeout(() => {
                                    successMessage.style.display = 'none';
                                }, 1000);
                            }
                            if (pengajarMessage) {
                                pengajarMessage.style.transition = 'opacity 1s ease-out';
                                pengajarMessage.style.opacity = '0';
                                setTimeout(() => {
                                    pengajarMessage.style.display = 'none';
                                }, 1000);
                            }
                            if (errorMessages) {
                                errorMessages.style.transition = 'opacity 1s ease-out';
                                errorMessages.style.opacity = '0';
                                setTimeout(() => {
                                    errorMessages.style.display = 'none';
                                }, 1000);
                            }
                        }, 5000);
                    </script>

                    <div class="border-b-2 border-baseBlue w-full flex gap-6 mb-10">
                        <button type="button" id="belumDiaturBtn"
                            class="rounded-t-lg bg-baseBlue py-2 px-4 text-white">Belum diatur</button>
                        <button type="button" id="sudahDiaturBtn"
                            class="rounded-t-lg py-2 px-4 bg-white text-baseBlue">Sudah diatur</button>
                    </div>

                    <div id="belumDiaturContent">
                        <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">
                            @foreach ($kelasJamkos as $kelas)
                                <div
                                    class="bg-white h-fit rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">
                                    <div class="flex items-center gap-2 w-full">
                                        <span class="relative flex h-3 w-3">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                        </span>
                                        <p class="text-red-500 text-smallContent font-semibold">Belum diatur</p>
                                    </div>

                                    <div class="flex flex-col gap-2 mt-4">
                                        <p class="font-semibold md:text-[20px] lg:text-subtitle capitalize">
                                            {{ $kelas->nama }}</p>

                                        <button id="dd-more{{ $loop->index }}" onclick="showPopupAturRuangan({{ $kelas->id_kelas }})"
                                            class="rounded-lg bg-baseBlue/90 group-hover:bg-baseBlue text-white py-2 my-3 inline-block text-center">Atur Ruangan</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="sudahDiaturContent" class="hidden">
                        <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">
                            @foreach ($kelass as $kelas)
                                <div
                                    class="bg-white h-fit rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">
                                    <div>
                                        <div class="flex justify-between mb-3">
                                            <div class="flex items-center gap-2 w-full">
                                                <span class="relative flex h-3 w-3">
                                                    <span
                                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-300 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex rounded-full h-3 w-3 bg-green-400"></span>
                                                </span>
                                                <p class="text-green-500 text-smallContent font-semibold">Sudah diatur
                                                </p>
                                            </div>

                                            <button id="dd-more{{ $loop->index }}"
                                                onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})">
                                                <i class="fa-regular fa-trash-can" id="hapus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <p class="font-semibold md:text-[20px] lg:text-subtitle capitalize mb-4">
                                            {{ $kelas->nama }}</p>

                                        <p class="font-semibold">Pengajar: <span class="font-normal">Yohana
                                                Septamia</span></p>
                                        <p class="font-semibold">Hari: <span class="font-normal">Senin,</span> Jam:
                                            <span class="font-normal">14.50</span>
                                        </p>
                                        <p class="font-semibold">Hari: <span class="font-normal">Kamis,</span> Jam:
                                            <span class="font-normal">14.50</span>
                                        </p>

                                        <button id="dd-more{{ $loop->index }}"
                                            onclick="showPopupEditRuangan({{ $kelas->id_kelas }})"
                                            class="rounded-lg bg-baseBlue/90 group-hover:bg-baseBlue text-white py-2 my-3 inline-block text-center">Edit
                                            Ruangan</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ($kelasJamkos as $kelas)
                        <!-- pop up atur pengaturan ruang kelas -->
                        <div class="hidden top-0 left-0 flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen"
                            id="popupAturRuangan{{ $kelas->id_kelas }}">
                            <div class="flex flex-col justify-center min-w-[450px]">
                                <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                    <p class="text-title">Atur Kelas</p>
                                    <button onclick="showPopupAturRuangan({{ $kelas->id_kelas }})">
                                        <i class="fa-solid fa-xmark fa-lg"></i>
                                    </button>
                                </div>
                                <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                                    <form action="{{ url('/aturRuangan') }}" method="post"
                                        class="flex flex-col gap-5">
                                        @csrf
                                        <div>
                                            <p class="font-semibold mb-1">Pengaturan ruang kelas </p>
                                            <p class="font-semibold mb-1 text-subtitle">{{ $kelas->nama }}</p>
                                            <input type="hidden" name="namaKelas" id="namaKelas"
                                                value="{{ $kelas->nama }}">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Pengajar</p>
                                            <select
                                                class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                name="pengajar" id="pengajar">
                                                <option value="" disabled selected>Pilih Pengajar</option>
                                                @if ($pengajars->isNotEmpty())
                                                    @foreach ($pengajars as $pengajar)
                                                        <option value="{{ $pengajar->id_pengguna }}">
                                                            {{ $pengajar->biodataPengajar->nama_lengkap }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-2">Jadwal</p>

                                            <div class="overflow-y-auto max-h-30 flex flex-col gap-4 pe-3 ps-0.5">
                                                <!-- foreach jadwal_hari -->
                                                <div>
                                                    <p>{{ $kelas->jadwal_hari }}</p>
                                                    <div class="flex gap-3 items-center mt-1">
                                                        {{-- <i class="fa-lg fa-regular fa-clock fa-sm"></i>  --}}
                                                        <input
                                                            class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                            type="time" name="jam" id="jam"
                                                            value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">

                                        <div class="mt-8 flex justify-end gap-6">
                                            <button type="button"
                                                onclick="showPopupAturRuangan({{ $kelas->id_kelas }})"
                                                class="text-greyIcon hover:text-black">Batal</button>
                                            <button type="submit"
                                                class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                            hover:bg-baseBlue hover:text-white"
                                                style="box-shadow: 
                                            0px 0px 5px 1px rgba(122,161,226,0.3);">Simpan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- akhir dari pop up atur pengaturan ruang kelas -->

                        <!-- pop up edit pengaturan ruang kelas -->
                        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen"
                            id="popupEditRuangan{{ $kelas->id_kelas }}">
                            <div class="flex flex-col justify-center min-w-[450px]">
                                <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                    <p class="text-title">Edit Kelas</p>
                                    <button onclick="showPopupEditRuangan({{ $kelas->id_kelas }})">
                                        <i class="fa-solid fa-xmark fa-lg"></i>
                                    </button>
                                </div>
                                <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                                    <form method="post" class="flex flex-col gap-5">
                                        @csrf
                                        <div>
                                            <p class="font-semibold mb-1">Pengaturan ruang kelas </p>
                                            <p class="font-semibold mb-1 text-subtitle">{{ $kelas->nama }}</p>
                                            <input type="hidden" name="namaKelas" id="namaKelas"
                                                value="{{ $kelas->nama }}">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Pengajar</p>
                                            <input
                                                class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                type="text" name="keterangan" id="keterangan"
                                                value="nama pengajar">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-2">Jadwal</p>

                                            <div class="overflow-y-auto max-h-30 flex flex-col gap-4 pe-3 ps-0.5">
                                                <!-- foreach jadwal_hari -->
                                                <div>
                                                    <p>Senin</p>
                                                    <div class="flex gap-3 items-center mt-1">
                                                        <i class="fa-lg fa-regular fa-clock fa-sm"></i>
                                                        <input
                                                            class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                            type="text" name="jam" id="jam"
                                                            value="jamnya">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-8 flex justify-end gap-6">
                                            <button type="button"
                                                onclick="showPopupEditRuangan({{ $kelas->id_kelas }})"
                                                class="text-greyIcon hover:text-black">Batal</button>
                                            <button type="submit"
                                                class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                            hover:bg-baseBlue hover:text-white"
                                                style="box-shadow: 
                                            0px 0px 5px 1px rgba(122,161,226,0.3);">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir dari pop up edit pengaturan ruang kelas -->

                        <!-- pop up hapus pengaturan ruang kelas -->
                        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen"
                            id="popupHapusRuangan{{ $kelas->id_kelas }}">
                            <div class="flex flex-col justify-center max-w-[350px]">
                                <div class="bg-white rounded-xl px-10 py-8">
                                    <div class="text-end">
                                        <button onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})">
                                            <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                                        </button>
                                    </div>

                                    <div class="flex flex-col gap-4">
                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-[52px] h-[52px] mx-auto">
                                            <circle cx="26" cy="26" r="26" fill="#FF3838"
                                                fill-opacity="0.1"></circle>
                                            <circle cx="26" cy="26" r="21" fill="#FF3838"
                                                fill-opacity="0.15"></circle>
                                            <g clip-path="url(#clip0_213_507)">
                                                <path
                                                    d="M27 20C27 19.4469 26.5531 19 26 19C25.4469 19 25 19.4469 25 20V28C25 28.5531 25.4469 29 26 29C26.5531 29 27 28.5531 27 28V20ZM26 33C26.3315 33 26.6495 32.8683 26.8839 32.6339C27.1183 32.3995 27.25 32.0815 27.25 31.75C27.25 31.4185 27.1183 31.1005 26.8839 30.8661C26.6495 30.6317 26.3315 30.5 26 30.5C25.6685 30.5 25.3505 30.6317 25.1161 30.8661C24.8817 31.1005 24.75 31.4185 24.75 31.75C24.75 32.0815 24.8817 32.3995 25.1161 32.6339C25.3505 32.8683 25.6685 33 26 33Z"
                                                    fill="#D60101"></path>
                                            </g>
                                            <circle cx="26" cy="26" r="11" stroke="#D60101"
                                                stroke-width="2"></circle>
                                            <defs>
                                                <clipPath id="clip0_213_507">
                                                    <rect width="2" height="16" fill="white"
                                                        transform="translate(25 18)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <p class="font-semibold text-greyIcon text-balance text-center">
                                            Apakah anda yakin ingin menghapus pengaturan ruang untuk kelas
                                            {{ $kelas->nama }}?
                                        </p>

                                        <form method="post">
                                            <div class="flex justify-between gap-4 mt-4">
                                                <button type="button"
                                                    onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})"
                                                    class="text-greyIcon hover:text-black w-full">Batal</button>
                                                <button type="submit"
                                                    class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                    hover:bg-[#d60101] hover:text-white"
                                                    style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- akhir dari pop up hapus pengaturan ruang kelas -->

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
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

        function showPopupAturRuangan(i) {
            document.getElementById('popupAturRuangan' + i).classList.toggle('hidden');
        }

        function showPopupEditRuangan(i) {
            document.getElementById('popupEditRuangan' + i).classList.toggle('hidden');
        }

        function showPopupHapusRuangan(i) {
            document.getElementById('popupHapusRuangan' + i).classList.toggle('hidden');
        }

        tippy('#hapus', {
            content: 'Hapus Ruangan',
        });
    </script>
</body>

</html>
