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

        <div class="mt-2 px-8 sm:px-16 lg:px-20 flex justify-center" id="session">
            <!-- Pesan Error -->
            @if ($errors->any())
                <div id="error" class="bg-[#ffefef] border border-[#ff3838] shadow-[0px_0px_6px_2px_rgba(227,0,0,0.2)] z-20 gap-2 items-center w-fit px-8 py-3 justify-center rounded-2xl flex unselectable">
                    <div class="flex justify-between items-center gap-36">
                        <div class="flex gap-4 items-center">
                            <i class="fa-solid fa-exclamation fa-lg p-4 bg-error rounded-full text-white"></i>
                            <p class="text-lg text-greyIcon">
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>

                        <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('error').classList.add('hidden')"></i>
                    </div>
                </div>
            @endif

            <!-- Pesan Sukses -->
            @if (session('success'))
            <div id="success" class="bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 items-center px-8 py-3 justify-center rounded-2xl flex unselectable">
                <div class="flex justify-between items-center gap-4 lg:gap-36">
                    <div class="flex gap-4 items-center">
                        <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                        <p class="text-lg text-greyIcon">{{ session('success') }}</p>
                    </div>

                    <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('success').classList.add('hidden')"></i>
                </div>
            </div>
            @endif
        </div>

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

                    @livewire('daftar-siswa')

                    <!-- pop up upload sertif -->
                    @if ($siswas)
                        @foreach ($siswas as $siswa)
                            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
            w-full h-screen"
                                id="popupUploadSertif{{ $siswa->pengguna->biodataSiswa->id_biodata ?? '0' }}">
                                <div class="flex flex-col justify-center md:min-w-[500px]">
                                    <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                        <p class="text-title">Upload Sertifikat</p>
                                        <button
                                            onclick="showPopupUploadSertif({{ $siswa->pengguna->biodataSiswa->id_biodata ?? '0' }})">
                                            <i class="fa-solid fa-xmark fa-lg text-white"></i>
                                        </button>
                                    </div>

                                    <div class="bg-white rounded-b-xl px-10 py-8">
                                        <form action="{{ url('/uploadSertifikat') }}" method="post"
                                            class="flex flex-col justify-center gap-6" enctype="multipart/form-data">
                                            @csrf
                                            <p>Sertifikat untuk
                                                {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}</p>
                                            <input type="file" name="sertifikatSiswa" id="sertifikatSiswa"
                                                class="file:text-baseBlue file:font-semibold 
                    file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                                            <div>
                                                <label for="nama">Nama Sertifikat</label>
                                                <input type="text" name="nama" id="nama"
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1 mt-1">
                                            </div>
                                            <div>
                                                <label for="keterangan">Keterangan</label>
                                                <textarea name="keterangan" id="keterangan"
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1 mt-1"
                                                    rows="2"></textarea>
                                            </div>
                                            <input type="hidden" name="siswa_id" value="{{ $siswa->id_siswa }}">

                                            <div class="flex justify-center gap-6 mb-2 mt-4">
                                                <button type="button"
                                                    onclick="showPopupUploadSertif({{ $siswa->pengguna->biodataSiswa->id_biodata ?? '0' }})"
                                                    class="text-greyIcon hover:font-semibold">Batal</button>
                                                <button type="submit"
                                                    class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                            hover:bg-baseBlue hover:text-white"
                                                    style="box-shadow: 
                            0px 0px 5px 1px rgba(122,161,226,0.3);">Kirim</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- akhir dari pop up upload sertif -->
                </div>

                @if ($siswas)
                    @foreach ($siswas as $siswa)
                        <!-- Pop up hapus data siswa -->
                        <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                                w-full h-screen"
                            id="popupHapusDataSiswa{{ $siswa->id_siswa }}">
                            <div class="flex flex-col justify-center max-w-[350px]">
                                <div class="bg-white rounded-xl px-10 py-8">
                                    <div class="text-end">
                                        <button onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})">
                                            <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                                        </button>
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-[52px] h-[52px] mx-auto">
                                            <circle cx="26" cy="26" r="26" fill="#FF3838"
                                                fill-opacity="0.1"></circle>
                                            <circle cx="26" cy="26" r="21" fill="#FF3838"
                                                fill-opacity="0.15"></circle>
                                            <g clip-path="url(#clip0_213_507)">
                                                <path
                                                    d="M27 20C27 19.4469 26.5531 19 26 19C25.4469 19 25 19.4469 25 20V28C25 28.5531 25.4469 29 26 29C26.5531 29 27 28.5531 27 28V20ZM26 33C26.3315 33 26.6495 32.8683 26.8839 32.6339C27.1183 32.3995 27.25 32.0815 27.25 31.75C27.25 31.4185 27.1183 31.1005 26.8839 30.8661C26.6495 30.6317 26.3315 30.5 26 30.5C25.6685 30.5 25.3505 30.6317 25.1161 30.8661C24.8817 31.1005 24.75 31.4185 24.75 31.75C24.75 32.0815 24.8817 32.3995 25.1161 32.6339C25.3505 32.8683 25.6685 33 26 33Z"
                                                    fill="#D60101"></path>
                                            </g>
                                            <circle cx="26" cy="26" r="11" stroke="#D60101"
                                                stroke-width="2"></circle>
                                            <defs>
                                                <clipPath id="clip0_213_507">
                                                    <rect width="2" height="16" fill="white"
                                                        transform="translate(25 18)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        <p class="font-semibold text-greyIcon text-balance text-center">
                                            Apakah anda yakin ingin menghapus siswa bernama
                                            {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}?
                                        </p>

                                        <form action={{ route('siswa.hapus', $siswa->id_siswa) }} method="post">
                                            @csrf
                                            <div class="mt-4">
                                                <label for="keterangan" class="block text-grey-700 mb-2">Keterangan:</label>
                                                <textarea id="keterangan" name="keterangan" rows="4" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300"
                                                    placeholder="Tambah keterangan">{{ old('keterangan') }}</textarea>
                                                @error('keterangan')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="flex justify-between gap-4 mt-4">
                                                <button type="button"
                                                    onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})"
                                                    class="text-greyIcon w-full hover:font-semibold">Batal</button>
                                                <button type="submit"
                                                    class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                                    hover:bg-[#d60101] hover:text-white hover:font-semibold"
                                                    style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
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
        setTimeout(function() {
            const session = document.getElementById('session');
            if (session) {
                session.classList.add('hidden');
            }
        }, 4000);

        tippy('#sertif', {
            content: 'Upload Sertifikat',
        });

        function showPopupUploadSertif(i) {
            document.getElementById('popupUploadSertif' + i).classList.toggle('hidden');
        }

        function showPopupHapusDataSiswa(i) {
            document.getElementById('popupHapusDataSiswa' + i).classList.toggle('hidden');
        }
    </script>
</body>

</html>
