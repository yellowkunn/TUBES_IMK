<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                </div>

                <div class="bg-baseDarkerGreen rounded-xl p-6 md:p-12 relative my-7 font-semibold text-white">
                    <div class="flex flex-col gap-2 text-start md:w-1/2">
                        <p class="text-subtitle">Hello {{ Auth::user()->username }}!</p>
                        <p>Jangan lupa kelas kamu selanjutnya di hari Selasa pukul 10.00 ya!</p>
                    </div>
                    <div class="absolute right-5 top-0 invisible md:visible">
                        <img src="{{asset('images/cartoon4dashboardUser.png')}}" alt="" width=220>
                    </div>
                </div>

                <div class="md:flex gap-14 mt-12">
                    <div class="md:w-2/3">
                        <div class="flex justify-between">
                            <p class="text-subtitle font-semibold">Baru diakses</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>

                        <!-- baru diakses -->
                        <div class="flex flex-col gap-4 my-5">
                            <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow relative group">
                                <div>
                                    <div class="bg-baseBlue h-1/3 group-hover:h-1/2 absolute top-12 group-hover:top- left-4 rounded-full transform -translate-x-1/2 duration-300 w-1"></div>
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex flex-col">
                                        <p class="font-semibold">Pertemuan $pertemuan->pertemuan_ke</p>
                                        <p class="">$materi->pertemuan->file_materi</p>
                                        <p class="text-greyIcon text-smallContent mt-3">$pertemuan->tgl_pertemuan</p>
                                    </div>
                                    <div class="flex my-auto gap-6">
                                        <p class="text-baseDarkerGreen bg-baseDarkerGreen/20 h-fit p-2 px-4 rounded-full">Carbon::parse($pertemuan->tgl_pertemuan)->format('F')</p>
                                        <button class="bg-baseBlue/80 hover:bg-baseBlue hover:font-semibold text-white px-4 rounded-full">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- daftar kelas -->
                        <div class="flex justify-between my-5 mt-12">
                            <p class="text-subtitle font-semibold">Kelas</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>
                        
                        <div class="sm:grid grid-cols-2 gap-4 lg:gap-12 mt-8">
                                <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0 group">
                                    <p class="font-semibold md:text-[20px] lg:text-subtitle">
                                        $kelas->nama
                                    </p>
                                    <div class="flex items-center">
                                        if($kelas->foto)
                                        <img src="asset('berkas_ujis/' . $kelas->foto)" alt="$kelas->nama" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                        else
                                        <p class="text-greyIcon">Foto tidak tersedia</p>
                                        endif
                                    </div>
                                    
                                    <div class="flex flex-col gap-1">
                                        <div class="flex gap-2 items-center mt-2">
                                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                                            <p class="my-auto font-normal">
                                                $kelas->jadwal_hari
                                            </p>
                                        </div>
                                        <div class="flex gap-2 items-center">
                                            <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                                            <p class="my-auto font-normal">
                                                $kelas->durasi /sesi
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-6 items-center mt-4">
                                        <div class="flex relative">
                                            <!-- ini mmg yg di nampakkan 3 siswa kelasnya aja ya -->
                                            <img class="w-8 h-8 object-cover rounded-full z-0" src="https://static.vecteezy.com/system/resources/thumbnails/005/346/410/small_2x/close-up-portrait-of-smiling-handsome-young-caucasian-man-face-looking-at-camera-on-isolated-light-gray-studio-background-photo.jpg" alt="">
                                            <img class="w-8 h-8 object-cover rounded-full absolute z-10 left-4" src="https://bonnierpublications.com/app/uploads/2022/05/woman-1.jpg" alt="">
                                            <img class="w-8 h-8 object-cover rounded-full absolute z-20 left-8" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCKhSSwriyDJ4jG9pHgrfUFjfM3jbemkw0Jw&s" alt="">
                                        </div>
                                        <p class="text-greyIcon relative left-3 top-0.5 text-smallContent">$kelas->total_siswa Siswa</p>
                                    </div>

                                    <a href=""
                                        class="text-center text-white group-hover:font-semibold bg-baseBlue/80 group-hover:bg-baseBlue w-full rounded-lg py-2 mt-4">Lihat Detail
                                    </a>
                                    <div class="absolute bg-baseBlue/80 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
                                </div>
                            </div>
                            
                        <!-- akhir dari daftar kelas -->

                        <div class="flex justify-between my-5 mt-12">
                            <p class="text-subtitle font-semibold">Sertifikat terbaru</p>
                            <a href="" class="text-[#00e]">Selengkapnya</a>
                        </div>
                    </div>

                    <div class="md:w-1/3">
                        <p class="text-subtitle font-semibold">Kalender</p>

                        <!-- baru diakses -->
                        <div class="flex flex-col gap-4 my-5">
                            <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow">
                                <div class="flex justify-between">
                                    tes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('components.footer')
</body>
</html>