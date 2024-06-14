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
                    @livewire('new-access', ['groupedPertemuans' => $groupedPertemuans])
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
