<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kelas->nama }} {{ $kelas->tingkat_kelas }}</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
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
                        <a href="">Kelas</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="">{{ $kelas->nama }} {{ $kelas->tingkat_kelas }}</a>
                    </div>

                    <div class="flex justify-between mt-7">
                        <p class="text-title font-semibold">{{ $kelas->nama }} {{ $kelas->tingkat_kelas }}</p>
                        <button onclick="showPopupListSiswa()" class="bg-white text-greyIcon font-semibold 
                                    flex items-center gap-2 w-fit p-3 px-4 rounded-full 
                                    border border-greyIcon" style="box-shadow: 0px 1px 10px rgba(0,0,0,0.1)">
                            <i class="fa-solid fa-user-group"></i>
                            <p>10 Siswa</p>
                        </button>
                    </div>

                    <div class="flex gap-2 items-center text-smallContent text-greyIcon mb-7">
                        @php
                        $jadwal_hari = explode(',', $kelas->jadwal_hari);
                        @endphp

                        @foreach($jadwal_hari as $hari)
                        <p>{{ trim($hari) }}</p>
                        @if (!$loop->last)
                        <p>&#8226;</p>
                        @endif
                        @endforeach
                        <p class="text-2xl">&#8226;</p>
                        <p>{{ $kelas->durasi }} /sesi</p>
                    </div>

                    <!-- button -->
                    <div class="flex gap-4">
                        <a href="{{ url('/tambahpertemuan') }}" class="bg-baseDarkerGreen text-white 
                            flex items-center gap-2 w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                            <i class="fa-solid fa-circle-plus fa-lg"></i>
                            <p>Tambah Pertemuan</p>
                        </a>
                        <a href="{{ url('/absensipengajar') }}" class="bg-baseDarkerGreen text-white 
                            flex items-center gap-2 w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                            <i class="fa-solid fa-file-circle-plus fa-lg"></i>
                            <p>Absensi</p>
                        </a>
                    </div>

                    <div class="flex justify-between my-7">
                        <p class="text-subtitle font-semibold">Pertemuan yang telah dilakukan</p>

                        <!-- filter bds bulan -->
                        <div>
                            <select id="filterBulan" class="block appearance-none w-44 bg-white border border-greyBorder text-greyIcon px-4 py-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="">Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <!-- akhir dari filter -->

                    </div>

                    <!-- card pertemuan -->
                    <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow my-8">
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
            </div>
        </div>

        <!-- konten pop up list siswa -->
        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupListSiswa">
            <div class="flex flex-col justify-center">
                <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-4 rounded-t-xl">
                    <div>
                        <p class="font-semibold text-title">Daftar siswa</p>
                        <p>10 Siswa terdaftar dalam kelas ini</p>
                    </div>
                    <button onclick="showPopupListSiswa()">
                        <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl">
                    <div class="grid grid-cols-3 gap-2 my-3">

                        <!-- perulangan data per siswa -->
                        <div class="p-3 px-5 bg-baseDarkerGreen/10 rounded-lg">
                            <div class="flex gap-3 items-center">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">

                                <div>
                                    <p class=font-semibold">Marissa</p>
                                    <p class="text-smallContent text-greyIcon">marissa@gmail.com</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="bg-white text-center">
                        <button onclick="showPopupListSiswa()" class="w-fit p-2 px-4 text-baseDarkerGreen font-semibold border-2 border-baseDarkerGreen rounded-full" style="box-shadow: 0px 0px 5px 1px rgba(105,212,220,0.3);">
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
    </script>


    <script src="{{asset('js/style.js')}}"></script>
</body>

</html>