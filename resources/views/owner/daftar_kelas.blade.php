<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajar</title>

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

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href="">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="">Kelas</a>
                    </div>

                    <div class="flex justify-between items-center my-7">
                        <p class="text-title font-semibold">Daftar Kelas</p>
                        <form action="" method="get" class="flex justify-between items-center relative">
                            <input autocomplete="off" type="text" id="search" name="search" value="" class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full" placeholder="Cari">
                            <button type="submit" class="absolute right-5"><i class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                        </form>
                    </div>

                    <div class="grid grid-cols-3 gap-x-24 gap-y-16">
                        @foreach($kelass as $kelas)
                        <div class="bg-white rounded-lg pt-6 pb-8 px-12 drop-shadow-regularShadow relative">

                            <!-- dd more (edit & hapus) -->
                            <div>
                                <button id="dd-more{{ $loop->index }}" class="text-end w-full"><i class="fa-solid fa-ellipsis-vertical text-lg"></i></button>

                                <div id="dd-menu{{ $loop->index }}" class="hidden grid grid-cols-1 divide-y bg-white mt-2 rounded-md drop-shadow-regularShadow absolute top-7 right-14" style="color: #949494;">
                                    <button onclick="showPopupEditKelas()" class="w-full h-full flex items-center gap-2 py-1.5 px-5">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        <p>Edit</p>
                                    </button>
                                    <button onclick="showPopupHapusKelas()" class="w-full h-full flex items-center gap-2 py-1.5 px-5">
                                        <i class="fa-regular fa-trash-can"></i>
                                        <p>Hapus</p>
                                    </button>
                                </div>
                            </div>
                            <!-- akhir dari dd more (edit & hapus) -->
                            <div class="flex flex-col gap-2">
                                <p class="font-semibold">{{ $kelas->nama }} </p>
                                <p class="text-greyIcon text-smallContent hyphens-auto line-clamp-3">{{ $kelas->deskripsi }}</p>
                                <p class="font-semibold text-[#E9940C]">Rp{{ number_format($kelas->harga, 0, ',', '.') }} <br><span class="text-smallContent text-greyIcon font-normal">{{ $kelas->rentang }} / bulan</span></p>
                                <a href="{{ url('/editdetailkelas/' . $kelas->id_kelas) }}" class="rounded-full bg-baseBlue text-white font-semibold py-2 my-3 inline-block text-center">Detail</a>
                            </div>
                            <div class="absolute bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-3/4"></div>
                        </div>
                        @endforeach

                        <div class="bg-[#7AA1E2]/10 rounded-lg p-8 px-12 drop-shadow-regularShadow hover:bg-[#7AA1E2]/20">
                            <button onclick="showPopupTambahKelas()" class="text-end w-full h-full flex justify-center items-center gap-2 text-baseBlue">
                                <div class="p-0.5 px-[7px] border-2 border-[#7AA1E2] rounded-full">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="font-semibold text-baseBlue">Kelas Baru</p>
                            </button>
                        </div>
                    </div>

                    <!-- pop up tambah kelas baru -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen" id="popupTambahKelas">
                        <div class="flex flex-col justify-center max-w-[600px]">
                            <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                <p class="text-title">Tambah Kelas</p>
                                <button onclick="showPopupTambahKelas()">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                                <form action="/tambahkelasbaru" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="overflow-y-auto max-h-96 pe-7 flex flex-col gap-5 mt-5 px-0.5">
                                        <div>
                                            <p class="font-semibold mb-1">Nama Kelas</p>
                                            <input class="rounded w-full h-9" type="text" name="nama" id="nama">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Tingkat Kelas</p>
                                            <select id="" name="tingkat_kelas" class="rounded w-full h-9">
                                                <option value="" class="text-greyIcon">Kelas</option>
                                                <option value="SD">SD</option>
                                                <option class="text-greyIcon" value="SMP">SMP</option>
                                                <option class="text-greyIcon" value="SMA">SMA</option>
                                                <option class="text-greyIcon" value="Gap Year">Gap Year</option>
                                                <option class="text-greyIcon" value="TOEFL">TOEFL</option>
                                                <option class="text-greyIcon" value="IELTS">IELTS</option>
                                            </select>
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Keterangan</p>
                                            <input class="rounded w-full h-9" type="text" name="deskripsi" id="deskripsi">
                                        </div>

                                        <div>
                                            <p for="harga" class="font-semibold">Harga</p>

                                            <div class="flex justify-between gap-2 h-9">
                                                <input class="rounded w-5/6" type="number" name="harga" id="harga">
                                                <p class="text-2xl text-greyIcon my-auto">/</p>
                                                <input class="rounded w-1/3" type="text" name="rentang" id="rentang" placeholder="Rentang">
                                            </div>
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Fasilitas</p>
                                            <input class="rounded w-full h-9" type="text" name="fasilitas" id="fasilitas">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Pilih Hari</p>
                                            <input class="rounded w-full h-9" type="text" name="jadwal_hari" id="jadwal_hari">
                                        </div>
                                        
                                        <div>
                                            <p class="font-semibold mb-1">Durasi</p>
                                            <input class="rounded w-full h-9" type="text" name="durasi" id="durasi">
                                        </div>

                                        <div>
                                            <p class="font-semibold mb-1">Foto Kelas</p>
                                            <input type="file" accept="image/*" name="gambar" id="gambar" class="file:text-baseBlue file:font-semibold 
                                                    file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer mt-1" required>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-end gap-6">
                                        <button type="button" onclick="showPopupTambahKelas()" class="text-greyIcon hover:text-black">Batal</button>
                                        <button type="submit" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                            hover:bg-baseBlue hover:text-white" style="box-shadow: 
                                            0px 0px 5px 1px rgba(122,161,226,0.3);">Tambah</button>
                                    </div>
                                </form>
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- akhir dari pop up tambah kelas baru -->

                    <!-- pop up edit kelas -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen" id="popupEditKelas">
                        <div class="flex flex-col justify-center max-w-[450px]">
                            <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                <p class="text-title">Edit Kelas</p>
                                <button onclick="showPopupEditKelas()">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                                <form action="" method="post" class="flex flex-col gap-5">
                                    <div>
                                        <p class="font-semibold mb-1">Nama Kelas</p>
                                        <input class="rounded w-full h-9" type="text" name="namaKelas" id="namaKelas" value="Nama Kelas">
                                    </div>

                                    <div>
                                        <p class="font-semibold mb-1">Keterangan</p>
                                        <input class="rounded w-full h-9" type="text" name="keterangan" id="keterangan" value="Lorem ipsum">
                                    </div>

                                    <div>
                                        <p for="harga" class="font-semibold">Harga</p>

                                        <div class="flex justify-between gap-4 h-9">
                                            <input class="rounded w-5/6" type="number" name="harga" id="harga" value="500000">
                                            <p class="text-2xl text-greyIcon my-auto">/</p>
                                            <input class="rounded w-1/3" type="text" name="rentang" id="rentang" placeholder="Rentang" value="8 Pertemuan">
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-end gap-6">
                                        <button type="button" onclick="showPopupEditKelas()" class="text-greyIcon hover:text-black">Batal</button>
                                        <button type="submit" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                            hover:bg-baseBlue hover:text-white" style="box-shadow: 
                                            0px 0px 5px 1px rgba(122,161,226,0.3);">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- akhir dari pop up edit kelas -->

                    <!-- pop up hapus kelas -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen" id="popupHapusKelas">
                        <div class="flex flex-col justify-center max-w-[350px]">
                            <div class="bg-white rounded-xl px-10 py-8">
                                <div class="text-end">
                                    <button onclick="showPopupHapusKelas()">
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
                                        Apakah anda yakin ingin menghapus kelas Matematika?
                                    </p>

                                    <form action="" method="post">
                                        <div class="flex justify-between gap-4 mt-4">
                                            <button type="button" onclick="showPopupHapusKelas()" class="text-greyIcon hover:text-black w-full">Batal</button>
                                            <button type="submit" class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                    hover:bg-[#d60101] hover:text-white" style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- akhir dari pop up hapus kelas -->

                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        const showPopupTambahKelas = () => {
            const popup = document.getElementById('popupTambahKelas');

            if (popup.classList.contains('hidden')) {
                popup.classList.remove('hidden')
            } else {
                popup.classList.add('hidden')
            }
        }

        const showPopupEditKelas = () => {
            const popup = document.getElementById('popupEditKelas');

            if (popup.classList.contains('hidden')) {
                popup.classList.remove('hidden')
            } else {
                popup.classList.add('hidden')
            }
        }

        const showPopupHapusKelas = () => {
            const popup = document.getElementById('popupHapusKelas');

            if (popup.classList.contains('hidden')) {
                popup.classList.remove('hidden')
            } else {
                popup.classList.add('hidden')
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            function initializeDropdown(buttonId, menuId) {
                const dropdownButton = document.getElementById(buttonId);
                const dropdownMenu = document.getElementById(menuId);
                let isDropdownOpen = false;

                function toggleDropdown() {
                    isDropdownOpen = !isDropdownOpen;
                    if (isDropdownOpen) {
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                }

                dropdownButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    toggleDropdown();
                });

                window.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                        isDropdownOpen = false;
                    }
                });
            }

            // Select all dropdown buttons and menus
            const dropdownButtons = document.querySelectorAll('[id^="dd-more"]');
            dropdownButtons.forEach((button, index) => {
                initializeDropdown(`dd-more${index}`, `dd-menu${index}`);
            });
        });


    </script>
</body>

</html>