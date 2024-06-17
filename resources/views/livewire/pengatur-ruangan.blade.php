<div>
    <!-- page hierarchy -->
    <div class="flex items-center gap-2 text-smallContent">
        <div class="flex items-center gap-2 text-smallContent mb-5">
            <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
            <i class="fa-solid fa-caret-right text-baseBlue"></i>
            <a href="{{ route('pengaturanruangan') }}" class="hover:font-semibold">Pengaturan Ruangan</a>
        </div>
    </div>
    <div>
        <div class="border-b-2 border-baseBlue w-full flex gap-6 mb-10">
            <button type="button" wire:click="setActiveTab('belumDiatur')" id="belumDiaturBtn"
                    class="rounded-t-lg py-2 px-4 {{ $activeTab === 'belumDiatur' ? 'bg-baseBlue text-white' : 'bg-white text-baseBlue' }}">
                Belum diatur
            </button>
            <button type="button" wire:click="setActiveTab('sudahDiatur')" id="sudahDiaturBtn"
                    class="rounded-t-lg py-2 px-4 {{ $activeTab === 'sudahDiatur' ? 'bg-baseBlue text-white' : 'bg-white text-baseBlue' }}">
                Sudah diatur
            </button>
        </div>
    
        <div class="md:flex justify-between items-center mt-4 my-7">
            <p class="text-title font-semibold mb-4 md:mb-0">Pengaturan Ruangan</p>
            <div class="flex justify-between items-center relative">
                <input wire:model.live.debounce.500ms="search" autocomplete="off" type="text" id="search" name="search"
                       class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full" placeholder="Cari">
            </div>
        </div>
    
        @if ($activeTab === 'belumDiatur')
            <div id="belumDiaturContent">
                <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">
                    @foreach ($kelasJamkos as $kelas)
                        <div
                            class="bg-white h-fit rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">
                            <div class="flex items-center gap-2 w-full">
                                <span class="relative flex h-3 w-3">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                </span>
                                <p class="text-red-500 text-smallContent font-semibold">Belum diatur</p>
                            </div>
    
                            <div class="flex flex-col gap-2 mt-4">
                                <p class="font-semibold md:text-[20px] lg:text-subtitle capitalize">
                                    {{ $kelas->nama }}</p>
    
                                <button id="dd-more{{ $loop->index }}" onclick="showPopupAturRuangan({{ $kelas->id_kelas }})"
                                        class="rounded-lg bg-baseBlue/90 group-hover:bg-baseBlue text-white py-2 my-3 inline-block text-center">Atur
                                    Ruangan</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div id="sudahDiaturContent">
                <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-24 gap-y-16">
                    @foreach ($kelass as $kelas)
                        <div
                            class="bg-white h-fit rounded-lg p-6 px-10 lg:px-12 drop-shadow-regularShadow relative group my-8 sm:my-0">
                            <div>
                                <div class="flex justify-between mb-3">
                                    <div class="flex items-center gap-2 w-full">
                                        <span class="relative flex h-3 w-3">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-300 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-400"></span>
                                        </span>
                                        <p class="text-green-500 text-smallContent font-semibold">Sudah diatur
                                        </p>
                                    </div>
    
                                    <button id="dd-more{{ $loop->index }}"
                                            onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})">
                                        <i class="fa-regular fa-trash-can" id="hapus"></i>
                                    </button>
                                </div>
                            </div>
    
                            <div class="flex flex-col gap-2">
                                <p class="font-semibold md:text-[20px] lg:text-subtitle capitalize mb-4">
                                    {{ $kelas->nama }}</p>
    
                                <p class="font-semibold">Pengajar: <span
                                        class="font-normal">{{ $kelas->pengajar[0]->pengguna->biodataPengajar->nama_lengkap ?? '-' }}</span>
                                </p>
                                <p class="font-semibold">Hari: <span class="font-normal">{{ $kelas->jadwal_hari }}</p>
                                <p class="font-semibold">Jam: <span class="font-normal">{{ $kelas->jam }}
                                </p>
                                <button id="dd-more{{ $loop->index }}" onclick="showPopupEditRuangan({{ $kelas->id_kelas }})"
                                        class="rounded-lg bg-baseBlue/90 group-hover:bg-baseBlue text-white py-2 my-3 inline-block text-center">Edit
                                    Ruangan</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    

    @foreach ($kelasJamkos as $kelas)
        <!-- pop up atur pengaturan ruang kelas -->
        <div class="hidden top-0 left-0 flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
            id="popupAturRuangan{{ $kelas->id_kelas }}">
            <div class="flex flex-col justify-center min-w-[450px]">
                <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                    <p class="text-title">Atur Kelas</p>
                    <button onclick="showPopupAturRuangan({{ $kelas->id_kelas }})">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                    <form action="{{ url('/aturRuangan') }}" method="post" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <p class="font-semibold mb-1">Pengaturan ruang kelas </p>
                            <p class="font-semibold mb-1 text-subtitle">{{ $kelas->nama }}</p>
                            <input type="hidden" name="namaKelas" id="namaKelas" value="{{ $kelas->nama }}">
                        </div>

                        <div>
                            <p class="font-semibold mb-1">Pengajar</p>
                            <select
                                class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                name="pengajar" id="pengajar">
                                <option value="" disabled selected>Pilih Pengajar</option>
                                @if ($pengajars->isNotEmpty())
                                    @foreach ($pengajars as $pengajar)
                                        <option value="{{ $pengajar->id_pengguna }}">
                                            {{ $pengajar->biodataPengajar->nama_lengkap }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div>
                            <p class="font-semibold mb-2">Jadwal</p>

                            <div class="overflow-y-auto max-h-30 flex flex-col gap-4 pe-3 ps-0.5">
                                <!-- foreach jadwal_hari -->
                                <div class="mb-2">
                                    <p>{{ $kelas->jadwal_hari }}</p>
                                </div>
                            </div>

                            <div class="relative flex flex-col gap-3 w-full">
                                <label for="jam"
                                    class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Pilih
                                    jam default</label>
                                <select id="jam" name="jam"
                                    class="dark:focus:bg-[#374151]/40 pt-8 block appearance-none w-full bg-greyBackground dark:bg-[#374151]/40 dark:text-white dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                    <option value="" class="text-greyIcon dark:dark-mode" disabled>Jam</option>
                                    <option class="text-greyIcon dark:dark-mode" value="13.30-15.00">
                                        13.30-15.00
                                    </option>
                                    <option class="text-greyIcon dark:dark-mode" value="15.00-16.30">
                                        15.00-16.30
                                    </option>
                                    <option class="text-greyIcon dark:dark-mode" value="16.30-18.00">
                                        16.30-18.00
                                    </option>
                                </select>
                            </div>

                            <div class="mt-4 relative flex flex-col gap-3 w-full">
                                <label for="jamTambahan"
                                    class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Pilih
                                    jam custom</label>
                                <select id="jamTambahan" name="jam"
                                    class="dark:focus:bg-[#374151]/40 pt-8 block appearance-none w-full bg-greyBackground dark:bg-[#374151]/40 dark:text-white dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                    <option value="" class="text-greyIcon dark:dark-mode" disabled>Jam</option>
                                    <option class="text-greyIcon dark:dark-mode" value="09.00-10.30">
                                        09.00-10.30
                                    </option>
                                    <option class="text-greyIcon dark:dark-mode" value="10.30-12.00">
                                        10.30-12.00
                                    </option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">

                        <div class="mt-8 flex justify-end gap-6">
                            <button type="button" onclick="showPopupAturRuangan({{ $kelas->id_kelas }})"
                                class="text-greyIcon hover:text-black">Batal</button>
                            <button type="submit"
                                class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                            hover:bg-baseBlue hover:text-white"
                                style="box-shadow: 
                            0px 0px 5px 1px rgba(122,161,226,0.3);">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
    <!-- akhir dari pop up atur pengaturan ruang kelas -->

    @if (isset($kelass) && count($kelass) > 0)
        @foreach ($kelass as $kelas)
            <!-- pop up edit pengaturan ruang kelas -->
            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                id="popupEditRuangan{{ $kelas->id_kelas }}">
                <div class="flex flex-col justify-center min-w-[450px]">
                    <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                        <p class="text-title">Edit Kelas</p>
                        <button onclick="showPopupEditRuangan({{ $kelas->id_kelas }})">
                            <i class="fa-solid fa-xmark fa-lg"></i>
                        </button>
                    </div>
                    <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                        <form action="{{ url('/editPengaturanRuangKelas') }}" method="post"
                            class="flex flex-col gap-5">
                            @csrf
                            <div>
                                <p class="font-semibold mb-1">Pengaturan ruang kelas </p>
                                <p class="font-semibold mb-1 text-subtitle">{{ $kelas->nama }}
                                </p>
                                <input type="hidden" name="namaKelas" id="namaKelas" value="{{ $kelas->nama }}">
                            </div>

                            <div>
                                <p class="font-semibold mb-1">Pengajar</p>
                                <select
                                    class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1"
                                    name="pengajar" id="pengajar">
                                    <option value="" disabled selected>Pilih Pengajar
                                    </option>
                                    @if ($pengajars->isNotEmpty())
                                        @foreach ($pengajars as $pengajar)
                                            <option value="{{ $pengajar->id_pengguna }}">
                                                {{ $pengajar->biodataPengajar->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div>
                                <div class="overflow-y-auto max-h-30 flex flex-col gap-4 pe-3 ps-0.5">
                                    <!-- foreach jadwal_hari -->
                                    <div>
                                        <p class="font-semibold mt-3">Tambah Jam</p>
                                        <div class="flex gap-3 items-center mt-1">
                                            <div class="relative flex flex-col gap-3 w-full">
                                                <label for="jam"
                                                    class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Pilih
                                                    jam default</label>
                                                <select id="jam2" name="jam"
                                                    class="dark:focus:bg-[#374151]/40 pt-8 block appearance-none w-full bg-greyBackground dark:bg-[#374151]/40 dark:text-white dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                                    <option value="" class="text-greyIcon dark:dark-mode"
                                                        disabled>
                                                        Jam</option>
                                                    <option class="text-greyIcon dark:dark-mode" value="13.30-15.00">
                                                        13.30-15.00
                                                    </option>
                                                    <option class="text-greyIcon dark:dark-mode" value="15.00-16.30">
                                                        15.00-16.30
                                                    </option>
                                                    <option class="text-greyIcon dark:dark-mode" value="16.30-18.00">
                                                        16.30-18.00
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-4 relative flex flex-col gap-3 w-full">
                                            <label for="jamTambahan2"
                                                class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Pilih
                                                jam custom</label>
                                            <select id="jamTambahan2" name="jam"
                                                class="dark:focus:bg-[#374151]/40 pt-8 block appearance-none w-full bg-greyBackground dark:bg-[#374151]/40 dark:text-white dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                                <option value="" class="text-greyIcon dark:dark-mode" disabled>
                                                    Jam</option>
                                                <option class="text-greyIcon dark:dark-mode" value="09.00-10.30">
                                                    09.00-10.30
                                                </option>
                                                <option class="text-greyIcon dark:dark-mode" value="10.30-12.00">
                                                    10.30-12.00
                                                </option>
                                            </select>
                                        </div>

                                        <div>
                                            <p class="font-semibold mt-6 mb-1">Pilih Hari</p>
                                            <!-- <input class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" type="text" name="jadwal_hari" id="jadwal_hari"> -->
                                            <div class="flex gap-8">
                                                <div class="flex flex-col gap-4">
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="senin" name="hari[]" value="senin"><label
                                                            for="senin">Senin</label></div>
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="kamis" name="hari[]" value="kamis"><label
                                                            for="kamis">Kamis</label></div>
                                                </div>
                                                <div class="flex flex-col gap-4">
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="selasa" name="hari[]" value="selasa"><label
                                                            for="selasa">Selasa</label></div>
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="jumat" name="hari[]" value="jumat"><label
                                                            for="jumat">Jumat</label></div>
                                                </div>
                                                <div class="flex flex-col gap-4">
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="rabu" name="hari[]" value="rabu"><label
                                                            for="rabu">Rabu</label></div>
                                                    <div class="flex items-center gap-2"><input type="checkbox"
                                                            class="rounded appearance-none checked:bg-baseBlue"
                                                            id="sabtu" name="hari[]" value="sabtu"><label
                                                            for="sabtu">Sabtu</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas }}">
                                    </div>
                                </div>

                                <div class="mt-8 flex justify-end gap-6">
                                    <button type="button" onclick="showPopupEditRuangan({{ $kelas->id_kelas }})"
                                        class="text-greyIcon hover:text-black">Batal</button>
                                    <button type="submit"
                                        class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full hover:bg-baseBlue hover:text-white"
                                        style="box-shadow: 0px 0px 5px 1px rgba(122,161,226,0.3);">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- akhir dari pop up edit pengaturan ruang kelas -->
        @endforeach
    @endif


    @if (isset($kelass) && count($kelass) > 0)
        @foreach ($kelass as $kelas)
            <!-- pop up hapus pengaturan ruang kelas -->
            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                id="popupHapusRuangan{{ $kelas->id_kelas }}">
                <div class="flex flex-col justify-center max-w-[350px]">
                    <div class="bg-white rounded-xl px-10 py-8">
                        <div class="text-end">
                            <button onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})">
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
                                            transform="translate(25 18)"></rect>
                                    </clipPath>
                                </defs>
                            </svg>

                            <p class="font-semibold text-greyIcon text-balance text-center">
                                Apakah anda yakin ingin menghapus pengaturan ruang untuk kelas
                                {{ $kelas->nama }}?
                            </p>

                            <form action="{{ url('/deleteKelas', $kelas->id_kelas) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between gap-4 mt-4">
                                    <button type="button" onclick="showPopupHapusRuangan({{ $kelas->id_kelas }})"
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
                <!-- akhir dari pop up hapus pengaturan ruang kelas -->

            </div>
        @endforeach
    @endif
</div>
