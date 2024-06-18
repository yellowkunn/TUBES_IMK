<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajar</title>

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

        <div class=" px-8 sm:px-16 lg:px-20 flex justify-center" id="session">
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

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div id="success"
                    class="bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 items-center px-8 py-3 justify-center rounded-2xl flex unselectable">
                    <div class="flex justify-between items-center gap-4 lg:gap-36">
                        <div class="flex gap-4 items-center">
                            <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                            <p class="text-lg text-greyIcon">{{ session('success') }}</p>
                        </div>

                        <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full"
                            onclick="document.getElementById('success').classList.add('hidden')"></i>
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
                        <a href="{{ route('editdaftarpengajar') }}" class="hover:font-semibold">Pengajar</a>
                    </div>


                    @livewire('daftar-pengajar')

                    <!-- pop up tambah pengajar -->
                    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                        id="popupTambahPengajar">
                        <div class="flex flex-col justify-center w-[60%]">
                            <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                <p class="text-title">Tambah Pengajar</p>
                                <button onclick="showPopupTambahPengajar()">
                                    <i class="fa-solid fa-xmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">

                                <form action="{{ url('/tambahpengajarbaru') }}" method="POST" onchange="setDataForm()">
                                    @csrf
                                    <div class="overflow-y-auto max-h-96 pe-7 flex flex-col gap-5 mt-5 px-0.5">
                                        <div class="flex justify-between gap-14">
                                            <!-- kiri -->
                                            <div class="w-full flex flex-col gap-6">
                                                <div>
                                                    <p class="font-semibold mb-2">Pilih Calon Pengajar</p>
                                                    <select
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        name="pengajar" id="pengajar" required>
                                                        <option value="" disabled selected></option>
                                                        @foreach ($pengguna as $user)
                                                            <option value="{{ $user->id_pengguna }}">
                                                                {{ $user->username }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <p class="font-semibold mb-2">Nama Lengkap</p>
                                                    <input
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        required type="text" name="nama" id="nama">
                                                </div>

                                                <div>
                                                    <p class="font-semibold mb-2">Tanggal Lahir</p>
                                                    <input
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        required type="date" name="tanggal_lahir" id="tanggal_lahir">
                                                </div>

                                                <div>
                                                    <p class="font-semibold mb-2">Alamat</p>
                                                    <input
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        required type="text" name="tempat" id="tempat">
                                                </div>
                                                <div>
                                                    <p class="font-semibold mb-2">Agama</p>
                                                    <input
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        required type="text" name="agama" id="agama">
                                                </div>
                                                <div>
                                                    <p class="font-semibold mb-2">jabatan</p>
                                                    <input
                                                        class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                        required type="text" name="jabatan" id="jabatan">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- kanan -->
                                        <div class="w-full flex flex-col gap-6">

                                            <div>
                                                <p class="font-semibold mb-2">Pilih Kelas</p>
                                                <select
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    name="kelas" id="kelas">
                                                    @foreach ($kelas as $kls)
                                                        <option value="{{ $kls->id_kelas }}">{{ $kls->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-2">Pendidikan</p>
                                                <input
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    required type="text" name="pendidikan" id="pendidikan">
                                            </div>

                                            <div>
                                                <p class="font-semibold mb-2">Jabatan</p>
                                                <input
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    required type="text" name="jabatan" id="jabatan">
                                            </div>

                                            <div>
                                                <p class="font-semibold mb-2">No HP</p>
                                                <input
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    required type="number" name="noHp" id="noHp">
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-2">No Telepon</p>
                                                <input
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    required type="number" name="noTelp" id="noTelp">
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-2">Kewarganegaraan</p>
                                                <input
                                                    class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                                    required type="text" name="kewarganegaraan"
                                                    id="kewarganegaraan">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-8 flex justify-center gap-6">
                                        <button type="button" onclick="showPopupTambahPengajar()"
                                            class="text-greyIcon hover:font-semibold">Batal</button>
                                        <button type="submit"
                                            class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                        hover:bg-baseBlue hover:text-white hover:font-semibold"
                                            style="box-shadow: 
                                        0px 0px 5px 1px rgba(122,161,226,0.3);">Tambah</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- akhir dari pop up tambah pengajar -->

                    @if (isset($pengajars) && count($pengajars) > 0)
                        @foreach ($pengajars as $pengajar)
                            <!-- pop up detail pengajar -->
                            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                                id="popupDetailPengajar{{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }}">
                                <div class="flex flex-col justify-center md:min-w-[800px]">
                                    <div class="bg-white rounded-xl px-10 py-8">
                                        <div class="flex justify-between text-end">
                                            <p class="font-semibold text-title">Detail Pengajar</p>
                                            <button
                                                onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})">
                                                <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                                            </button>
                                        </div>

                                        <div class="flex flex-col gap-4">
                                            <div class="py-4">
                                                <div class="flex justify-center mb-6">
                                                    <img src="{{ asset('berkas_ujis/' . $pengajar->pengguna->foto_profile ?? 'default.jpg') }}"
                                                        class="w-16 h-16 object-cover rounded-full" alt="">
                                                </div>

                                                <div class="grid grid-cols-2">
                                                    <div class="flex flex-col gap-2">
                                                        <p class="font-semibold">Nama: <span
                                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->nama_lengkap ?? '-' }}</span>
                                                        </p>
                                                        <p class="font-semibold">Tanggal Lahir: <span
                                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->tmpt_tgl_lahir ?? '-' }}</span>
                                                        </p>
                                                        <p class="font-semibold">Tempat: <span
                                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->alamat ?? '-' }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="flex flex-col gap-2">
                                                        <p class="font-semibold">Pendidikan: <span
                                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->pendidikan ?? '-' }}</span>
                                                        </p>
                                                        <p class="font-semibold">Jabatan: <span
                                                                class="font-normal">{{ $pengajar->jabatan }}</span>
                                                        </p>
                                                        <p class="font-semibold">No. Handphone: <span
                                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->no_hp ?? '-' }}</span>
                                                        </p>
                                                    </div>
                                                </div>

                                                <!-- <p class="">{{ $pengajar->kelas->nama ?? '-' }}</p>
                                    <p class="">{{ $pengajar->kelas->jadwal_hari ?? '-' }}</p>
                                    <p class="">10.00 WIB, 11.00 WIB, 12.00 WIB</p> -->
                                            </div>

                                            <div class="flex justify-center mt-2">
                                                <button type="button"
                                                    onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                    class="text-baseBlue 
                                    bg-white border-2 border-baseBlue p-1.5 px-6 rounded-full hover:bg-baseBlue hover:text-white hover:font-semibold">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir dari pop up detail Pengajar -->
                        @endforeach
                    @endif

                    @if (isset($pengajars) && count($pengajars) > 0)
                        @foreach ($pengajars as $pengajar)
                            <!-- pop up upload sertif -->
                            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                                id="popupUploadSertif{{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }}">
                                <div class="flex flex-col justify-center md:min-w-[500px]">
                                    <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                                        <p class="text-title">Upload Sertifikat</p>
                                        <button
                                            onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})">
                                            <i class="fa-solid fa-xmark fa-lg text-white"></i>
                                        </button>
                                    </div>

                                    <div class="bg-white rounded-b-xl px-10 py-8">
                                        <form action="{{ url('/uploadSertifikat') }}" method="post"
                                            class="flex flex-col justify-center gap-6" enctype="multipart/form-data">
                                            @csrf
                                            <p>Sertifikat untuk
                                                {{ $pengajar->pengguna->biodataPengajar->nama_lengkap ?? '-' }}</p>
                                            <input type="file" name="sertifikatPengajar" id="sertifikatPengajar"
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
                                            <input type="hidden" name="pengajar_id"
                                                value="{{ $pengajar->id_pengajar ?? '0' }}">

                                            <div class="flex justify-center gap-6 mb-2 mt-4">
                                                <button type="button"
                                                    onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
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
                            <!-- akhir dari pop up upload sertif -->
                        @endforeach
                    @endif

                    @if (isset($pengajars) && count($pengajars) > 0)
                        @foreach ($pengajars as $pengajar)
                            <!-- pop up hapus pengajar -->
                            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                                id="popupHapusPengajar{{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }}">
                                <div class="flex flex-col justify-center max-w-[350px]">
                                    <div class="bg-white rounded-xl px-10 py-8">
                                        <div class="text-end">
                                            <button
                                                onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})">
                                                <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                                            </button>
                                        </div>

                                        <div class="flex flex-col gap-4">
                                            <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="w-[52px] h-[52px] mx-auto">
                                                <circle cx="26" cy="26" r="26" fill="#FF3838"
                                                    fill-opacity="0.1">
                                                </circle>
                                                <circle cx="26" cy="26" r="21" fill="#FF3838"
                                                    fill-opacity="0.15">
                                                </circle>
                                                <g clip-path="url(#clip0_213_507)">
                                                    <path
                                                        d="M27 20C27 19.4469 26.5531 19 26 19C25.4469 19 25 19.4469 25 20V28C25 28.5531 25.4469 29 26 29C26.5531 29 27 28.5531 27 28V20ZM26 33C26.3315 33 26.6495 32.8683 26.8839 32.6339C27.1183 32.3995 27.25 32.0815 27.25 31.75C27.25 31.4185 27.1183 31.1005 26.8839 30.8661C26.6495 30.6317 26.3315 30.5 26 30.5C25.6685 30.5 25.3505 30.6317 25.1161 30.8661C24.8817 31.1005 24.75 31.4185 24.75 31.75C24.75 32.0815 24.8817 32.3995 25.1161 32.6339C25.3505 32.8683 25.6685 33 26 33Z"
                                                        fill="#D60101"></path>
                                                </g>
                                                <circle cx="26" cy="26" r="11" stroke="#D60101"
                                                    stroke-width="2">
                                                </circle>
                                                <defs>
                                                    <clipPath id="clip0_213_507">
                                                        <rect width="2" height="16" fill="white"
                                                            transform="translate(25 18)">
                                                        </rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                            <p class="font-semibold text-greyIcon text-balance text-center">
                                                Apakah anda yakin ingin menghapus
                                                {{ $pengajar->pengguna->biodataPengajar->nama_lengkap ?? '-' }}?
                                            </p>

                                            <form action="{{ route('pengajar.hapus', $pengajar->id_pengajar) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="flex justify-between gap-4 mt-4">
                                                    <button type="button"
                                                        onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                        class="text-greyIcon hover:text-black w-full">Batal</button>
                                                    <button type="submit"
                                                        class="text-[#d60101] bg-white border-2 border-[#d60101] p-1.5 w-full rounded-full
                                        hover:bg-[#d60101] hover:text-white"
                                                        style="box-shadow: 0px 0px 5px 1px rgba(214,1,1,0.3);">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir dari pop up hapus Pengajar -->
                        @endforeach
                    @endif
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

            function showPopupTambahPengajar() {
                document.getElementById('popupTambahPengajar').classList.toggle('hidden');
            }

            function showPopupDetailPengajar(i) {
                document.getElementById('popupDetailPengajar' + i).classList.toggle('hidden');
            }

            function showPopupUploadSertif(i) {
                document.getElementById('popupUploadSertif' + i).classList.toggle('hidden');
            }

            function showPopupHapusPengajar(i) {
                document.getElementById('popupHapusPengajar' + i).classList.toggle('hidden');
            }

            function showPopupEditPengajar(i) {
                document.getElementById('popupEditPengajar' + i).classList.toggle('hidden');
            }
        </script>

</body>

</html>
