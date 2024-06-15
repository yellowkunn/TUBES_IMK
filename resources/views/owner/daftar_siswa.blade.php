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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="" class="hover:font-semibold">Tahun Ajaran</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('editdaftarsiswa') }}" class="hover:font-semibold">Daftar Siswa</a>
                    </div>

                    <div class="flex justify-between items-center my-7">
                        <p class="text-title font-semibold">Daftar Siswa</p>
                        <form action="" method="get" class="flex justify-between items-center relative">
                            <input autocomplete="off" type="text" id="search" name="search" value=""
                                class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full"
                                placeholder="Cari">
                            <button type="submit" class="absolute right-5"><i
                                    class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                        </form>
                    </div>

                    <div class="border-b-2 border-baseBlue w-full flex gap-6 mb-10">
                        <button type="button" id="siswaBtn" class="rounded-t-lg bg-baseBlue py-2 px-4 text-white">Siswa</button>
                        <button type="button" id="penggunaBtn" class="rounded-t-lg py-2 px-4 bg-white text-baseBlue">Pengguna</button>
                    </div>

                    <div id="siswaContent">
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
                                    <th scope="col" class= "px-8 py-3">Guru</th>
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
                                                    {{ $siswa->kelas->pengajar->first()?->pengguna->biodataPengajar->nama_lengkap ?? '-' }}
                                                </td>
                                                <td class="px-8 py-4 flex items-center gap-4">
                                                    <i class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>
                            </table>
                            <!-- akhir dari tabel rapor -->
                        </div>
                    </div>

                    <div id="penggunaContent" class="hidden">
                        <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border">
                            <!-- tabel rapor -->
                            <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
                                style="color: #191919">
                                <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                                    style="color: #717171">
                                    <th scope="col" class= "w-2 px-8 py-3">No.</th>
                                    <th scope="col" class= "px-8 py-3">Nama Pengguna</th>
                                    <th scope="col" class= "px-8 py-3">Email</th>
                                    <th scope="col" class= "px-8 py-3">Status</th>
                                    <th scope="col" class= "px-8 py-3">Aksi</th>
                                </thead>

                                <tbody>
                                    @php $nomor = 1; @endphp
                                    @if ($penggunas)
                                        @foreach ($penggunas as $p)
                                            <tr class="bg-greyBackground">
                                                <td class="px-8 py-4">{{ $nomor++ }}</td>
                                                <td class="px-8 py-4">
                                                    {{ $p->username ?? '-' }}
                                                </td>
                                                <td class="px-8 py-4">
                                                    {{ $p->email ?? '-' }}
                                                </td>
                                                <td class="px-8 py-4">
                                                    {{ $p->role ?? '-' }}
                                                </td>
                                                <td class="px-8 py-4 flex items-center gap-4">
                                                    <i
                                                    class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i>
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
    </div>

    @include('components.footer')

    <script>
        const siswaBtn = document.getElementById('siswaBtn');
        const penggunaBtn = document.getElementById('penggunaBtn');
        const kontensiswa = document.getElementById('siswaContent');
        const kontenpengguna = document.getElementById('penggunaContent');

        penggunaBtn.addEventListener("click", function() {
            if (kontenpengguna.classList.contains('hidden')) {
                kontensiswa.classList.add('hidden');
                kontenpengguna.classList.remove('hidden');
            
                penggunaBtn.classList.add('bg-baseBlue', 'text-white');
                penggunaBtn.classList.remove('bg-white', 'text-baseBlue');
                siswaBtn.classList.remove('bg-baseBlue', 'text-white');
                siswaBtn.classList.add('bg-white', 'text-baseBlue');
            }
        });

        siswaBtn.addEventListener("click", function() {
            if (kontensiswa.classList.contains('hidden')) {
                kontenpengguna.classList.add('hidden');
                kontensiswa.classList.remove('hidden');
             
                siswaBtn.classList.add('bg-baseBlue', 'text-white');
                siswaBtn.classList.remove('bg-white', 'text-baseBlue');
                penggunaBtn.classList.remove('bg-baseBlue', 'text-white');
                penggunaBtn.classList.add('bg-white', 'text-baseBlue');
            }
        });
    </script>
</body>

</html>
