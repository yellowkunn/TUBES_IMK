<form wire:submit="tambahPertemuan" action="" enctype="multipart/form-data">
    @csrf
    <p class="text-title font-semibold my-7">Tambah Pertemuan</p>

    <div class="md:flex justify-between gap-16">

        <!-- form kotak kiri -->
        <div class="w-1/2">
            <div class="bg-white drop-shadow-regularShadow rounded-lg p-8 h-fit">
                <div class="flex flex-col gap-12">
                    <div class="flex flex-col gap-2">
                        <label for="pertemuan">Pertemuan ke</label>
                        <input type="text" wire:model="pertemuan" id="pertemuan" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="date">Tanggal</label>
                        <input type="date" wire:model="date" id="date" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="topikbahasan">Topik Bahasan</label>
                        <input type="text" wire:model="topikbahasan" id="topikbahasan" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea wire:model="deskripsi" id="deskripsi" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" rows="3" cols="50"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- form kotak kanan -->
        <div class="flex flex-col gap-5 w-1/2">
            <!-- materi -->
            <div class="bg-white drop-shadow-regularShadow rounded-lg p-5 h-fit">
                <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg p-3 px-6">
                    <button type="button" class="w-full h-full" onclick="showPopupMateri()">
                        <input type="hidden" wire:model="materi" id="materi">
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
                    <button type="button" class="w-full h-full" onclick="showPopupLatihan()">
                        <input type="hidden" wire:model="latihan" id="latihan">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-file"></i>
                            <p class="text-start hover:font-semibold">Tambah Latihan</p>
                        </div>
                        <button type="button" onclick="showPopupLatihan()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                    </button>
                </div>
            </div>

            <hr>

            <!-- link -->
            <div class="bg-white drop-shadow-regularShadow rounded-lg px-7 py-6 h-fit">
                <p class="font-semibold mb-3">Link</p>
                <div class="flex items-center gap-4">
                    <i class="fa-solid fa-link"></i>
                    <input type="url" wire:model="link" id="link" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" />
                </div>
            </div>
        </div>
    </div>

    <!-- konten pop up materi -->
    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen" id="popupMateri">
        <div class="flex flex-col justify-center">
            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                <p class="font-semibold text-title">Tambah Materi</p>
                <button type="button" onclick="showPopupMateri()">
                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                </button>
            </div>
            <div class="bg-white p-7 pt-4 rounded-b-xl">
                <div class="flex flex-col gap-4">
                    <div class="ms-4">
                        <p class="font-semibold mb-1.5">Waktu Akses</p>
                        <input type="time" wire:model="waktuakses" id="waktuakses" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                        <input type="date" wire:model="tanggalakses" id="tanggalakses" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                    </div>
                    <div class="w-full overflow-y-auto max-h-96">
                    <div class="md:flex items-start">
                        <div class="w-full px-3 py-1.5">
                            <div class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                <p>Materi</p>
                                <button type="button" wire:click="addmateri({{ $i }})"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        @foreach($boxinputmateri as $key => $value)
                            <div class="flex justify-between py-3 px-5">
                                <input type="hidden" name="inputType" value="materi">
                                <input wire:model="filemateri.{{ $value }}" type="file" id="file.{{ $value }}" class="file:text-baseBlue file:font-semibold 
                                    file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                                <button type="button" wire:click="removemateri({{ $key }})"><i class="fa-solid fa-xmark me-7"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>

                <div class="bg-white text-center">
                    <button type="button" onclick="showPopupMateri()" class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5" style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
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
                <button type="button" onclick="showPopupLatihan()">
                    <i class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                </button>
            </div>
            <div class="bg-white p-7 pt-4 rounded-b-xl">
                <div class="flex flex-col gap-4">
                    <div class="ms-4">
                        <p class="font-semibold mb-1.5">Waktu Akses</p>
                        <input type="time" wire:model="waktuakses2" id="waktuakses2" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                        <input type="date" wire:model="tanggalakses2" id="tanggalakses2" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                        <p class="font-semibold mb-1.5 mt-3">Tenggat Tugas</p>
                        <input type="time" wire:model="batas_waktu_akses_2" id="batas_waktu_akses_2" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                        <input type="date" wire:model="batas_tanggal_akses_2" id="batas_tanggal_akses_2" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                    </div>
                </div>
                <div class="mt-5">
                <div class="w-full overflow-y-auto max-h-96">
                <div class="md:flex items-start">
                    <div class="w-full px-3 py-1.5">
                        <div class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                            <p>Latihan</p>
                            <button type="button" wire:click.prevent="addlatihan({{ $i }})"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                        </div>

                        <div class="rounded-lg">
                            <div id="divInputFileMateri" class="grid grid-cols-3 bg-neutral-100 border-4 border-white"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    @foreach($boxinputlatihan as $key => $value)
                        <div class="flex justify-between py-3 px-5">
                            <input type="hidden" name="inputType" value="latihan">
                            <input wire:model="filelatihan.{{ $value }}" type="file" id="file.{{ $value }}" class="file:text-baseBlue file:font-semibold 
                                file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                            <button type="button" wire:click="removelatihan({{ $key }})"><i class="fa-solid fa-xmark me-7"></i></button>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>

                <div class="bg-white text-center">
                <button type="button" onclick="showPopupLatihan()" class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5" style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
                        Selesai
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- akhir dari konten pop Latihan -->

    <div class="flex gap-10 justify-center items-center mt-12 mb-4">
        <button type="reset" class="text-greyIcon hover:font-semibold">Reset</button>
        <button type="submit" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-8 rounded-lg 
                                hover:bg-baseBlue hover:text-white hover:font-semibold" style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">Simpan</button>
    </div>
</form>