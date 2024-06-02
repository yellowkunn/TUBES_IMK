<div class="w-full overflow-y-auto max-h-96">
    <div class="md:flex items-start">
        <div class="w-full px-3 py-1.5">
            <div class="flex justify-between gap-28 items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                @if($inputType == 'materi')
                <p>Materi</p>
                @elseif($inputType == 'latihan')
                <p>Latihan</p>
                @else
                <p>Folder</p>
                @endif
                <button type="button" wire:click="add({{ $i }})"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
            </div>

            <div class="rounded-lg">
                <div id="divInputFileMateri" class="grid grid-cols-3 bg-neutral-100 border-4 border-white"></div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        @foreach($inputs as $key => $value)
            <div class="flex justify-between py-3 px-5">
                @if($inputType == 'materi')
                <input type="hidden" name="inputType" value="materi">
                <input wire:model="file.{{ $value }}" type="file" id="file.{{ $value }}" class="file:text-baseBlue file:font-semibold 
                    file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                @elseif($inputType == 'latihan')
                <input type="hidden" name="inputType" value="latihan">
                <div class="flex flex-col gap-4 py-2" wire.model="div.{{ $key }}">
                    <!-- <div>
                        <input type="time" wire:model="waktutenggat.{{ $value }}" id="waktutenggat" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg me-2">
                        <input type="date" wire:model="tanggaltenggat.{{ $value }}" id="tanggaltenggat" class="border-2 border-baseBlue/20 bg-baseBlue/5 rounded-lg">
                    </div> -->
                    <input wire:model="file.{{ $value }}" type="file" id="file.{{ $value }}" class="file:text-baseBlue file:font-semibold 
                        file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer">
                </div>
                @else
                    <input wire:model="folder.{{ $value }}" type="file" id="folder.{{ $value }}" class="file:text-baseBlue file:font-semibold 
                        file:bg-baseBlue/20 file:rounded-full file:py-2 file:px-4 file:border-none file:cursor-pointer" webkitdirectory directory multiple/>
                @endif
                <button type="button" wire:click="remove({{ $key }})"><i class="fa-solid fa-xmark me-7"></i></button>
            </div>
        @endforeach
    </div>
</div>
