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
    <div class="max-w-[1440px]">
    @include('components.siswa.navbar')

    <div class="grid grid-cols-6">
        <div class="hidden md:flex">
            @include('components.siswa.sidebar')
        </div>
        
        <!-- content -->
        <div class="col-span-5">
            <div id="content" class="px-7 py-28">

            <!-- page hierarchy -->
            <div class="flex items-center gap-2 text-smallContent">
                <a href="">Dashboard</a>
                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                <a href="">Sertifikat</a>
            </div>

            <p class="text-title font-semibold my-7">Sertifikat Saya</p>
                
                <div class="bg-white drop-shadow-regularShadow py-3 my-8 rounded-lg border text-regularContent">
                    <!-- tabel rapor -->
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
                            <th scope="col" class= "w-2 px-12 py-3">No.</th>
                            <th scope="col" class= "px-12 py-3">Nama Sertifikat</th>
                            <th scope="col" class= "px-12 py-3">Tanggal</th>
                            <th scope="col" class= "px-12 py-3">Aksi</th>
                        </thead>
                            
                        <tbody>
                            <tr class="border-b border-neutral-200">
                                <td class="px-12 py-4">1.</td>
                                <td class="px-12 py-4">Sertif</td>
                                <td class="px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-200 bg-greyBackground">
                                <td class="px-12 py-4">2.</td>
                                <td class="px-12 py-4">Sertif</td>
                                <td class="px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-200">
                                <td class="px-12 py-4">3.</td>
                                <td class="px-12 py-4">Sertif</td>
                                <td class="px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="bg-greyBackground">
                                <td class="px-12 py-4">4.</td>
                                <td class="px-12 py-4">Sertif</td>
                                <td class="px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- akhir dari tabel rapor -->
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

    @include('components.footer')
</body>
</html>