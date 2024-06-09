<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengajar</title>

     <!-- google font for icon -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @livewireStyles

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
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
                    <a href="" class="hover:font-semibold"> $kelasDetail->nama  $kelasDetail->tingkat_kelas </a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href=" route('tambah_pertemuan') " class="hover:font-semibold">Tambah</a>
                </div>
                @livewire('tambah-pertemuan', ['kelas' => $kelas])
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

@livewireScripts

<script>
    function showPopupMateri() {
    document.getElementById('popupMateri').classList.toggle('hidden');
}

function showPopupLatihan() {
    document.getElementById('popupLatihan').classList.toggle('hidden');
}

</script>
</body>
</html>