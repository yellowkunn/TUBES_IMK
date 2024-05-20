<div class="bg-white pt-3 h-screen my-5 w-screen md:w-1/6 duration-500" id="sidebarContent">
    <div class="px-8 ms-1 flex flex-col gap-6 lg:gap-10 text-regularContent font-semibold text-greyIcon">
        <a href="" class="flex items-center gap-2">
            <span class="material-symbols-outlined">grid_view</span> 
            <p class="flex duration-500">Beranda</p>
        </a>
        <a href="" class="flex items-center gap-3 ps-1">
            <i class="fa-regular fa-credit-card"></i>
            <p class="flex duration-500">Pembayaran</p>
        </a>
        <a href="" class="flex items-center gap-3">
        <span class="material-symbols-outlined">door_open</span>
            <p class="flex duration-500">Pengaturan Ruangan</p>
        </a>
        <a href="" class="flex items-center gap-3 ps-1">
            <i class="fa-solid fa-chart-column"></i>
            <p class="flex duration-500">Rapor</p>
        </a>
        <a href="" class="flex items-center gap-2">
            <span class="material-symbols-outlined fa-sm">verified</span>
            <p class="flex duration-500">Sertifikat</p>
        </a>
        <a href="" class="flex items-center gap-2">
        <span class="material-symbols-outlined">calendar_month</span>
            <p class="flex duration-500">Kalender Pendidikan</p>
        </a>

        <!-- lainnya -->
        <div>
            <button id="lainnyaBtn" class="w-full">
                <div class="flex justify-between items-center">
                    <p class="text-greyIcon flex duration-500" style="color: #949494">Lainnya</p>
                    <i class="fa-solid fa-angle-down rounded-full p-2 bg-greyBackground"></i>
                </div>
            </button>
            
            <div id="menu-0" class="hidden py-5 absolute text-greyIcon w-fit">
                <a href="" class="flex items-center gap-2">
                <span class="material-symbols-outlined">chair_alt</span>
                    <p class="flex duration-500">Daftar Kelas</p>
                </a>
                <a href="" class="flex items-center gap-2 my-8">
                <span class="material-symbols-outlined">interactive_space</span>
                    <p class="flex duration-500">Daftar Siswa</p>
                </a>
                <a href="" class="flex items-center gap-2">
                <i class="fa-solid fa-chalkboard-user"></i>
                    <p class="flex duration-500">Daftar Pengajar</p>
                </a>
            </div>
        </div>
        <!-- akhir dari lainnya -->
    </div>
</div>

<script>
    function initializeDropdown(buttonId, menuId) {
        const dropdownButton = document.getElementById(buttonId);
        const dropdownMenu = document.getElementById(menuId);
        let isDropdownOpen = true;

        function toggleDropdown() {
            isDropdownOpen = !isDropdownOpen;
            if (isDropdownOpen) {
                dropdownMenu.classList.remove('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        }

        toggleDropdown();

        dropdownButton.addEventListener('click', toggleDropdown);

        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                isDropdownOpen = false;
            }
        });
    }

    for (let i = 0; i < 1; i++) {
        initializeDropdown('lainnyaBtn', 'menu-' + i);
    }
</script>