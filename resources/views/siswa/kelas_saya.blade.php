@include('htmlhead')

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

<body class="font-Inter text-regularContent dark:dark-mode">
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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('kelas') }}" class="hover:font-semibold">Kelas</a>
                    </div>

                    <div class="flex justify-between mt-8">
                        <p class="text-title font-semibold">Kelas Saya</p>   
                        
                        <a href=" {{url('/../formulirpendaftaran')}} " class="bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-5 py-2 rounded-lg">
                        <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                            <p class="text-greyIcon font-semibold dark:text-white dark:font-normal">Tambah kelas</p>
                        </a>
                    </div>
                    
                    <!-- daftar kelas -->
                    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-12 mt-8">
                        @foreach($siswas as $siswa)
                        @php
                        $kelas = $siswa->kelas;
                        @endphp
                        @if($kelas)
                        
                        <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white dark:dark:bg-[#374151]/40 drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0 group">
                            <p class="font-semibold md:text-[20px] lg:text-subtitle">
                                {{ $kelas->nama }}
                            </p>
                            <div class="flex items-center">
                                @if($kelas->foto)
                                <img src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                @else
                                <p class="text-greyIcon">Foto tidak tersedia</p>
                                @endif
                            </div>
                            
                            <div class="flex flex-col gap-1">
                                <div class="flex gap-2 items-center mt-2">
                                    <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                                    <p class="my-auto font-normal">
                                        {{ $kelas->jadwal_hari }}
                                    </p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                                    <p class="my-auto font-normal">
                                        {{ $kelas->durasi }} /sesi
                                    </p>
                                </div>
                            </div>

                            <a href="{{ route('programkelas', ['kelas' => $kelas->id_kelas]) }}"
                                class="dark:bg-[#313A49] text-center text-white group-hover:font-semibold bg-baseBlue/80 group-hover:bg-baseBlue w-full rounded-lg py-2 mt-4">Lihat Detail
                            </a>

                            <div class="absolute bg-baseBlue/80 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
                        </div>
                        
                        @endif
                        @endforeach
                    </div>
                    <!-- akhir dari daftar kelas -->

                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
    @include('components.footer')
    </div>

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