<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
    @include('components.navbar')

    <div id="content" class="px-24 py-10">

    <!-- page hierarchy -->
    <div class="flex items-center gap-2 text-smallContent">
        <a href="">Dashboard</a>
        <i class="fa-solid fa-caret-right text-baseBlue"></i>
        <a href="">Detail Kelas</a>
        <i class="fa-solid fa-caret-right text-baseBlue"></i>
        <a href="">Formulir</a>
    </div>

    <p class="text-title font-semibold mt-12">Formulir Pendaftaran</p>
    <p class="mt-2">Silakan isi dan lengkapi formulir pendaftaran berikut sebelum mendaftar pada kelas.</p>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="flex flex-col mt-10 border-2 rounded-lg p-12 px-16 bg-greyBackground">
        <p class="text-subtitle font-semibold mb-4">Keterangan kelas</p>
        <div class="grid grid-cols-2 gap-48 w-full">
            <!-- dd daftar kelas -->
            <div>
                <button type="button" id="ddDaftarKelas-0" class="bg-white flex justify-between items-center border border-greyBorder px-4 py-2 rounded-lg w-full">
                    <p class="text-greyIcon">Matematika</p>
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                
                <div id="menuDaftarKelas-0" class="hidden ps-5 w-1/3 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute" style="color: #949494;">
                    <a href="#" class="block py-1">Bahasa Inggris</a>
                    <a href="#" class="block py-1">Kimia</a>
                    <a href="#" class="block py-1">Fisika</a>
                    <a href="#" class="block py-1">TOEFL</a>
                    <a href="#" class="block py-1">IELTS</a>
                </div>
            </div>
            <!-- akhir dari dd daftar kelas -->
            <!-- dd tingkatan -->
            <div>
                <button type="button" id="ddTingkatan-0" class="bg-white flex justify-between items-center border border-greyBorder px-4 py-2 rounded-lg w-full">
                    <p class="text-greyIcon">SMP</p>
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                
                <div id="menuTingkatan-0" class="hidden ps-5 w-1/3 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute" style="color: #949494;">
                    <a href="#" class="block py-1">SD</a>
                    <a href="#" class="block py-1">SMP</a>
                    <a href="#" class="block py-1">SMA</a>
                </div>
            </div>
            <!-- akhir dari dd tingkatan -->
        </div>
    </div>

    <div class="bg-greyBackground flex flex-col mt-8 border-2 rounded-lg p-12 px-16">
        <p class="text-subtitle font-semibold">Keterangan tentang diri</p>
        <div class="w-[150px] mb-3">
            <input type="file" name="gambar_obat" id="file2" class="invisible" accept="image/*" onchange="showFile(this)" required>
            <button id="file" onclick="document.getElementById('file2').click(); return false;" class="p-2 py-3 w-full border rounded-xl shadow">
                <div class="w-[130px] h-[170px] p-1 mb-2 flex justify-center">
                    <img src="" alt="" id="uploadedFile" class="max-w-full max-h-full rounded">
                </div>
                <div class="flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-up-from-bracket fa-sm text-greyIcon rounded-full w-fit"></i>
                    <p class="text-greyIcon text-smallContent">Pas foto (3 x 4)</p>
                </div   >
            </button>
            <p class="text-xs mt-3">*Maks 2MB</p>
        </div>

        <div class="relative flex flex-col gap-3 py-2">
            <p>Nama Lengkap</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Jenis Kelamin</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Tempat, tanggal lahir</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Agama</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Kewarganegaraan</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
    </div>

    <div class="bg-greyBackground flex flex-col mt-8 border-2 rounded-lg p-12 px-16">
        <p class="text-subtitle font-semibold mb-4">Keterangan Tempat Tinggal</p>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Alamat</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>No. HP</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>No. Telp</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
    </div>

    <div class="bg-greyBackground flex flex-col mt-8 border-2 rounded-lg p-12 px-16">
        <p class="text-subtitle font-semibold mb-4">Keterangan Pendidikan</p>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Pendidikan Terakhir</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Diterima di kursus ini</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
    </div>

    <div class="bg-greyBackground flex flex-col mt-8 border-2 rounded-lg p-12 px-16">
        <p class="text-subtitle font-semibold mb-4">Keterangan Orang Tua</p>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Nama Orang Tua</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Tempat, tanggal lahir</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Agama</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Pendidikan</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
        <div class="relative flex flex-col gap-3 py-2">
            <p>Pekerjaan</p>
            <input type="text" id="text" name="text" required class="ps-3 border-2 border-greyBorder w-full p-1 rounded-lg">  
        </div>
    </div>

    <div class="flex justify-center gap-10 w-full">
        <button type="reset" class="mt-10 text-center w-[50px] hover:font-semibold">Reset</button>
        <button type="submit" class="mt-10 text-center w-[220px] p-3 bg-baseBlue text-white rounded-xl hover:bg-baseBlue/90 hover:font-semibold">Lanjut ke pembayaran</button>
    </div>
    </form>

    </div>

    @include('components.footer')

    <script>
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

        function initializeDropdown(buttonId, menuId) {
            const dropdownButton = document.getElementById(buttonId);
            const dropdownMenu = document.getElementById(menuId);
            let isDropdownOpen = true;

            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            }

            toggleDropdown();

            dropdownButton.addEventListener('click', toggleDropdown);

            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });
        }

        for (let i = 0; i < 1; i++) {
            initializeDropdown('ddDaftarKelas-' + i, 'menuDaftarKelas-' + i);
        }

        for (let i = 0; i < 1; i++) {
            initializeDropdown('ddTingkatan-' + i, 'menuTingkatan-' + i);
        }
    </script>
</body>
</html>