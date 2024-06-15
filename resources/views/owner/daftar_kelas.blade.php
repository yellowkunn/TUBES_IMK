<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div class="relative flex justify-center items-center" id="session">
        @if(session('success'))
        <div id="success" class="fixed top-8 mt-5 bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 px-8 py-3 rounded-2xl unselectable translate-y-4 duration-300">
            <div class="flex justify-between items-center gap-4 lg:gap-36">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                    <p class="text-lg text-greyIcon">{{session('success')}}</p>
                </div>

                <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('success').classList.add('hidden')"></i>
            </div>
        </div>
        @elseif(session('error'))
        <div id="error" class="fixed top-8 mt-5 bg-[#ffefef] border border-[#ff3838] shadow-[0px_0px_6px_2px_rgba(227,0,0,0.2)] z-20 gap-2 items-center w-fit px-8 py-3 justify-center rounded-2xl flex unselectable">
                <div class="flex justify-between items-center gap-36">
                    <div class="flex gap-4 items-center">
                        <i class="fa-solid fa-exclamation fa-lg p-4 bg-error rounded-full text-white"></i>
                        <p class="text-lg text-greyIcon">{{ session('error') }}</p>
                    </div>

                    <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('error').classList.add('hidden')"></i>
                </div>
            </div>
        @endif
    </div>

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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('editdaftarkelas') }}" class="hover:font-semibold">Kelas</a>
                    </div>

                    <div class="flex justify-between items-center my-7">
                        <p class="text-title font-semibold">Daftar Kelas</p>

                        <div class="flex gap-4">
                            <form action="" method="get" class="flex justify-between items-center relative">
                                <input autocomplete="off" type="text" id="search" name="search" value=""
                                    class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-lg"
                                    placeholder="Cari">
                                <button type="submit" class="absolute right-5"><i class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                            </form>
                            <button onclick="showPopupTambahKelas()"
                                class="bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-3 py-2 rounded-lg">
                                <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                                <p class="text-greyIcon font-semibold">Tambah kelas</p>
                            </button>
                        </div>
                    </div>

                    <!-- Pesan Error -->
                    @if ($errors->any())
                    <div id="error-message">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Terjadi kesalahan dengan input Anda:</span>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <script>
                        function dismissMessage() {
                            const message = document.getElementById('error-message');
                            message.style.transition = 'opacity 1s ease-out';
                            message.style.opacity = '0';
                            setTimeout(() => {
                                message.style.display = 'none';
                            }, 1000);
                        }

                        // Automatically dismiss the message after 5 seconds
                        setTimeout(() => {
                            const message = document.getElementById('error-message');
                            if (message) {
                                message.style.transition = 'opacity 1s ease-out';
                                message.style.opacity = '0';
                                setTimeout(() => {
                                    message.style.display = 'none';
                                }, 1000);
                            }
                        }, 3000);
                    </script>

                    <!-- skeleton -->
                    <div id="skeleton" class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">                        

                        @foreach($kelass as $kelas)
                        <div class="bg-slate-400/5 rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">

                            <div class="flex flex-col gap-2 mt-5">
                                <p class="w-3/4 h-8 bg-slate-400/30 rounded-lg"></p>
                            
                                <div class="my-2 h-52 md:h-56 lg:h-44 w-full object-cover rounded-lg bg-slate-400/30"></div>
                            
                                <p class="w-1/2 h-7 bg-slate-400/30 rounded-lg"></p>
                                <p class="w-2/3 h-5 bg-slate-400/30 rounded-lg"></p>
                                <div class="rounded-full bg-slate-400/30 my-3 inline-block w-full h-10"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- hasil kelas -->
                    <div id="hasilKelas" class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">
                        

                        @foreach($kelass as $kelas)
                        <div class="bg-white rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">

                            <!-- dd more (edit & hapus) -->
                            <div>
                                <button id="dd-more{{ $loop->index }}" class="text-end w-full"><i class="fa-solid fa-ellipsis-vertical text-lg"></i></button>

                                <div id="dd-menu{{ $loop->index }}" class="hidden grid grid-cols-1 divide-y bg-white mt-2 rounded-md drop-shadow-regularShadow absolute top-5 right-14 text-black">
                                    <button onclick="showPopupEditKelas({{ $kelas->id_kelas }})" class="w-full h-full flex items-center gap-2 py-2 px-4">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        <p>Edit</p>
                                    </button>
                                    <button onclick="showPopupHapusKelas({{ $kelas->id_kelas }})" class="w-full h-full flex items-center gap-2 py-2 px-4">
                                        <i class="fa-regular fa-trash-can"></i>
                                        <p>Hapus</p>
                                    </button>
                                </div>
                            </div>
                            <!-- akhir dari dd more (edit & hapus) -->
                            
                            <div class="flex flex-col gap-2">
                                <p class="font-semibold md:text-[20px] lg:text-subtitle capitalize">{{ $kelas->nama }} </p>
                                @if($kelas->foto)
                                <img src="{{ asset('berkas_ujis/' . $kelas->foto) }}" alt="{{ $kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
                                @else
                                <p class="text-greyIcon">Foto tidak tersedia</p>
                                @endif
                                <p class="font-semibold text-[#E9940C] md:text-[18px] lg:text-[20px]">Rp{{ number_format($kelas->harga, 0, ',', '.') }} <br><span class="text-smallContent text-greyIcon font-normal">{{ $kelas->rentang }} / bulan</span></p>
                                <a href="{{ url('/editdetailkelas/' . $kelas->id_kelas) }}" class="rounded-full bg-baseBlue/90 group-hover:bg-baseBlue text-white py-2 my-3 inline-block text-center">Lihat Detail</a>
                            </div>
                            <div class="absolute bg-baseBlue/90 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
                        </div>
                        @endforeach
                    </div>

                    <!-- pagination -->
                    <div class="mt-16">
                        {{ $kelass->links() }}
                    </div>

                    <!-- pop up tambah kelas baru -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupTambahKelas">
                        <div class="flex flex-col justify-center w-[80%]">
                            <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                <p class="text-title">Tambah Kelas</p>
                                <button onclick="showPopupTambahKelas()">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                            
                                <form action="/tambahkelasbaru" method="POST" enctype="multipart/form-data" onchange="setDataForm()">
                                    @csrf
                                    <div class="overflow-y-auto max-h-96 pe-7 flex flex-col gap-5 mt-5 px-0.5">
                                        <div class="flex justify-between gap-14">
                                            <!-- kiri -->
                                            <div class="w-full flex flex-col gap-6">
                                                <div>
                                                    <p class="font-semibold mb-2">Nama Kelas</p>
                                                    <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="nama" id="nama">
                                                </div>

                                                <div>
                                                    <p class="font-semibold mb-2">Fasilitas</p>
                                                    <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="fasilitas" id="fasilitas">
                                                </div>

                                                <div>
                                                    <p class="font-semibold mb-2">Durasi</p>
                                                    <input type="text" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="durasi" id="durasi">
                                                </div>
                                            </div>

                                            <!-- kanan -->
                                            <div class="w-full flex flex-col gap-6">
                                                <div>
                                                    <p class="font-semibold mb-2">Tingkat Kelas</p>
                                                    <select id="tingkat_kelas" name="tingkat_kelas" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                                                        <option value="" class="text-greyIcon">Kelas</option>
                                                        <option class="text-greyIcon" value="SD">SD</option>
                                                        <option class="text-greyIcon" value="SMP">SMP</option>
                                                        <option class="text-greyIcon" value="SMA">SMA</option>
                                                        <option class="text-greyIcon" value="Gap Year">Gap Year</option>
                                                        <option class="text-greyIcon" value="TOEFL">TOEFL</option>
                                                        <option class="text-greyIcon" value="IELTS">IELTS</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <p for="harga" class="font-semibold">Harga</p>

                                                    <div class="flex justify-between gap-2 h-9">
                                                        <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="number" name="harga" id="harga">
                                                        <p class="text-2xl text-greyIcon my-auto">/</p>
                                                        <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="rentang" id="rentang" placeholder="Rentang">
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <p class="font-semibold mb-2">Pilih Hari</p>
                                                    <!-- <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="jadwal_hari" id="jadwal_hari"> -->
                                                    <div class="flex gap-8">
                                                        <div class="flex flex-col gap-4">
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="senin" name="hari[]" value="senin"><label for="senin">Senin</label></div>
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="kamis" name="hari[]" value="kamis"><label for="kamis">Kamis</label></div> 
                                                        </div>
                                                        <div class="flex flex-col gap-4">
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="selasa" name="hari[]" value="selasa"><label for="selasa">Selasa</label></div> 
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="jumat" name="hari[]" value="jumat"><label for="jumat">Jumat</label></div> 
                                                        </div>
                                                        <div class="flex flex-col gap-4">
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="rabu" name="hari[]" value="rabu"><label for="rabu">Rabu</label></div> 
                                                            <div class="flex items-center gap-2"><input type="checkbox" class="rounded appearance-none checked:bg-baseBlue" id="sabtu" name="hari[]" value="sabtu"><label for="sabtu">Sabtu</label></div> 
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div>
                                            <p class="font-semibold mb-2">Keterangan</p>
                                            <textarea name="deskripsi" id="deskripsi" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" rows="3" cols="50"></textarea>
                                        </div>

                                        <div class="self-start">
                                            <p class="font-semibold mb-2">Foto Kelas</p>
                                            <div class="max-w-[320px] mb-10 mx-auto">
                                                <button id="file" onclick="document.getElementById('gambar').click(); return false;" class="p-2 py-3 w-full border rounded-lg">
                                                    <div class="w-full h-[200px] p-1 mb-2 flex">
                                                        <img src="" alt="" id="uploadedFile" class="max-w-full max-h-full rounded">
                                                    </div>
                                                    <div class="flex items-center justify-center gap-2">
                                                        <i class="fa-solid fa-arrow-up-from-bracket fa-sm text-greyIcon rounded-full w-fit"></i>
                                                        <p class="text-greyIcon text-smallContent">Upload foto kelas</p>
                                                    </div>
                                                                            </button>
                                                <p class="text-xs mt-3">*Maks 2MB</p>
                                                <input type="file" name="gambar" id="gambar" class="invisible" accept="image/*" onchange="showFile(this)" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-center gap-6">
                                        <button type="button" onclick="showPopupTambahKelas()" class="text-greyIcon hover:font-semibold">Batal</button>
                                        <button type="submit" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                            hover:bg-baseBlue hover:text-white hover:font-semibold" style="box-shadow: 
                                            0px 0px 5px 1px rgba(122,161,226,0.3);">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir dari pop up tambah kelas baru -->

                    
                    @foreach($kelass as $kelas)
                    <!-- pop up edit kelas -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                    w-full h-screen" id="popupEditKelas{{ $kelas->id_kelas }}">
                        <div class="flex flex-col justify-center max-w-[450px]">
                            <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                <p class="text-title">Edit Kelas</p>
                                <button onclick="showPopupEditKelas({{ $kelas->id_kelas }})">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                                <form action="" method="post" class="flex flex-col gap-5">
                                    <div>
                                        <p class="font-semibold mb-1">Nama Kelas</p>
                                        <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="namaKelas" id="namaKelas" value="{{ $kelas->nama }}">
                                    </div>

                                    <div>
                                        <p class="font-semibold mb-1">Keterangan</p>
                                        <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="keterangan" id="keterangan" value="{{ $kelas->deskripsi }}">
                                    </div>

                                    <div>
                                        <p for="harga" class="font-semibold">Harga</p>

                                        <div class="flex justify-between gap-4 h-9">
                                            <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="number" name="harga" id="harga" value="{{ $kelas->harga }}">
                                            <p class="text-2xl text-greyIcon my-auto">/</p>
                                            <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="rentang" id="rentang" placeholder="Rentang" value="{{ $kelas->rentang }}">
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-end gap-6">
                                        <button type="button" onclick="showPopupEditKelas({{ $kelas->id_kelas }})" class="text-greyIcon hover:text-black">Batal</button>
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
                    w-full h-screen" id="popupHapusKelas{{ $kelas->id_kelas }}">
                        <div class="flex flex-col justify-center max-w-[350px]">
                            <div class="bg-white rounded-xl px-10 py-8">
                                <div class="text-end">
                                    <button onclick="showPopupHapusKelas({{ $kelas->id_kelas }})">
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
                                        Apakah anda yakin ingin menghapus kelas {{ $kelas->nama }}?
                                    </p>

                                    <form action="{{ route('kelas.hapus', $kelas->id_kelas) }}" method="post">
                                    @csrf
                                        <div class="flex justify-between gap-4 mt-4">
                                            <button type="button" onclick="showPopupHapusKelas({{ $kelas->id_kelas }})" class="text-greyIcon w-full hover:font-semibold">Batal</button>
                                            <button type="submit" class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                            hover:bg-[#d60101] hover:text-white hover:font-semibold" style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- akhir dari pop up hapus kelas -->

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div class="mt-16">
    @include('components.footer')
    @push('additional-scripts') 
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const load = $('#skeleton');
            const show = $('#hasilKelas');
            
            load.show();
            show.hide();

            setTimeout(function() {
                load.hide();
                show.show();
            }, 150);
        });

        function showPopupEditKelas(i) {
            document.getElementById('popupEditKelas'+i).classList.toggle('hidden');
        }

        function showPopupHapusKelas(i) {
            document.getElementById('popupHapusKelas'+i).classList.toggle('hidden');
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

        
        //save data for unsubmitted form
        const inputElementIds = ['nama', 'fasilitas', 'durasi', 'tingkat_kelas', 'harga', 
            'rentang', 'jadwal_hari', 'deskripsi'];

        function setDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                localStorage.setItem('"'+ inputId +'"', inputElement.value);
            });
        }

        function getDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                inputElement.value = localStorage.getItem('"'+ inputId +'"');
            });
        }

        getDataForm();

        setTimeout(function() {
            const session = document.getElementById('session');
            if (session) {
                session.classList.add('hidden');
            }
        }, 1500);

        function showPopupTambahKelas() {
            document.getElementById('popupTambahKelas').classList.toggle('hidden');
        }

        function showFile(input) {
            const getFile = document.getElementById('uploadedFile');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    getFile.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>