<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>

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
                    <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="{{ route('pengajar.kelas') }}" class="hover:font-semibold">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="{{ route('pengajar.kelas.detail', ['kelas' => $kelas->id_kelas]) }}" class="hover:font-semibold">{{ $kelas->nama }}</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="{{ route('absensi', ['kelas' => $kelas->id_kelas]) }}" class="hover:font-semibold">Absensi</a>
                </div>

                <p class="text-title font-semibold mt-7">Absensi</p>

                <div class="flex gap-2 items-center text-smallContent text-greyIcon mb-7">
                    <p>Senin</p>
                    <p>&#8226;</p>
                    <p>Rabu</p>
                    <p>&#8226;</p>
                    <p>Jumat</p>
                    <p class="text-2xl">&#8226;</p>
                    <p>50 menit/sesi</p>
                </div>

                <div class="border-b-2 border-baseBlue w-full flex gap-6 mb-10">
                    <button type="button" id="daftarHadirBtn" class="rounded-t-lg bg-baseBlue py-2 px-4 text-white">Daftar Hadir</button>
                    <button type="button" id="siswaYangHadirBtn" class="rounded-t-lg py-2 px-4 bg-white text-baseBlue">Siswa yang Hadir</button>
                </div>

                <!-- tabel rapor -->
                @livewire('kehadiran-siswa', ['kelas' => $kelas])
                <!-- akhir dari tabel rapor -->
                
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        const tabdaftarHadir = document.getElementById('daftarHadirBtn');
        const tabsiswaYangHadir = document.getElementById('siswaYangHadirBtn');
        const kontendaftarHadir = document.getElementById('daftarHadirContent');
        const kontensiswaYangHadir = document.getElementById('siswaYangHadirContent');

        tabsiswaYangHadir.addEventListener("click", function() {
            if (kontensiswaYangHadir.classList.contains('hidden')) {
                kontendaftarHadir.classList.add('hidden');
                kontensiswaYangHadir.classList.remove('hidden');
            
                tabsiswaYangHadir.classList.add('bg-baseBlue', 'text-white');
                tabsiswaYangHadir.classList.remove('bg-white', 'text-baseBlue');
                tabdaftarHadir.classList.remove('bg-baseBlue', 'text-white');
                tabdaftarHadir.classList.add('bg-white', 'text-baseBlue');
            }
        });

        tabdaftarHadir.addEventListener("click", function() {
            if (kontendaftarHadir.classList.contains('hidden')) {
                kontensiswaYangHadir.classList.add('hidden');
                kontendaftarHadir.classList.remove('hidden');
             
                tabdaftarHadir.classList.add('bg-baseBlue', 'text-white');
                tabdaftarHadir.classList.remove('bg-white', 'text-baseBlue');
                tabsiswaYangHadir.classList.remove('bg-baseBlue', 'text-white');
                tabsiswaYangHadir.classList.add('bg-white', 'text-baseBlue');
            }
        });
    </script>
</body>
</html>