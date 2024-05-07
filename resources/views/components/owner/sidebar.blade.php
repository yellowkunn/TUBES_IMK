<div class="bg-white pt-3 max-h-[1024px] mt-5">
    <div class="px-12 flex flex-col gap-6 lg:gap-10 text-regularContent font-semibold text-greyIcon" id="sidebarMenu">
        <a href="" class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.7"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
            <p>Beranda</p>
        </a>
        <a href="" class="flex items-center gap-3 ps-1">
            <i class="fa-regular fa-credit-card"></i>
            <p>Pembayaran</p>
        </a>
        <a href="" class="flex items-center gap-3">
        <span class="material-symbols-outlined">door_open</span>
            <p>Pengaturan Ruangan</p>
        </a>
        <a href="" class="flex items-center gap-3 ps-1">
            <i class="fa-solid fa-chart-column"></i>
            <p>Rapor</p>
        </a>
        <a href="" class="flex items-center gap-2">
        <span class="material-symbols-outlined">military_tech</span>
            <p>Sertifikat</p>
        </a>
        <a href="" class="flex items-center gap-2">
        <span class="material-symbols-outlined">calendar_month</span>
            <p>Kalender Pendidikan</p>
        </a>

        <!-- lainnya -->
        <div>
            <button id="lainnya-0" class="w-full">
                <div class="flex justify-between items-center">
                    <p class="text-greyIcon" style="color: #949494">Lainnya</p>
                    <i class="fa-solid fa-angle-down rounded-full p-2 bg-greyBackground"></i>
                </div>
            </button>
            
            <div id="menu-0" class="hidden py-5 absolute text-greyIcon w-fit">
                <a href="" class="flex items-center gap-2">
                <span class="material-symbols-outlined">chair_alt</span>
                    <p>Daftar Kelas</p>
                </a>
                <a href="" class="flex items-center gap-2 my-8">
                <span class="material-symbols-outlined">interactive_space</span>
                    <p>Daftar Siswa</p>
                </a>
                <a href="" class="flex items-center gap-2">
                <i class="fa-solid fa-chalkboard-user"></i>
                    <p>Daftar Pengajar</p>
                </a>
            </div>
        </div>
        <!-- akhir dari lainnya -->

        <div class="mt-48 mb-24 bottom-0">
            <hr>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();" class="flex items-center gap-4 mt-7 ps-1">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    {{ __('Keluar') }}
                </a>
            </form>
        </div>
    </div>
</div>

<script>
    const sidebar = () => {
        const icon = document.getElementById('toggle');
        const buttonToggle = document.getElementById('buttonToggle');
        const sidebar = document.getElementById('sidebar');
        const pLogo = document.getElementById('sidebarLogo');
        const sidebarMenu = document.getElementById('sidebarMenu');
        const pElements = sidebarMenu.querySelectorAll('p');

        if (sidebar.classList.contains('w-1/6')) {
            sidebar.classList.remove('w-1/6');
            sidebarMenu.classList.remove('px-12');
            sidebarMenu.classList.add('px-6');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
            pLogo.classList.remove('flex');
            pLogo.classList.add('hidden');
            pElements.forEach(p => {
                p.classList.remove('flex');
                p.classList.add('hidden');
            });
        } else {
            sidebar.classList.add('w-1/6');
            sidebarMenu.classList.remove('px-6');
            sidebarMenu.classList.add('px-12');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
            pLogo.classList.remove('hidden');
            pLogo.classList.add('flex');
            pElements.forEach(p => {
                p.classList.add('flex');
                p.classList.remove('hidden');
            });
        }
    }


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
        initializeDropdown('lainnya-' + i, 'menu-' + i);
    }
</script>
