<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Saya</title>

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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('raporpengajar',  ['kelas' => $kelas->id_kelas]) }}" class="hover:font-semibold">Rapor {{ $kelas->nama}}</a>
                    </div>

                    <p class="text-title font-semibold mt-8">Rapor Saya</p>   
                    
                    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">
                        <!-- tabel siswa -->
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
                            style="color: #191919">
                            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                                style="color: #717171">
                                <th scope="col" class= "px-8 py-3">No.</th>
                                <th scope="col" class= "w-5/6 px-8 py-3">Nama Lengkap</th>
                                <th scope="col" class= "w-1/6 px-8 py-3">Aksi</th>
                            </thead>

                            @php $nomor = 1; @endphp
                            @if (isset($siswas))
                            @foreach ($siswas as $siswa)
                            <tbody>
                                <tr class="bg-greyBackground">
                                    <td class="px-8 py-4">{{ $nomor++ }}.</td>
                                    <td class="px-8 py-4">
                                        {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}
                                    </td>
                                    
                                    <td class="px-8 py-4 flex items-center gap-4">
                                        <a href="{{ route('isirapor', ['kelas' => $kelas->id_kelas, 'siswa' => $siswa->id_siswa]) }}" class="bg-baseBlue/90 hover:bg-baseBlue rounded text-white px-4 py-2 hover:font-semibold flex items-center gap-2">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                            <p>Isi rapor</p>
                                            <input type="hidden" value="{{ $siswa->id_siswa }}">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                        <!-- akhir dari tabel siswa -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
    @include('components.footer')
    </div>

</body>

</html>