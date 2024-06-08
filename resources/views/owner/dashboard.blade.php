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
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <div class="flex justify-between">
                        <!-- <div class="drop-shadow-regularShadow rounded-xl p-7 px-12 pe-36 text-white bg-baseBlue">
                        <span class="material-symbols-outlined bg-white text-baseBlue p-1 rounded text-3xl">chair_alt</span>
                        <p class="font-semibold text-subtitle mt-3 my-1">Daftar Kelas</p>
                        <p class="text-smallContent">50 Orang</p>
                    </div> -->
                        <a href="{{ route('editdaftarkelas') }}">

                            <div class="border-2 border-greyBorder rounded-xl p-7 px-12 pe-36 text-greyIcon">
                                <span class="material-symbols-outlined bg-greyBackground p-1 rounded text-3xl">chair_alt</span>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Kelas</p>
                                <p class="text-smallContent" style="color: #949494">{{ count($kelass) }} kelas</p>
                            </div>
                        </a>
                        <a href="{{ route('editdaftarsiswa') }}">
                            <div class="border-2 border-greyBorder rounded-xl p-7 px-12 pe-36 text-greyIcon">
                                <span class="material-symbols-outlined bg-greyBackground p-1 rounded text-3xl">interactive_space</span>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Siswa</p>
                                <p class="text-smallContent" style="color: #949494">{{ count($siswaa) }} Orang</p>
                            </div>
                        </a>
                        <a href="{{ route('editdaftarpengajar') }}">
                            <div class="border-2 border-greyBorder rounded-xl p-7 px-12 pe-36 text-greyIcon">
                                <i class="fa-solid fa-chalkboard-user bg-greyBackground p-1 rounded text-2xl"></i>
                                <p class="font-semibold text-subtitle mt-3 my-1">Daftar Pengajar</p>
                                <p class="text-smallContent" style="color: #949494">{{ count($pengajarr) }} Orang</p>
                            </div>
                        </a>
                    </div>

                    <div class="flex justify-between mt-12">
                        <p class="text-subtitle font-semibold">Kelas yang sedang berjalan</p>
                        <a href="" class="text-[#00e]">Selengkapnya</a>
                    </div>

                    <!-- daftar kelas -->
                    <div class="flex gap-4 my-5">
                        @if($kelasss)
                        @foreach($kelasss as $kelas)
                        <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2">
                            <p class="font-semibold md:text-[20px] lg:text-subtitle">{{ $kelas->nama }}</p>
                            <div class="flex items-center">
                                @if($kelas->foto)
                                <img src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                @else
                                <p class="text-greyIcon">Foto tidak tersedia</p>
                                @endif
                            </div>
                            <p class="text-greyIcon text-wrap">{{ $kelas->deskripsi }}</p>
                            <p class="text-greyIcon">Siswa: {{ $kelas->total_siswa }}</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ url('/siswa/detailkelas/' . $kelas->id_kelas) }}">
                                    <button class="text-white font-semibold bg-baseBlue rounded-lg py-1.5 px-4 md:px-6 lg:px-8">Detail</button>
                                </a>
                            </div>
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