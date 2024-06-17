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

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    <div>
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent mb-5">
                    <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                </div>

                    <div class="lg:flex justify-between gap-4">
                        <!-- <div class="drop-shadow-regularShadow rounded-xl p-7 px-12 pe-36 text-white bg-baseBlue">
                        <span class="material-symbols-outlined bg-white text-baseBlue p-1 rounded text-3xl">chair_alt</span>
                        <p class="font-semibold text-subtitle mt-3 my-1">Daftar Kelas</p>
                        <p class="text-smallContent">50 Orang</p>
                    </div> -->
                        <a href="{{ route('editdaftarkelas') }}">
                            <div class="my-4 lg:my-0 bg-baseBlue/90 hover:bg-baseBlue rounded-xl p-7 px-12 pe-36 text-white">
                                <span class="material-symbols-outlined bg-white text-baseBlue p-1 rounded text-3xl">chair_alt</span>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Kelas</p>
                                <p class="text-white">{{ count($kelass) }} kelas</p>
                            </div>
                        </a>
                        <a href="{{ route('editdaftarsiswa') }}">
                            <div class="my-4 lg:my-0 border-2 border-greyBorder hover:bg-slate-50 rounded-xl p-7 px-12 pe-36 text-greyIcon">
                                <span class="material-symbols-outlined bg-slate-200 p-1 px-2 rounded text-3xl">interactive_space</span>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Siswa</p>
                                <p class="text-smallContent" style="color: #949494">{{ count($siswaa) }} siswa</p>
                            </div>
                        </a>
                        <a href="{{ route('editdaftarpengajar') }}">
                            <div class="my-4 lg:my-0 border-2 border-greyBorder hover:bg-slate-50 rounded-xl p-7 px-12 pe-36 text-greyIcon">
                                <i class="fa-solid fa-chalkboard-user bg-slate-200 p-1.5 px-2 rounded text-2xl"></i>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Pengajar</p>
                                <p class="text-smallContent" style="color: #949494">{{ count($pengajarr) }} pengajar</p>
                            </div>
                        </a>
                    </div>

                    <div class="flex justify-between mt-12">
                        <p class="text-subtitle font-semibold">Kelas yang sedang berjalan</p>
                        <a href="" class="text-[#00e]">Selengkapnya</a>
                    </div>

                    <!-- daftar kelas -->
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-12 mt-8">
                        @if($kelasss)
                        @foreach($kelasss as $kelas)
                        <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0 group">
                            <p class="font-semibold md:text-[20px] lg:text-subtitle">{{ $kelas->nama }}</p>
                            <div class="flex items-center">
                                @if($kelas->foto)
                                <img src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                @else
                                <p class="text-greyIcon">Foto tidak tersedia</p>
                                @endif
                            </div>
                            
                            <div class="flex gap-2 items-center mt-2">
                                <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                                <p class="my-auto font-normal">
                                    {{ $kelas->jadwal_hari }}
                                </p>
                            </div>
                            <div class="flex gap-2 items-center">
                                <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                                <p class="my-auto font-normal">
                                    {{ $kelas->durasi }}/sesi 
                                </p>
                            </div>

                            <div class="flex items-center mt-4 relative">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach($kelas->siswa as $siswa => $image)
                                    @if($index < 3)
                                        <img class="w-8 h-8 object-cover rounded-full ms-10 fixed z-{{ ($index * 10) }} left-{{ ($index * 4) }}" src="{{ asset('berkas_ujis/' . $image->pengguna->foto_profile) }}" alt="">
                                    @endif
                                @php
                                $index++;
                                @endphp
                                @endforeach
                                
                                @if($kelas->total_siswa < 2)
                                <p class="mt-1 text-greyIcon text-smallContent ms-10">{{ $kelas->total_siswa }} siswa</p>
                                @elseif($kelas->total_siswa == 2)
                                <p class="mt-1 text-greyIcon text-smallContent ms-14">{{ $kelas->total_siswa }} siswa</p>
                                @elseif($kelas->total_siswa > 2)
                                <p class="mt-1 text-greyIcon text-smallContent ms-[70px]">{{ $kelas->total_siswa }} siswa</p>
                                @endif
                            </div>
                            
                            <a href="{{ url('/siswa/detailkelas/' . $kelas->id_kelas) }}"
                                class="text-center text-white group-hover:font-semibold bg-baseBlue/80 group-hover:bg-baseBlue w-full rounded-lg py-2 mt-4">Lihat Detail
                            </a>

                            <div class="absolute bg-baseBlue/80 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <!-- akhir dari daftar kelas -->

                    <!-- <div class="flex justify-between mt-12"> -->
                    <!-- <p class="text-subtitle font-semibold">Pembayaran</p> -->
                    <!-- <a href="" class="text-[#00e]">Selengkapnya</a> -->
                    <!-- </div> -->

                    <!-- daftar pembayaran -->
                    <div class="w-full rounded-xl p-2 px-4">

                    </div>
                    <!-- akhir dari daftar pembayaran -->

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>

</html>