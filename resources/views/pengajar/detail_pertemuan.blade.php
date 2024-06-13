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

    @livewire('filter-detail-pertemuan', ['pertemuan' => $p1])

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
