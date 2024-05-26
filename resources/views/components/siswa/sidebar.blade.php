<div class="bg-white pt-3 h-screen my-5 w-screen md:w-1/6 duration-500" id="sidebarContent">
    <div class="px-8 ms-1 flex flex-col gap-12 lg:gap-14 text-regularContent font-semibold text-greyIcon">
        <a href="{{ route('home') }}">
            <div class="flex items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('home') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <span class="material-symbols-outlined relative left-10">grid_view</span> 
                <p class="flex duration-500 relative left-10 hidden">Dashboard</p>
            </div>
        </a>
        <a href="{{ route('pembayaran') }}">
            <div class="flex items-center gap-3 ps-1 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('pembayaran') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <i class="fa-regular fa-credit-card relative left-10"></i>
                <p class="flex duration-500 relative left-10 hidden">Pembayaran</p>
            </div>
        </a>
        <a href="{{ route('rapor') }}">
            <div class="flex items-center gap-3 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('rapor') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <span class="material-symbols-outlined relative left-10">lab_profile</span>
                <p class="flex duration-500 relative left-10 hidden">Rapor</p>
            </div>
        </a>
        <a href="{{ route('sertifikat') }}">
            <div class="flex items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('sertifikat') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <span class="material-symbols-outlined relative left-10">verified</span>
                <p class="flex duration-500 relative left-10 hidden">Sertifikat</p>
            </div>
        </a>
    </div>
</div>
