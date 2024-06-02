<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengajar</title>

     <!-- google font for icon -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @livewireStyles

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
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
                    <a href="">Daftar Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Tambah</a>
                </div>
                
                <form action="{{ url('kirimtambahpertemuan') }}" method="post">
                @csrf
                    <p class="text-title font-semibold my-7">Tambah Pertemuan</p>

                    <div class="md:flex justify-between gap-16">

                         <!-- form kotak kiri -->
                        <div class="w-1/2">
                            <div class="bg-white drop-shadow-regularShadow rounded-lg p-8 h-fit">
                                <div class="flex flex-col gap-12">
                                    <input type="text" name="pertemuan" id="pertemuan" value="Pertemuan ke-i" disabled class="ps-4 bg-neutral-50">

                                    <div class="flex flex-col gap-2">
                                        <label for="date">Tanggal</label>
                                        <input type="date" name="date" id="date" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <label for="topikbahasan">Topik Bahasan</label>
                                        <input type="text" name="topikbahasan" id="topikbahasan" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" required>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" rows="3" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- form kotak kanan -->
                        <div class="flex flex-col gap-5 w-1/2">
                            <!-- materi -->
                            <div class="bg-white drop-shadow-regularShadow rounded-lg p-5 h-fit">
                                <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg p-3 px-6">
                                    <button class="w-full h-full" onclick="showPopupMateri()" type="button">
                                        <div class="flex items-center gap-3">
                                            <i class="fa-regular fa-file"></i>
                                            <p class="text-start hover:font-semibold">Tambah Materi</p>
                                        </div>
                                        <button type="button" onclick="showPopupMateri()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                                    </button>
                                </div>
                            </div>

                            <hr>

                            <!-- Latihan -->
                            <div class="bg-white drop-shadow-regularShadow rounded-lg p-5 h-fit">
                                <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg p-3 px-6">
                                    <button class="w-full h-full" onclick="showPopupLatihan()" type="button">
                                        <input type="hidden" name="latihan" id="latihan">
                                        <div class="flex items-center gap-3">
                                            <i class="fa-regular fa-file"></i>
                                            <p class="text-start hover:font-semibold">Tambah Latihan</p>
                                        </div>
                                        <button type="button" onclick="showPopupLatihan()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                                    </button>
                                </div>
                            </div>

                            <hr>

                            <!-- folder -->
                            <!-- <div class="bg-white drop-shadow-regularShadow rounded-lg p-5 h-fit">
                                <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg p-3 px-6">
                                    <button class="w-full h-full" onclick="showPopupFolder()" type="button">
                                        <div class="flex items-center gap-3">
                                            <i class="fa-regular fa-folder"></i>
                                            <p class="text-start hover:font-semibold">Tambah Folder</p>
                                        </div>
                                        <button type="button" onclick="showPopupFolder()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                                    </button>
                                </div>
                            </div>

                            <hr> -->

                            <!-- link -->
                            <div class="bg-white drop-shadow-regularShadow rounded-lg px-7 py-6 h-fit">
                                <p class="font-semibold mb-3">Link</p>
                                <div class="flex items-center gap-4">
                                    <i class="fa-solid fa-link"></i>
                                    <input type="url" name="link" id="link" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- konten pop up materi -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupMateri">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Materi</p>
                                <button onclick="showPopupMateri()">
                                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="my-3">
                                    <livewire:dynamic-input :inputType="'materi'">
                                </div>

                                <div class="bg-white text-center">
                                    <button onclick="showPopupMateri()" class="w-fit p-2 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full" style="box-shadow: 0px 0px 5px 1px rgba(105,212,220,0.3);">
                                        Selesai
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <!-- konten pop Latihan -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupLatihan">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Latihan</p>
                                <button onclick="showPopupLatihan()">
                                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="my-3">
                                    <livewire:dynamic-input :inputType="'latihan'">
                                </div>

                                <div class="bg-white text-center">
                                    <button onclick="showPopupLatihan()" class="w-fit p-2 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full" style="box-shadow: 0px 0px 5px 1px rgba(105,212,220,0.3);">
                                        Selesai
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                     <!-- akhir dari konten pop Latihan -->

                    <!-- konten pop folder -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupFolder">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Folder</p>
                                <button onclick="showPopupFolder()">
                                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="my-3">
                                    <livewire:dynamic-input :inputType="'folder'">
                                </div>

                                <div class="bg-white text-center">
                                    <button onclick="showPopupFolder()" class="w-fit p-2 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full" style="box-shadow: 0px 0px 5px 1px rgba(105,212,220,0.3);">
                                        Selesai
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                     <!-- akhir dari konten pop folder -->

                     <div class="flex gap-10 justify-center items-center mt-12 mb-4">
                                <button type="reset" class="text-greyIcon hover:font-semibold">Reset</button>
                                <button type="submit" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-8 rounded-lg 
                                        hover:bg-baseBlue hover:text-white hover:font-semibold" style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">Simpan</button>
                            </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

@livewireScripts

<script>
    function showPopupMateri() {
    document.getElementById('popupMateri').classList.toggle('hidden');
}

function showPopupLatihan() {
    document.getElementById('popupLatihan').classList.toggle('hidden');
}

function showPopupFolder() {
    document.getElementById('popupFolder').classList.toggle('hidden');
}

</script>
</body>
</html>