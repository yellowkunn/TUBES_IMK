<div class="md:flex justify-between items-center mt-4 my-7">
    <p class="text-title font-semibold mb-4 md:mb-0">Pengaturan Ruangan</p>
    <div class="flex justify-between items-center relative">
        <input wire:model.live.debounce.500ms="search" autocomplete="off" type="text" id="search" name="search" value=""
            class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-full" placeholder="Cari">
        {{-- <button type="submit" class="absolute right-5"><i
                class="fa-solid fa-magnifying-glass text-greyIcon"></i></button> --}}
        </div>
</div>