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
                        <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">
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
                                                    <button><i class="fa-solid fa-arrow-right-to-bracket rotate-90"></i></button>
                                                    <button onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})"><i class="fa-regular fa-trash-can fa-lg"></i></button>
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
                        <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">
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

                @if ($siswas)
                    @foreach ($siswas as $siswa)
                    <!-- Pop up hapus data siswa -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                                w-full h-screen" id="popupHapusDataSiswa{{ $siswa->id_siswa }}">
                        <div class="flex flex-col justify-center max-w-[350px]">
                            <div class="bg-white rounded-xl px-10 py-8">
                                <div class="text-end">
                                    <button onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})">
                                        <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                                    </button>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[52px] h-[52px] mx-auto">
                                        <circle cx="26" cy="26" r="26" fill="#FF3838" fill-opacity="0.1"></circle>
                                        <circle cx="26" cy="26" r="21" fill="#FF3838" fill-opacity="0.15"></circle>
                                        <g clip-path="url(#clip0_213_507)">
                                            <path d="M27 20C27 19.4469 26.5531 19 26 19C25.4469 19 25 19.4469 25 20V28C25 28.5531 25.4469 29 26 29C26.5531 29 27 28.5531 27 28V20ZM26 33C26.3315 33 26.6495 32.8683 26.8839 32.6339C27.1183 32.3995 27.25 32.0815 27.25 31.75C27.25 31.4185 27.1183 31.1005 26.8839 30.8661C26.6495 30.6317 26.3315 30.5 26 30.5C25.6685 30.5 25.3505 30.6317 25.1161 30.8661C24.8817 31.1005 24.75 31.4185 24.75 31.75C24.75 32.0815 24.8817 32.3995 25.1161 32.6339C25.3505 32.8683 25.6685 33 26 33Z" fill="#D60101"></path>
                                        </g>
                                        <circle cx="26" cy="26" r="11" stroke="#D60101" stroke-width="2"></circle>
                                        <defs>
                                            <clipPath id="clip0_213_507">
                                                <rect width="2" height="16" fill="white" transform="translate(25 18)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                    <p class="font-semibold text-greyIcon text-balance text-center">
                                        Apakah anda yakin ingin menghapus siswa bernama {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}?
                                    </p>

                                    <form action=" route('siswa.hapus', $siswa->id_siswa) " method="post">
                                        @csrf
                                        <div class="flex justify-between gap-4 mt-4">
                                            <button type="button" onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})" class="text-greyIcon w-full hover:font-semibold">Batal</button>
                                            <button type="submit" class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                                    hover:bg-[#d60101] hover:text-white hover:font-semibold" style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir dari pop up hapus data siswa -->
                    @endforeach
                @endif

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

        function showPopupHapusDataSiswa(i) {
            document.getElementById('popupHapusDataSiswa'+i).classList.toggle('hidden');
        }
    </script>
</body>

</html>
