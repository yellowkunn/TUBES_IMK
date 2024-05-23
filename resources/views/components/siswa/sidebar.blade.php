<div class="bg-white pt-3 h-screen my-5 w-screen md:w-1/6 duration-500" id="sidebarContent">
    <div class="px-8 ms-1 flex flex-col gap-6 lg:gap-10 text-regularContent font-semibold text-greyIcon">
        <a href=" {{ url('beranda') }} " class="flex items-center gap-2">
            <span class="material-symbols-outlined">grid_view</span> 
            <p class="flex duration-500">Beranda</p>
        </a>
        <a href=" {{ url('pembayaran') }} " class="flex items-center gap-3 ps-1">
            <i class="fa-regular fa-credit-card"></i>
            <p class="flex duration-500">Pembayaran</p>
        </a>
        <a href=" {{ url('rapor') }} " class="flex items-center gap-3 ps-1">
            <i class="fa-solid fa-chart-column"></i>
            <p class="flex duration-500">Rapor</p>
        </a>
        <a href=" {{ url('sertifikat') }} " class="flex items-center gap-2">
            <span class="material-symbols-outlined fa-sm">verified</span>
            <p class="flex duration-500">Sertifikat</p>
        </a>
    </div>
</div>
