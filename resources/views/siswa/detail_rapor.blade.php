<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor Bulanan</title>

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
                <a href="">Rapor</a>
                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                <a href="">Bahasa Inggris</a>
                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                <a href="">Rapor Bulanan</a>
            </div>

            <p class="text-title font-semibold mt-7 mb-4 md:mb-6">Rapor Bulanan</p>
                
            <div class="bg-white drop-shadow-regularShadow py-3 mb-8 rounded-lg border">
                <!-- tabel rapor -->
                <div class="overflow-x-auto">
                    <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <div class="px-4 sm:px-12 flex justify-between border-b border-neutral-200 font-semibold" style="color: #717171">
                            <p class="py-3 text-[18px] sm:text-[20px] md:text-subtitle">Nama Mapel</p>
                            <p class="py-4">Nama Pengajar, S.Pd</p>
                        </div>
                        
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
                                <tr>
                                    <th scope="col" class="px-4 sm:px-12 py-2">No.</th>
                                    <th scope="col" class="w-full px-4 sm:px-12 py-2">Bidang</th>
                                    <th scope="col" class="px-4 sm:pe-24 py-2">Nilai</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr class="border-b border-neutral-200">
                                    <td class="px-4 sm:px-12 py-4">1.</td>
                                    <td class="px-4 sm:px-12 py-4">Bidang</td>
<<<<<<< HEAD
                                    <td class="px-4 sm:px-12 md:px-4 py-4">Nilai</td>
=======
                                    <td class="px-4 sm:px-12 md:px-4">Nilai</td>
>>>>>>> 1c0393c8118f00eb405585e606b558fddfeef275
                                </tr>
                                <tr class="border-b border-neutral-200">
                                    <td class="px-4 sm:px-12 py-4">2.</td>
                                    <td class="px-4 sm:px-12 py-4">Bidang</td>
                                    <td class="px-4 sm:px-12 md:px-4">Nilai</td>
                                </tr>
                                <tr class="border-b border-neutral-200">
                                    <td class="px-4 sm:px-12 py-4">3.</td>
                                    <td class="px-4 sm:px-12 py-4">Bidang</td>
                                    <td class="px-4 sm:px-12 md:px-4">Nilai</td>
                                </tr>
                                <tr class="border-b border-neutral-200">
                                    <td class="px-4 sm:px-12 py-4">4.</td>
                                    <td class="px-4 sm:px-12 py-4">Bidang</td>
                                    <td class="px-4 sm:px-12 md:px-4">Nilai</td>
                                </tr>
                                <tr>
                                    <td class="px-4 sm:px-12 py-4 font-semibold">Total</td>
                                    <td></td>
                                    <td class="px-4 sm:px-12 md:px-4">Nilai</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- akhir dari tabel rapor -->
            </div>


            <!-- note -->
            <div class="bg-white drop-shadow-regularShadow border-b rounded-lg">
                <div class="bg-baseDarkerGreen rounded-t-lg p-4 px-6">
                    <p class="text-white font-semibold">Catatan</p>
                </div>
                <div class="p-4 px-6 min-h-[80px]">
                    <p class="text-wrap"></p>
                </div>
            </div>
            <!-- akhir dari note -->
            </div>
        </div>
    </div>
    </div>

    @include('components.footer')


<script src="{{asset('js/style.js')}}"></script>
</body>
</html>