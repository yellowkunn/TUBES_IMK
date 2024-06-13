<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $p1->kelas->nama }} {{ $p1->kelas->tingkat_kelas }} </title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    <div>
        @include('components.pengajar.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300"
                id="sidebar">
                @include('components.pengajar.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">
                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href=" route('home')" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href=" route('pengajar.kelas')" class="hover:font-semibold">Kelas</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="" class="hover:font-semibold">{{ $p1->kelas->nama }}
                            {{ $p1->kelas->tingkat_kelas }}</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="" class="hover:font-semibold">Pertemuan ke {{ $p1->pertemuan_ke }}</a>
                    </div>

                    <div class="border-b-2 border-baseBlue w-full flex gap-6 mt-7">
                        <button type="button" id="BahanAjarBtn"
                            class="rounded-t-lg bg-white py-2 px-4 text-white focus:font-semibold">Bahan Ajar</button>
                        <button type="button" id="absensiBtn"
                            class="rounded-t-lg py-2 px-4 bg-white text-baseBlue focus:font-semibold">Absensi</button>
                    </div>

                    <div id="BahanAjarContent" class="mt-6">
                        <div class="flex justify-between items-center mt-6">
                            <p class="text-subtitle font-semibold">Bahan Ajar</p>

                            <select name="selectedBahan" id="filterBahan"
                                class="w-44 bg-white border border-greyBorder text-greyIcon px-4 py-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="">Filter</option>
                                <option value="Materi">Materi</option>
                                <option value="Latihan">Latihan</option>
                                <option value="Link">Link</option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-6">
                                <p class="text-subtitle font-semibold">Materi</p>

                                <button type="button" onclick="showPopupMateri()"><i
                                        class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue/90 hover:bg-baseBlue text-white rounded-full"></i></button>
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->materi->isNotEmpty())
                                    @foreach ($groupedPertemuans->materi as $materi)
                                <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $materi->nama_asli_file_materi }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p>
                                                            <span class="font-semibold">Dapat diakses:</span>
                                                            {{ \Carbon\Carbon::parse($materi->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($materi->jam_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="downloadFile('{{ $fileUrl }}')">
                                                        <span class="material-symbols-outlined">download</span>
                                                    </button>

                                                    <script>
                                                        function downloadFile(url) {
                                                            const a = document.createElement('a');
                                                            a.href = url;
                                                            a.download = ''; // Optional: you can specify the filename here
                                                            document.body.appendChild(a);
                                                            a.click();
                                                            document.body.removeChild(a);
                                                        }
                                                    </script>
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                            </div>
                                            @endforeach
                                        @endif
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-10">
                                <p class="text-subtitle font-semibold">Latihan</p>

                                <button type="button" onclick="showPopupLatihan()"><i
                                        class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue/90 hover:bg-baseBlue text-white rounded-full"></i></button>
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->materi->isNotEmpty())
                                    @foreach ($groupedPertemuans->materi as $materi)
                                <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $materi->nama_asli_file_materi }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p>
                                                            <span class="font-semibold">Dapat diakses:</span>
                                                            {{ \Carbon\Carbon::parse($materi->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($materi->jam_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="downloadFile('{{ $fileUrl }}')">
                                                        <span class="material-symbols-outlined">download</span>
                                                    </button>

                                                    <script>
                                                        function downloadFile(url) {
                                                            const a = document.createElement('a');
                                                            a.href = url;
                                                            a.download = ''; // Optional: you can specify the filename here
                                                            document.body.appendChild(a);
                                                            a.click();
                                                            document.body.removeChild(a);
                                                        }
                                                    </script>
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                            </div>
                                            @endforeach
                                        @endif
                            </div>
                        </div>

                    </div>

                    <!-- konten pop up materi -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                        id="popupMateri">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Materi</p>
                                <button type="button" onclick="showPopupMateri()">
                                    <i
                                        class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="flex flex-col gap-4">
                                    <div class="ms-4">
                                        <p class="font-semibold mb-1.5">Waktu Akses</p>
                                        <input type="time" model="waktuakses" id="waktuakses"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                                        <input type="date" model="tanggalakses" id="tanggalakses"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                                    </div>
                                    <div class="w-full overflow-y-auto max-h-96">
                                        <div class="md:flex items-start">
                                            <div class="w-full px-3 py-1.5">
                                                <div
                                                    class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                                    <p>Materi</p>
                                                    <button type="button" click="addmateri( $i )"><i
                                                            class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col">

                                            <div class="flex justify-between py-3 px-5">
                                                <input type="hidden" name="inputType" value="materi">
                                                <input model="filemateri. $value " type="file" id="file. $value "
                                                    class="file:text-baseBlue file:font-semibold 
                                                    file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                                                <button type="button" click="removemateri( $key )"><i
                                                        class="fa-solid fa-xmark me-7"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white text-center">
                                    <button type="button" onclick="showPopupMateri()"
                                        class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5"
                                        style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
                                        Selesai
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- konten pop Latihan -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                        id="popupLatihan">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Latihan</p>
                                <button type="button" onclick="showPopupLatihan()">
                                    <i
                                        class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="flex flex-col gap-4">
                                    <div class="ms-4">
                                        <p class="font-semibold mb-1.5">Waktu Akses</p>
                                        <input type="time" model="waktuakses2" id="waktuakses2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                                        <input type="date" model="tanggalakses2" id="tanggalakses2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                                        <p class="font-semibold mb-1.5 mt-3">Tenggat Tugas</p>
                                        <input type="time" model="batas_waktu_akses_2" id="batas_waktu_akses_2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                                        <input type="date" model="batas_tanggal_akses_2"
                                            id="batas_tanggal_akses_2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="w-full overflow-y-auto max-h-96">
                                        <div class="md:flex items-start">
                                            <div class="w-full px-3 py-1.5">
                                                <div
                                                    class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                                    <p>Latihan</p>
                                                    <button type="button" click="addlatihan( $i )"
                                                        onclick="event.preventDefault();">
                                                        <i
                                                            class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i>
                                                    </button>
                                                </div>

                                                <div class="rounded-lg">
                                                    <div id="divInputFileMateri"
                                                        class="grid grid-cols-3 bg-neutral-100 border-4 border-white">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-col">

                                            <div class="flex justify-between py-3 px-5">
                                                <input type="hidden" name="inputType" value="latihan">
                                                <input model="filelatihan. $value " type="file" id="file. $value "
                                                    class="file:text-baseBlue file:font-semibold 
                                                file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                                                <button type="button" click="removelatihan( $key )"><i
                                                        class="fa-solid fa-xmark me-7"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white text-center">
                                    <button type="button" onclick="showPopupLatihan()"
                                        class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5"
                                        style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
                                        Selesai
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- akhir dari konten pop Latihan -->

                    <div id="absensiContent" class="hidden mt-6">
                        <p class="text-subtitle font-semibold">Absensi Siswa</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        function showPopupListSiswa() {
            document.getElementById('popupListSiswa').classList.toggle('hidden');
        }

        const tabBahanAjar = document.getElementById('BahanAjarBtn');
        const tabAbsensi = document.getElementById('absensiBtn');
        const kontenBahanAjar = document.getElementById('BahanAjarContent');
        const kontenAbsensi = document.getElementById('absensiContent');

        tabBahanAjar.classList.remove('bg-white', 'text-baseBlue');
        tabBahanAjar.classList.add('bg-baseBlue', 'text-white', 'font-semibold');

        tabBahanAjar.addEventListener("click", function() {
            if (kontenBahanAjar.classList.contains('hidden')) {
                kontenAbsensi.classList.add('hidden');
                kontenBahanAjar.classList.remove('hidden');

                tabBahanAjar.classList.add('bg-baseBlue', 'text-white');
                tabBahanAjar.classList.remove('bg-white', 'text-baseBlue');
                tabAbsensi.classList.remove('bg-baseBlue', 'text-white');
                tabAbsensi.classList.add('bg-white', 'text-baseBlue');
            }
        });

        tabAbsensi.addEventListener("click", function() {
            if (kontenAbsensi.classList.contains('hidden')) {
                kontenBahanAjar.classList.add('hidden');
                kontenAbsensi.classList.remove('hidden');

                tabAbsensi.classList.add('bg-baseBlue', 'text-white');
                tabAbsensi.classList.remove('bg-white', 'text-baseBlue');
                tabBahanAjar.classList.remove('bg-baseBlue', 'text-white');
                tabBahanAjar.classList.add('bg-white', 'text-baseBlue');
            }
        });



        function showPopupMateri() {
            document.getElementById('popupMateri').classList.toggle('hidden');
        }

        function showPopupLatihan() {
            document.getElementById('popupLatihan').classList.toggle('hidden');
        }
    </script>

</body>

</html>
