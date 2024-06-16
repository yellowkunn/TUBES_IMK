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


                    <div class="flex justify-between items-center mt-4 my-7">
                        <p class="text-title font-semibold">Daftar Pengajar</p>

                        <div class="flex gap-4">
                            <form method="get" class="flex justify-between items-center relative">
                                @csrf
                                <input autocomplete="off" type="text" id="search" name="search" value=""
                                    class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-lg"
                                    placeholder="Cari">
                                <button type="submit" class="absolute right-5"><i
                                        class="fa-solid fa-magnifying-glass text-greyIcon"></i></button>
                            </form>
                            <button onclick="showPopupTambahPengajar()"
                                class="bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-3 py-2 rounded-lg">
                                <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                                <p class="text-greyIcon font-semibold">Tambah pengajar</p>
                            </button>
                        </div>
                    </div>

                    <!-- Pesan Error -->
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Terjadi kesalahan dengan input Anda:</span>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Pesan Sukses -->
                    @if (session('success'))
                        <div id="success-message"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="dismissMessage()">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Tutup</title>
                                    <path
                                        d="M14.348 5.652a1 1 0 011.415 0l1.515 1.515a1 1 0 010 1.414l-8.648 8.648a1 1 0 01-1.415 0L2.122 8.59a1 1 0 010-1.415L3.637 5.652a1 1 0 011.414 0L10 10.586l4.348-4.348z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    <script>
                        function dismissMessage() {
                            const message = document.getElementById('success-message');
                            message.style.transition = 'opacity 1s ease-out';
                            message.style.opacity = '0';
                            setTimeout(() => {
                                message.style.display = 'none';
                            }, 1000);
                        }

                        // Automatically dismiss the message after 5 seconds
                        setTimeout(() => {
                            const message = document.getElementById('success-message');
                            if (message) {
                                message.style.transition = 'opacity 1s ease-out';
                                message.style.opacity = '0';
                                setTimeout(() => {
                                    message.style.display = 'none';
                                }, 1000);
                            }
                        }, 5000);
                    </script>

                    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border">
                        <!-- tabel pengajar -->
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
                            style="color: #191919">
                            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                                style="color: #717171">
                                <th scope="col" class= "w-2 px-8 py-3">No.</th>
                                <th scope="col" class= "px-8 py-3">Nama Lengkap</th>
                                <th scope="col" class= "px-8 py-3">Jabatan</th>
                                <th scope="col" class= "px-8 py-3">Kelas</th>
                                <th></th>
                                <th scope="col" class= "px-8 py-3 text-center">Aksi</th>
                            </thead>

                            <tbody>
                                @if ($pengajars)
                                    @php
                                        $i = 1;
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengajars as $pengajar)
                                        <tr class="border-b border-neutral-200">
                                            <td class="px-8 py-4 font-semibold">{{ $no++ }}.</td>
                                            <td class="px-8 py-4">
                                                <div class="flex gap-2 items-center">
                                                    <img src="{{ asset('berkas_ujis/' . $pengajar->pengguna->foto_profile ?? 'default.jpg') }}"
                                                        alt="pic" class="w-10 h-10 object-cover rounded-full">
                                                    <p class="font-semibold">
                                                        {{ $pengajar->pengguna->biodataPengajar->nama_lengkap ?? '-' }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-8 py-4">{{ $pengajar->jabatan ?? '-' }}</td>
                                            <td class="px-8 py-4">{{ $pengajar->kelas->nama ?? '-' }}</td>
                                            <td class="py-4">
                                                <button
                                                    onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                    id="sertif">
                                                    <span
                                                        class="material-symbols-outlined text-greyIcon mt-1.5">workspace_premium</span>
                                                </button>
                                            </td>
                                            <td class="px-8 py-4 flex items-center gap-4 justify-center">
                                                <button
                                                    onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                    class="text-baseBlue font-semibold w-16 h-8 rounded hover:bg-white hover:border-2 hover:border-baseBlue focus:bg-baseBlue focus:text-white">Detail</button>
                                                <button
                                                    onclick="showPopupEditPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                    class="flex items-center gap-2">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                                <button
                                                    onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                                    class="flex items-center gap-2">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    @endif
                    </tbody>
                    </table>
                    <!-- akhir dari tabel pengajar -->
                </div>
            </div>

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
                                                    <option value="{{ $user->id_pengguna }}">{{ $user->username }}
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
                                                <option value="{{ $kls->id_kelas }}">{{ $kls->nama }}</option>
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
                                            required type="text" name="kewarganegaraan" id="kewarganegaraan">
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

            <!-- pop up detail pengajar -->
            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                id="popupDetailPengajar{{ $pengajar->pengguna->biodataPengajar->id_biodata }}">
                <div class="flex flex-col justify-center md:min-w-[800px]">
                    <div class="bg-white rounded-xl px-10 py-8">
                        <div class="flex justify-between text-end">
                            <p class="font-semibold text-title">Detail Pengajar</p>
                            <button
                                onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata }})">
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
                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->nama_lengkap }}</span>
                                        </p>
                                        <p class="font-semibold">Tanggal Lahir: <span
                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->tmpt_tgl_lahir }}</span>
                                        </p>
                                        <p class="font-semibold">Tempat: <span
                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->alamat }}</span>
                                        </p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <p class="font-semibold">Pendidikan: <span
                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->pendidikan }}</span>
                                        </p>
                                        <p class="font-semibold">Jabatan: <span
                                                class="font-normal">{{ $pengajar->jabatan }}</span></p>
                                        <p class="font-semibold">No. Handphone: <span
                                                class="font-normal">{{ $pengajar->pengguna->biodataPengajar->no_hp }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- <p class="">{{ $pengajar->kelas->nama ?? '-' }}</p>
                                    <p class="">{{ $pengajar->kelas->jadwal_hari ?? '-' }}</p>
                                    <p class="">10.00 WIB, 11.00 WIB, 12.00 WIB</p> -->
                            </div>

                            <div class="flex justify-center mt-2">
                                <button type="button"
                                    onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata }})"
                                    class="text-baseBlue 
                                    bg-white border-2 border-baseBlue p-1.5 px-6 rounded-full hover:bg-baseBlue hover:text-white hover:font-semibold">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir dari pop up detail Pengajar -->

            <!-- pop up upload sertif -->
            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                id="popupUploadSertif{{ $pengajar->pengguna->biodataPengajar->id_biodata }}">
                <div class="flex flex-col justify-center md:min-w-[500px]">
                    <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                        <p class="text-title">Upload Sertifikat</p>
                        <button
                            onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata }})">
                            <i class="fa-solid fa-xmark fa-lg text-white"></i>
                        </button>
                    </div>

                    <div class="bg-white rounded-b-xl px-10 py-8">
                        <form action="{{ url('/uploadSertifikat') }}" method="post"
                            class="flex flex-col justify-center gap-6" enctype="multipart/form-data">
                            @csrf
                            <p>Sertifikat untuk {{ $pengajar->pengguna->biodataPengajar->nama_lengkap }}</p>
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
                            <input type="hidden" name="pengajar_id" value="{{ $pengajar->id_pengajar }}">

                            <div class="flex justify-center gap-6 mb-2 mt-4">
                                <button type="button"
                                    onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata }})"
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

            <!-- pop up hapus pengajar -->
            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
                        w-full h-screen"
                id="popupHapusPengajar{{ $pengajar->pengguna->biodataPengajar->id_biodata }}">
                <div class="flex flex-col justify-center max-w-[350px]">
                    <div class="bg-white rounded-xl px-10 py-8">
                        <div class="text-end">
                            <button
                                onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata }})">
                                <i class="fa-solid fa-xmark fa-lg text-greyIcon"></i>
                            </button>
                        </div>

                        <div class="flex flex-col gap-4">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[52px] h-[52px] mx-auto">
                                <circle cx="26" cy="26" r="26" fill="#FF3838" fill-opacity="0.1">
                                </circle>
                                <circle cx="26" cy="26" r="21" fill="#FF3838" fill-opacity="0.15">
                                </circle>
                                <g clip-path="url(#clip0_213_507)">
                                    <path
                                        d="M27 20C27 19.4469 26.5531 19 26 19C25.4469 19 25 19.4469 25 20V28C25 28.5531 25.4469 29 26 29C26.5531 29 27 28.5531 27 28V20ZM26 33C26.3315 33 26.6495 32.8683 26.8839 32.6339C27.1183 32.3995 27.25 32.0815 27.25 31.75C27.25 31.4185 27.1183 31.1005 26.8839 30.8661C26.6495 30.6317 26.3315 30.5 26 30.5C25.6685 30.5 25.3505 30.6317 25.1161 30.8661C24.8817 31.1005 24.75 31.4185 24.75 31.75C24.75 32.0815 24.8817 32.3995 25.1161 32.6339C25.3505 32.8683 25.6685 33 26 33Z"
                                        fill="#D60101"></path>
                                </g>
                                <circle cx="26" cy="26" r="11" stroke="#D60101" stroke-width="2">
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
                                {{ $pengajar->pengguna->biodataPengajar->nama_lengkap }}?
                            </p>

                            <form action="{{ route('pengajar.hapus', $pengajar->id_pengajar) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between gap-4 mt-4">
                                    <button type="button"
                                        onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata }})"
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
        </div>

    </div>
    </div>

    @include('components.footer')

    <script>
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
