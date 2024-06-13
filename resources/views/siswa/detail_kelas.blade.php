<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
    <div>
        @include('components.siswa.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300"
                id="sidebar">
                @include('components.siswa.sidebar')
            </div>
            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('kelas') }}" class="hover:font-semibold">Kelas</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('programkelas', ['kelas' => $kelas->id_kelas]) }} "
                            class="hover:font-semibold">{{ $kelas->nama }}</a>
                    </div>

                    <div class="mt-8">
                        <!-- Cek apakah $kelas memiliki nama -->
                        @if (isset($kelas->nama))
                            <p class="text-title font-semibold">{{ $kelas->nama }}</p>
                        @else
                            <p class="text-title font-semibold">Nama kelas tidak tersedia</p>
                        @endif

                        <!-- Cek apakah $kelas memiliki pengajar -->
                        @if (isset($kelas->pengajar) &&
                                count($kelas->pengajar) > 0 &&
                                isset($kelas->pengajar[0]->pengguna->biodataPengajar->nama_lengkap))
                            <p class="text-smallContent text-greyIcon">
                                {{ $kelas->pengajar[0]->pengguna->biodataPengajar->nama_lengkap }}</p>
                        @else
                            <p class="text-smallContent text-greyIcon">Pengajar tidak tersedia</p>
                        @endif

                    </div>

                    <div class="my-8 flex flex-col gap-6">
                        <!-- perulangan pertemuan -->
                        @if (collect($groupedPertemuans)->isNotEmpty())
                            @foreach ($groupedPertemuans as $index => $pertemuan)
                                <!-- Tambahkan $index untuk membuat ID unik -->
                                <div class="dropdown group" data-index="{{ $index }}">
                                    <div id="tabPertemuan-{{ $index }}"
                                        class="rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
                                        <div>
                                            <div>
                                                <div
                                                    class="bg-baseBlue h-1/3 group-hover:h-1/2 absolute top-[3.5vh] group-hover:top-5 left-4 rounded-full transform -translate-x-1/2 duration-300 w-1">
                                                </div>
                                            </div>
                                            <div class="ms-1">
                                                <p class="font-semibold">Pertemuan {{ $pertemuan->pertemuan_ke }}</p>
                                                <p class="text-smallContent">pertemuan {{ $pertemuan->judul }}</p>
                                            </div>
                                        </div>
                                        @livewire('barudiakses', ['pertemuan' => $pertemuan])
                                    </div>

                                    <div id="contentPertemuan-{{ $index }}" class="hidden">
                                        <!-- Modifikasi ID agar unik -->
                                        <div
                                            class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-2.5">
                                            <p class="font-semibold">Materi</p>
                                        </div>

                                        <div class="bg-baseCream w-full rounded-b-xl">
                                            <div class="grid divide-y-2">
                                                @if ($pertemuan->materi->isNotEmpty())
                                                    <div class="flex gap-4 px-8 p-1.5 text-greyIcon text-smallContent">
                                                        <p>
                                                            <span class="font-semibold">Dapat diakses:</span>
                                                            {{ \Carbon\Carbon::parse($pertemuan->materi[0]->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($pertemuan->materi[0]->jam_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                    @foreach ($pertemuan->materi as $materi)
                                                        <div class="flex gap-3 p-3 px-8 items-center">
                                                            <i class="fa-regular fa-file"></i>
                                                            @php
                                                                $fileUrl = asset('storage/' . $materi->file_materi);
                                                            @endphp
                                                            <a href="{{ $fileUrl }}"
                                                                target="_blank">{{ $materi->nama_asli_file_materi }}</a>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>

                                        <div
                                            class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                                            <p class="font-semibold">Latihan</p>
                                        </div>

                                        <div class="bg-baseCream w-full rounded-b-xl">
                                            @if ($pertemuan->tugas->isNotEmpty())
                                                <div class="grid divide-y-2">
                                                    <div class="flex gap-8 px-8 p-1.5 text-greyIcon text-smallContent">
                                                        <div class="flex gap-4">
                                                            <p>
                                                                <span class="font-semibold">Dapat diakses:</span>
                                                                {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->tgl_akses)->translatedFormat('d F Y') }},
                                                                {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->jam_akses)->format('g:i A') }}
                                                            </p>
                                                        </div>
                                                        <div class="flex gap-4">
                                                            <p>
                                                                <span class="font-semibold">Tenggat:</span>
                                                                {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->tgl_batas_akses)->translatedFormat('d F Y') }},
                                                                {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->jam_batas_akses)->format('g:i A') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @foreach ($pertemuan->tugas as $tugas)
                                                        <div class="flex gap-3 p-3 px-8 items-center">
                                                            <i class="fa-regular fa-file"></i>
                                                            @php
                                                                $fileUrl = asset(
                                                                    'storage/' . $pertemuan->tugas[0]->file_materi,
                                                                );
                                                            @endphp
                                                            <a href="{{ $fileUrl }}"
                                                                target="_blank">{{ $pertemuan->tugas[0]->nama_asli_file_tugas }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>



                                        <div
                                            class="bg-white p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                                            <p class="font-semibold">Link</p>
                                        </div>

                                        <div class="bg-baseCream w-full rounded-b-xl">
                                            @if ($pertemuan->link->isNotEmpty())
                                                <div class="grid divide-y-2">
                                                    @foreach ($pertemuan->link as $link)
                                                        <div class="flex gap-3 p-3 px-8 items-center">
                                                            <i class="fa-regular fa-file"></i>
                                                            <a href="{{ $link->url }}" target="_blank"
                                                                style="display: block; text-decoration: none; font-size: 16px;">
                                                                {{ $link->url }}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div
                                class="rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
                                <div>
                                    <div>
                                        <div
                                            class="bg-baseBlue h-1/3 group-hover:h-1/2 absolute top-[3.5vh] group-hover:top-5 left-4 rounded-full transform -translate-x-1/2 duration-300 w-1">
                                        </div>
                                    </div>
                                    <div class="ms-1">
                                        <p class="font-semibold">Belum ada pertemuan </p>
                                        <p class="text-smallContent">~</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- akhir dari perulangan pertemuan -->
                    </div>
                </div>
            </div>
        </div>

        @include('components.footer')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropdowns = document.querySelectorAll('.dropdown');

                dropdowns.forEach(dropdown => {
                    const index = dropdown.getAttribute('data-index');
                    tab_pertemuan('iconDD-' + index, 'contentPertemuan-' + index, 'tabPertemuan-' + index);
                });
            });

            function tab_pertemuan(idDD, contentPertemuan, tabPertemuan) {
                const dropdownButton = document.getElementById(idDD);
                const dropdownContent = document.getElementById(contentPertemuan);
                let isDropdownOpen = false;

                function toggleDropdown() {
                    isDropdownOpen = !isDropdownOpen;
                    if (isDropdownOpen) {
                        dropdownContent.classList.remove('hidden');
                        dropdownButton.classList.add('rotate-90');
                    } else {
                        dropdownContent.classList.add('hidden');
                        dropdownButton.classList.remove('rotate-90');
                    }
                }

                dropdownButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    toggleDropdown();
                });

                window.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                        dropdownContent.classList.add('hidden');
                        dropdownButton.classList.remove('rotate-90');
                        isDropdownOpen = false;
                    }
                });
            }

            function selectOption(event, index, option) {
                event.preventDefault();
                document.getElementById('selectedOption-' + index).textContent = option;
                document.getElementById('tabPertemuan-' + index).value = option;
                document.getElementById('contentPertemuan-' + index).classList.add('hidden');
                document.getElementById('iconDD-' + index).classList.remove('rotate-90');
                isDropdownOpen = false;
            }
        </script>
</body>

</html>
