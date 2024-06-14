<div>
    <button type="button" onclick="showPopupLink()"><i
        class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
    
                            <!-- konten pop up link -->
                            <form wire:submit="tambahlink" action="" enctype="multipart/form-data">
                            <div wire:ignore.self class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow w-full h-screen"
                            id="popupLink">
                            <div class="flex flex-col justify-center">
                                <div class="flex justify-between md:min-w-[800px] bg-white px-10 pt-7 rounded-t-xl">
                                    <p class="font-semibold text-title">Tambah link</p>
                                    <button type="button" onclick="showPopupLink()">
                                        <i
                                            class="fa-solid fa-xmark fa-lg p-3.5 py-5 rounded ms-3 text-greyIcon bg-[#EAEAEA]"></i>
                                    </button>
                                </div>
                                <div class="bg-white p-7 pt-4 rounded-b-xl">
                                    <div class="flex flex-col gap-4">
                                        <div class="w-full overflow-y-auto max-h-96">
                                            <div class="md:flex items-start">
                                                <div class="w-full px-3 py-1.5">
                                                    <div
                                                        class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                                        <p>Link</p>
                                                        <button type="button" wire:click="addlink({{ $i }})"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="flex flex-col">
                                                <div class="flex flex-col">
                                                    @foreach($boxinputlink as $key => $value)
                                                        <div class="flex justify-between py-3 px-5">
                                                            <input type="hidden" name="inputType" value="link">
                                                            <input wire:model="links.{{ $value }}" 
                                                                   type="url" 
                                                                   id="link.{{ $value }}" 
                                                                   class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                   placeholder="Masukkan URL">
                                                            <button type="button" wire:click="removelink({{ $key }})">
                                                                <i class="fa-solid fa-xmark ml-3"></i>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="bg-white text-center">
                                        <button type="submit" onclick="showPopupLink()"
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
