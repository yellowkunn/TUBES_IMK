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
                    <a href="">Dashboard</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Matematika SMP</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Pertemuan 4</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Absensi</a>
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

                <!-- tabel rapor -->
                <form action="" method="post">
                @csrf
                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                    <thead class="border-b border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
                        <th scope="col" class= "px-12 py-2">No.</th>
                        <th scope="col" class= "w-full px-12 py-2">Nama</th>
                        <th scope="col" class= "px-12 py-2">Kehadiran</th>
                    </thead>
                        
                    <tbody class="bg-baseDarkerGreen/10">
                        <tr>
                            <td class="px-12 py-4 font-semibold">1.</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>Dadang</p>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="bg-white/10 border-2 border-greyIcon rounded drop-shadow-regularShadow" name="" id="">
                            <td>
                        </tr>
                        <tr>
                            <td class="px-12 py-4 font-semibold">2.</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>Dadang</p>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="bg-white/10 border-2 border-greyIcon rounded drop-shadow-regularShadow" name="" id="">
                            <td>
                        </tr>
                        <tr>
                            <td class="px-12 py-4 font-semibold">3.</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>Dadang</p>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="bg-white/10 border-2 border-greyIcon rounded drop-shadow-regularShadow" name="" id="">
                            <td>
                        </tr>
                        <tr>
                            <td class="px-12 py-4 font-semibold">4.</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>Dadang</p>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="bg-white/10 border-2 border-greyIcon rounded drop-shadow-regularShadow" name="" id="">
                            <td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-8 flex justify-end gap-6">
                    <button type="reset" class="text-greyIcon hover:font-semibold">Reset</button>
                    <button type="submit" class="text-baseDarkerGreen bg-white border-2 border-baseDarkerGreen p-1.5 px-5 rounded-lg
                            hover:bg-baseDarkerGreen hover:text-white hover:font-semibold" style="box-shadow: 
                                0px 4px 5px 0 rgba(105,212,220,0.3);">Simpan</button>
                </div>
                </form>
                <!-- akhir dari tabel rapor -->
                
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>