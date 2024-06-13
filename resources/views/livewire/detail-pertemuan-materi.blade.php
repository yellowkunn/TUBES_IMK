<div>
    <button type="button" onclick="showPopupMateri()"><i
        class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
    
                            <!-- konten pop up materi -->
                            <form wire:submit="tambahmateri" action="" enctype="multipart/form-data">
                            <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                            id="popupMateri">
                            <div class="flex flex-col justify-center">
                                <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                    <p class="font-semibold text-title">Tambah Materi</p>
                                    <button type="button" onclick="showPopupMateri()">
                                        <i
                                            class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
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
                                                    <div
                                                        class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
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
                                        <button type="submit" onclick="showPopupMateri()"
                                            class="w-fit h-11 px-4 text-baseBlue font-semibold border-2 border-baseBlue rounded-full hover:border-none hover:bg-baseBlue hover:text-white mt-5"
                                            style="filter: drop-shadow(0px 0px 5px rgba(121,162,226,0.3));">
                                            Tambah
                                        </button>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </form>
    
    </div>
