<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Saya</title>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter text-regularContent">
    <div>
    @include('components.siswa.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
            @include('components.siswa.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">

            <!-- page hierarchy -->
            <div class="flex items-center gap-2 text-smallContent">
                <a href="">Dashboard</a>
                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                <a href="">Sertifikat</a>
            </div>

            <p class="text-title font-semibold mt-7 mb-4 md:mb-6">Sertifikat Saya</p>
                
            <div class="bg-white drop-shadow-regularShadow py-3 mb-8 rounded-lg border">
                <!-- tabel rapor -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
                            <tr>
                                <th scope="col" class="w-2 px-4 sm:px-12 py-3">No.</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Nama Sertifikat</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Tanggal</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Aksi</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <tr class="border-b border-neutral-200">
                                <td class="px-4 sm:px-12 py-4">1.</td>
                                <td class="px-4 sm:px-12 py-4">Sertif</td>
                                <td class="px-4 sm:px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-4 sm:px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-200 bg-greyBackground">
                                <td class="px-4 sm:px-12 py-4">2.</td>
                                <td class="px-4 sm:px-12 py-4">Sertif</td>
                                <td class="px-4 sm:px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-4 sm:px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="border-b border-neutral-200">
                                <td class="px-4 sm:px-12 py-4">3.</td>
                                <td class="px-4 sm:px-12 py-4">Sertif</td>
                                <td class="px-4 sm:px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-4 sm:px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                            <tr class="bg-greyBackground">
                                <td class="px-4 sm:px-12 py-4">4.</td>
                                <td class="px-4 sm:px-12 py-4">Sertif</td>
                                <td class="px-4 sm:px-12 py-4">30 April 2024</td>
                                <td class="flex gap-4 text-greyIcon py-4 px-4 sm:px-12">
                                    <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                    <i class="fa-regular fa-eye"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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