<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div class="flex flex-col gap-6 px-24 py-12">
        <div class="flex items-center gap-6">
            <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left rounded-full bg-white p-3 drop-shadow-regularShadow"></i></a>

            <p class="font-semibold text-subtitle">Profile</p>
        </div>

        <div class="flex justify-center">
            <div class="w-fit relative">
            <input type="file" name="gambar" id="gambar" class="hidden" accept="image/*" onchange="showFile(this)" required>
                @if(isset(Auth::user()->foto_profile))
                <img src="{{ Auth::user()->foto_profile }}" id="uploadedFile" class="w-24 h-24 object-cover rounded-full" alt="">
                @else
                <span class="material-symbols-outlined text-greyIcon">account_circle</span>
                @endif    
               
                <button id="file" onclick="document.getElementById('gambar').click(); return false;" class="absolute right-0 bottom-0"><i class="fa-solid fa-pen text-white p-2 bg-baseBlue rounded-full"></i></button>
            </div>
        </div>

        <div class="border-b-2 border-baseBlue w-full flex gap-6">
            <button type="button" id="akunBtn" class="rounded-t-lg bg-white py-2 px-4 text-white focus:font-semibold">Akun</button>
            <button type="button" id="biodataBtn" class="rounded-t-lg py-2 px-4 bg-white text-baseBlue focus:font-semibold">Biodata</button>
        </div>

        <div id="akunContent" class="grid grid-cols-2 gap-12 divide-x-2 mt-6">
            <div>
                <p class="text-subtitle font-semibold">Informasi Akun</p>
                <p class="mt-2">Informasi yang mungkin tampak pada pengguna lain</p>

                <form action="" method="post">
                @csrf
                    <div class="flex flex-col gap-6 mt-8">
                        <div>
                            <label for="username" class="font-semibold">Username</label>
                            <input type="text" id="username" name="username" autocomplete="on" required="{{ old('username') }}" class="border-2 border-greyBorder w-full p-2.5 rounded mt-2" placeholder="Masukkan username" value="{{ Auth::user()->username }}" autofocus>
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    var input = $('#username');
                                    var length = input.val().length; // Menghitung panjang teks di input
                                    input.focus(); // Fokuskan input

                                    // Geser posisi fokus ke kanan dari teks yang ada
                                    input[0].setSelectionRange(length, length);
                                });
                            </script>
                        </div>

                        <div>
                            <label for="email" class="font-semibold">Email</label>
                            <input type="email" id="email" name="email" autocomplete="on" required="{{ old('email') }}" class="border-2 border-greyBorder w-full p-2.5 rounded mt-2" placeholder="Masukkan email" value="{{ Auth::user()->email }}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-10 mb-3 flex justify-end">
                        <button type="submit" class="bg-baseBlue/80 hover:bg-baseBlue hover:font-semibold rounded-full text-white px-6 py-2">Edit data</button>
                    </div>
                </form>
            </div>

            <div class="ps-12">
                <p class="text-subtitle font-semibold">Password</p>
                <p class="mt-2">Gunakan password yang kuat untuk melindungi akun anda</p>

                <form action="" method="post">
                @csrf
                    <div class="flex flex-col gap-4 mt-8">
                        <!-- Password Lama-->
                        <div>
                            <label for="username" class="font-semibold">Password Lama</label>
                            <div class="relative flex justify-between">
                                <input type="password" id="password" name="password" required class="border-2 border-greyBorder w-full p-2.5 rounded mt-2" placeholder="Masukkan password lama">
                                <x-input-error :messages="$errors->get('password')" class="mt-1" />
                            </div>
                        </div>

                        <!-- Password Baru -->
                        <div>
                            <label for="username" class="font-semibold">Password Baru</label>
                            <div class="relative flex justify-between">
                                <input type="password" id="password" name="password" required class="border-2 border-greyBorder w-full p-2.5 rounded mt-2" placeholder="Masukkan password naru">
                                <i class="fas fa-eye-slash eye-icon text-gray-400 hover:text-gray-600 absolute top-6 right-4"></i>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="username" class="font-semibold">Konfirmasi Password Baru</label>
                            <div class="relative flex justify-between">
                                <input type="password" id="password_confirmation" name="password_confirmation" required class="border-2 border-greyBorder w-full p-2.5 rounded mt-2" placeholder="Konfirmasi Password">
                                <i class="fas fa-eye-slash eye-icon text-gray-400 hover:text-gray-600 absolute top-6 right-4"></i>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-10 mb-3 flex justify-end">
                        <button type="submit" class="bg-baseBlue/80 hover:bg-baseBlue hover:font-semibold rounded-full text-white px-6 py-2">Edit password</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="biodataContent" class="hidden mt-6">
            <p class="text-subtitle font-semibold mb-6">Data diri</p>

            <div class="grid grid-cols-2">
                <div class="flex flex-col gap-6 font-semibold">
                    <p>Nama</p>
                    <p>Jenis Kelamin</p>
                    <p>Tempat, tanggal lahir</p>
                    <p>Agama</p>
                    <p>Kewarganegaraan</p>
                    <p>Alamat</p>
                </div>

                <div class="flex flex-col gap-6 text-greyIcon">
                    <p>{{ $siswas->nama_lengkap }}</p>
                    <p>{{ $siswas->jenis_kelamin }}</p>
                    <p>{{ $siswas->tempat_lahir }}, {{ $siswas->tgl_lahir }}</p>
                    <p>{{ $siswas->agama }}</p>
                    <p>{{ $siswas->kewarganegaraan }}</p>
                    <p>{{ $siswas->alamat }}</p>

                </div>
            </div>

            <p class="text-subtitle font-semibold mt-12 mb-6">Kontak</p>

            <div class="grid grid-cols-2">
                <div class="flex flex-col gap-6 font-semibold">
                    <p>No. HP</p>
                    <p>No. Telp</p>
                </div>

                <div class="flex flex-col gap-6 text-greyIcon">
                    <p>{{ $siswas->no_hp }}</p>
                    <p>{{ $siswas->no_telepon }}</p>
                </div>
            </div>

            <p class="text-subtitle font-semibold mt-12 mb-6">Orang Tua</p>

            <div class="grid grid-cols-2 mb-12">
                <div class="flex flex-col gap-6 font-semibold">
                    <p>Nama Orangtua/Wali</p>
                    <p>Agama</p>
                    <p>Tempat, tanggal lahir</p>
                    <p>Pekerjaan</p>
                    <p>Pendidikan</p>
                </div>

                <div class="flex flex-col gap-6 text-greyIcon">
                    <p>{{ $siswas->nama_ortu }}</p>
                    <p>{{ $siswas->agama_ortu }}</p>
                    <p>{{ $siswas->tempat_lahir_ortu }}, {{ $siswas->tgl_lahir_ortu }}</p>
                    <p>{{ $siswas->pekerjaan_ortu }}</p>
                    <p>{{ $siswas->pendidikan_ortu }}</p>

                </div>
            </div>
        </div>

    </div>

    @include('components.footer')

    <script>
        const eyeIcons = document.querySelectorAll('.eye-icon');
        eyeIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                const inputField = icon.previousElementSibling;
                const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                inputField.setAttribute('type', type);
                icon.classList.toggle('fa-eye-slash');
                icon.classList.toggle('fa-eye');
            });
        });

        const tabAkun = document.getElementById('akunBtn');
        const tabBiodata = document.getElementById('biodataBtn');
        const kontenAkun = document.getElementById('akunContent');
        const kontenBiodata = document.getElementById('biodataContent');

        tabAkun.classList.remove('bg-white', 'text-baseBlue');
        tabAkun.classList.add('bg-baseBlue', 'text-white', 'font-semibold');

        tabAkun.addEventListener("click", function() {
            if (kontenAkun.classList.contains('hidden')) {
                kontenBiodata.classList.add('hidden');
                kontenAkun.classList.remove('hidden');
             
                tabAkun.classList.add('bg-baseBlue', 'text-white');
                tabAkun.classList.remove('bg-white', 'text-baseBlue');
                tabBiodata.classList.remove('bg-baseBlue', 'text-white');
                tabBiodata.classList.add('bg-white', 'text-baseBlue');
            }
        });

        tabBiodata.addEventListener("click", function() {
            if (kontenBiodata.classList.contains('hidden')) {
                kontenAkun.classList.add('hidden');
                kontenBiodata.classList.remove('hidden');
            
                tabBiodata.classList.add('bg-baseBlue', 'text-white');
                tabBiodata.classList.remove('bg-white', 'text-baseBlue');
                tabAkun.classList.remove('bg-baseBlue', 'text-white');
                tabAkun.classList.add('bg-white', 'text-baseBlue');
            }
        });

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