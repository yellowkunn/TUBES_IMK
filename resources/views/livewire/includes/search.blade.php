<div>
    <div id="search">
        <!-- <div class="absolute left-5"><i class="fa-solid fa-magnifying-glass text-greyIcon"></i></div> -->
        <input wire:model.live.debounce.500ms="search" autocomplete="off" type="search" id="search" value=""
            class="py-2 px-5 w-full bg-greyBackground border-2 border-greyBorder rounded-lg" placeholder="Cari">
    </div>
</div>
