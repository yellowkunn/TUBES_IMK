<div>
    <button type="button" onclick="showPopupLatihan()"><i
        class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>

                        <!-- konten pop Latihan -->
                        <form wire:submit="tambahlatihan" action="" enctype="multipart/form-data">
                        <div wire:ignore.self class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                        id="popupLatihan">
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                <p class="font-semibold text-title">Tambah Latihan</p>
                                <button type="button" onclick="showPopupLatihan()">
                                    <i
                                        class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                </button>
                            </div>
                            <div class="bg-white p-7 pt-4 rounded-b-xl">
                                <div class="flex flex-col gap-4">
                                    <div class="ms-4">
                                        <p class="font-semibold mb-1.5">Waktu Akses</p>
                                        <input type="time" model="waktuakses2" id="waktuakses2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                                        <input type="date" model="tanggalakses2" id="tanggalakses2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                                        <p class="font-semibold mb-1.5 mt-3">Tenggat Tugas</p>
                                        <input type="time" model="batas_waktu_akses_2" id="batas_waktu_akses_2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                                        <input type="date" model="batas_tanggal_akses_2"
                                            id="batas_tanggal_akses_2"
                                            class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="w-full overflow-y-auto max-h-96">
                                        <div class="md:flex items-start">
                                            <div class="w-full px-3 py-1.5">
                                                <div
                                                    class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                                    <p>Latihan</p>
                                                    <button type="button" wire:click="addlatihan({{ $i }})" onclick="event.preventDefault();">
                                                        <i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i>
                                                    </button>
                                                </div>

                                                <div class="rounded-lg">
                                                    <div id="divInputFileMateri"
                                                        class="grid grid-cols-3 bg-neutral-100 border-4 border-white">
                                                    </div>
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
                                    <button type="submit" onclick="showPopupLatihan()"
                                        class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5"
                                        style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
                                        Tambah
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- akhir dari konten pop Latihan -->
</div>
