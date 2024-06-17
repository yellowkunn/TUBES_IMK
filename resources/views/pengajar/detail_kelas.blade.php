<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kelasDetail->nama }} {{ $kelasDetail->tingkat_kelas }}</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    @if($kelasDetail)
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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('pengajar.kelas') }}" class="hover:font-semibold">Kelas</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="" class="hover:font-semibold">{{ $kelasDetail->nama }} {{ $kelasDetail->tingkat_kelas }}</a>
                    </div>

                    <div class="sm:flex justify-between mt-7">
                        <p class="text-title font-semibold">{{ $kelasDetail->nama }} {{ $kelasDetail->tingkat_kelas }}</p>
                        <button onclick="showPopupListSiswa()" class="my-3 sm:my-0 bg-white text-greyIcon font-semibold 
                                    flex items-center gap-2 w-fit p-2 sm:p-3 px-6 sm:px-4 rounded-full 
                                    border border-greyIcon" style="box-shadow: 0px 1px 10px rgba(0,0,0,0.1)">
                            <i class="fa-solid fa-user-group"></i>
                            <p>{{ $kelasDetail->total_siswa }}</p>
                        </button>
                    </div>

                    <div class="flex gap-2 items-center text-smallContent text-greyIcon mb-7">
                        @php
                        $jadwal_hari = explode(',', $kelasDetail->jadwal_hari);
                        @endphp

                        @foreach($jadwal_hari as $hari)
                        <p>{{ trim($hari) }}</p>
                        @if (!$loop->last)
                        <p>&#8226;</p>
                        @endif
                        @endforeach
                        <p class="text-2xl">&#8226;</p>
                        <p>{{ $kelasDetail->durasi }} /sesi</p>
                    </div>

                    <!-- button -->
                    <div class="sm:flex gap-4">
                        <a href="{{ route('tambah_pertemuan', $kelasDetail->id_kelas) }}" class="mb-4 sm:mb-0 bg-baseDarkerGreen/90 hover:font-semibold hover:bg-baseDarkerGreen text-white 
                            flex items-center gap-2 w-full sm:w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                            <i class="fa-solid fa-circle-plus fa-lg"></i>
                            <p>Tambah Pertemuan</p>
                        </a>
                        <a href="{{ route('raporpengajar', $kelasDetail->id_kelas) }}" class="bg-baseDarkerGreen/90 hover:bg-baseDarkGreen hover:font-semibold text-white 
                            flex items-center gap-2 w-full sm:w-fit p-3 px-6 rounded-full" style="box-shadow: 
                            0px 4px 5px 0 rgba(105,212,220,0.3);">
                            <span class="material-symbols-outlined">lab_profile</span>
                            <p>Rapor</p>
                        </a>
                    </div>

                        <!-- filter bds bulan -->
                        
                        @livewire('filter-bulan', ['kelas' => $kelas])

                        <!-- akhir dari filter -->

                </div>
            </div>
        </div>

        <!-- konten pop up list siswa -->
        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupListSiswa">
            <div class="flex flex-col justify-center">
                <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-4 rounded-t-xl">
                    <div>
                        <p class="font-semibold text-title">Daftar siswa</p>
                        <p>{{ $kelasDetail->total_siswa }} Siswa terdaftar dalam kelas ini</p>
                    </div>
                    <button onclick="showPopupListSiswa()">
                        <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl">
                    <div class="grid grid-cols-3 gap-2 my-3">

                        <!-- perulangan data per siswa -->
                        @if($siswa->isEmpty() || $siswa->contains(function($siswas) {
                            return is_null($siswas->pengguna) || 
                                   is_null($siswas->pengguna->foto_profile) || 
                                   is_null($siswas->pengguna->biodataSiswa) || 
                                   is_null($siswas->pengguna->biodataSiswa->nama_lengkap) || 
                                   is_null($siswas->pengguna->email);
                        }))
                            <p>Terdapat kesalahan data siswa</p>
                        @else
                            @foreach($siswa as $siswas)
                                <div class="p-3 px-5 bg-baseDarkerGreen/10 rounded-lg">
                                    <div class="flex gap-3 items-center">
                                        <img src="{{ asset('berkas_ujis/' . $siswas->pengguna->foto_profile) }}" class="w-10 h-10 object-cover rounded-full" alt="">
                        
                                        <div>
                                            <p class="font-semibold">{{ $siswas->pengguna->biodataSiswa->nama_lengkap }}</p>
                                            <p class="text-smallContent text-greyIcon">{{ $siswas->pengguna->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        

                    </div>

                    <div class="bg-white text-center mt-5">
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
    function showPopupListSiswa() {
        document.getElementById('popupListSiswa').classList.toggle('hidden');
    }
    </script>
    @endif

</body>

</html>