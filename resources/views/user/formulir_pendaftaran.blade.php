<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
    @include('components.navbar')

    <div id="content" class="px-24 py-10">

    <!-- page hierarchy -->
    <div class="flex items-center gap-2 text-smallContent">
        <a href="">Dashboard</a>
        <i class="fa-solid fa-caret-right text-baseBlue"></i>
        <a href="">Detail Kelas</a>
        <i class="fa-solid fa-caret-right text-baseBlue"></i>
        <a href="">Formulir</a>
    </div>

    <p class="text-title font-semibold my-7">Keterangan tentang diri</p>
        
    </div>

    @include('components.footer')
</body>
</html>