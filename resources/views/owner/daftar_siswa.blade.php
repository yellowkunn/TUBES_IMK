<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    <div>
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300"
                id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="">Tahun Ajaran</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="">Daftar Siswa</a>
                    </div>

                    <div class="flex justify-between items-center mt-7">
                        <p class="text-title font-semibold">Daftar Siswa</p>
                        <form action="" method="get" class="flex justify-between items-center relative">
                            <input autocomplete="off" type="text" id="search" name="search" value=""
                                class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full"
                                placeholder="Cari">
                            <button type="submit" class="absolute right-5"><i
                                    class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                        </form>
                    </div>

                    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border">
                        <!-- tabel rapor -->
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
                            style="color: #191919">
                            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                                style="color: #717171">
                                <th scope="col" class= "w-2 px-8 py-3">No.</th>
                                <th scope="col" class= "px-8 py-3">Nama Lengkap</th>
                                <th scope="col" class= "px-8 py-3">Tingkat</th>
                                <th scope="col" class= "px-8 py-3">Kelas</th>
                                <th scope="col" class= "px-8 py-3">Hari</th>
                                <th scope="col" class= "px-8 py-3">Waktu</th>
                                <!-- <th scope="col" class= "px-8 py-3">Guru</th> -->
                                <th scope="col" class= "px-8 py-3">Aksi</th>
                            </thead>

                            <tbody>
                                @php $nomor = 1; @endphp
                                @if ($siswas)
                                    @foreach ($siswas as $siswa)
                                        <tr class="bg-greyBackground">
                                            <td class="px-8 py-4">{{ $nomor++ }}</td>
                                            <td class="px-8 py-4">
                                                {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}
                                            </td>
                                            <td class="px-8 py-4">
                                                {{ $siswa->pengguna->biodataSiswa->tingkat_kelas ?? '-' }}
                                            </td>
                                            <td class="px-8 py-4">{{ $siswa->kelas->nama ?? '-' }}
                                            </td>
                                            <td class="px-8 py-4">
                                                {{ $siswa->kelas->jadwal_hari ?? '-' }}</td>
                                            <td class="px-8 py-4">
                                                {{ $siswa->kelas->jadwal_waktu ?? '-' }}
                                            </td>
                                            <td class="px-8 py-4">
                                                @if($siswa->kelas && $siswa->kelas->pengajar->isNotEmpty())
                                                {{ $siswa->kelas->pengajar->first()?->pengguna->biodataPengajar->nama_lengkap ?? '-' }}
                                            @else
                                                -
                                            @endif
                                            
                                            </td>
                                            <td class="px-8 py-4 flex items-center gap-4">
                                                <i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i>
                                                <i class="fa-regular fa-eye"></i>
                                                <span class="material-symbols-outlined text-xl">military_tech</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
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
