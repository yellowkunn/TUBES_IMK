<div class="bg-white pt-3 h-screen my-5 w-screen md:w-1/6 duration-500" id="sidebarContent">
    <div class="px-8 ms-1 flex flex-col gap-12 lg:gap-14 text-regularContent font-semibold text-greyIcon">
        <a href="{{ route('home') }}">
            <div class="flex items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('home') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <span class="material-symbols-outlined relative left-10">grid_view</span> 
                <p class="flex duration-500 relative left-10 hidden">Dashboard</p>
            </div>
        </a>
        <a href="">
            <div class="flex items-center gap-3 absolute left-0 w-5/6 lg:w-full py-3">
                <span class="material-symbols-outlined relative left-10">account_balance_wallet</span>
                <p class="flex duration-500 relative left-10 hidden">Pembayaran</p>
            </div>
        </a>
        <a href="{{ route('pengaturanruangan') }}" class="mt-[-10px]">
            <div class="flex h-20 items-center gap-3 absolute left-0 w-5/6 lg:w-full py-3">
                <span class="material-symbols-outlined relative left-10">door_open</span>
                <p class="flex duration-500 w-1/2 relative left-10 hidden">Pengaturan Ruangan</p>
            </div>
        </a>
        <a href="" class="mt-3">
            <div class="flex items-center gap-3 absolute left-0 w-5/6 lg:w-full py-3">
                <span class="material-symbols-outlined relative left-10">lab_profile</span>
                <p class="flex duration-500 relative left-10 hidden">Rapor</p>
            </div>
        </a>
        <a href="" class="mt-[-10px]">
            <div class="flex h-20 items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3">
                <span class="material-symbols-outlined relative left-10">calendar_month</span>
                <p class="flex duration-500 w-1/2 relative left-10 hidden">Kalender Pendidikan</p>
            </div>
        </a>

        <!-- lainnya -->
        <div class="mt-8">
            <button id="lainnyaBtn" class="w-full">
                <div class="flex justify-between items-center">
                    <p class="text-greyIcon flex duration-500" style="color: #949494">Lainnya</p>
                    <i id="lainnyaIcon" class="fa-solid fa-angle-down fa-sm rounded-full p-2 py-3.5 bg-greyBackground ms-1"></i>
                </div>
            </button>
            
            <div id="menu-0" class="hidden absolute text-greyIcon w-full flex flex-col gap-14">
                <a href="{{ route('editdaftarkelas') }}" class="mt-3">
                    <div class="flex items-center gap-2 absolute left-0 w-fit p-2 {{ request()->routeIs('editdaftarkelas') ? 'bg-baseDarkerGreen text-white font-normal rounded-lg' : '' }}">
                        <span class="material-symbols-outlined relative">chair_alt</span>
                        <p class="flex duration-500 relative">Daftar Kelas</p>
                    </div>
                </a>
                <a href="{{ route('editdaftarsiswa') }}">
                    <div class="flex items-center gap-2 absolute left-0 w-fit p-2 {{ request()->routeIs('editdaftarsiswa') ? 'bg-baseDarkerGreen text-white font-normal rounded-lg' : '' }}">                
                        <span class="material-symbols-outlined relative">interactive_space</span>
                        <p class="flex duration-500 relative">Daftar Siswa</p>
                    </div>
                </a>
                <a href="{{ route('editdaftarpengajar') }}">
                    <div class="flex items-center gap-2 absolute left-0 w-fit p-2 {{ request()->routeIs('editdaftarpengajar') ? 'bg-baseDarkerGreen text-white font-normal rounded-lg' : '' }}">
                        <i class="fa-solid fa-chalkboard-user relative"></i>
                        <p class="flex duration-500 relative">Daftar Pengajar</p>
                    </div>
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
        const lainnyaIcon = document.getElementById('lainnyaIcon');
        let isDropdownOpen = true;

        function toggleDropdown() {
            isDropdownOpen = !isDropdownOpen;
            if (isDropdownOpen) {
                dropdownMenu.classList.remove('hidden');
                lainnyaIcon.classList.replace('fa-angle-down', 'fa-angle-up');
            } else {
                dropdownMenu.classList.add('hidden');
                lainnyaIcon.classList.replace('fa-angle-up', 'fa-angle-down');
            }
        }

        toggleDropdown();

        dropdownButton.addEventListener('click', toggleDropdown);

        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                lainnyaIcon.classList.replace('fa-angle-up', 'fa-angle-down');
                isDropdownOpen = false;
            }
        });
    }

    for (let i = 0; i < 1; i++) {
        initializeDropdown('lainnyaBtn', 'menu-' + i);
    }


    document.addEventListener('DOMContentLoaded', (event) => {
    if(window.innerWidth > 768){
        sidebar();
    }
    });

// sidebar
const sidebar = () => {
  const icon = document.getElementById('toggle');
  const buttonToggle = document.getElementById('buttonToggle');
  const sidebar = document.getElementById('sidebar');
  const sidebarContent = document.getElementById('sidebarContent');
  const pElements = sidebarContent.querySelectorAll('p');

  if(window.innerWidth < 768){
      if (sidebar.classList.contains('translate-x-[-100%]')) {
      sidebar.classList.remove('translate-x-[-100%]');
      sidebar.classList.add('translate-x-0');
      sidebarContent.classList.add('w-full');
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-xmark');
      pElements.forEach(p => {
          p.classList.remove('hidden');
          p.classList.add('flex');
      });
      document.body.classList.add('overflow-hidden'); 
      } else {
          sidebar.classList.remove('translate-x-0');
          sidebar.classList.add('translate-x-[-100%]');
          sidebarContent.classList.remove('w-full');
          icon.classList.remove('fa-xmark');
          icon.classList.add('fa-bars');
          pElements.forEach(p => {
              p.classList.add('hidden');
              p.classList.remove('flex');
          });
          document.body.classList.remove('overflow-hidden'); 
      }
  } else {
      if (sidebar.classList.contains('translate-x-0')) {
      sidebar.classList.remove('w-20');
      sidebar.classList.add('w-1/6');
      sidebar.classList.remove('translate-x-0');
      sidebar.classList.add('translate-x-2');
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-xmark');
      pElements.forEach(p => {
          p.classList.remove('hidden');
          p.classList.add('flex');
      }); 
      } else {
          sidebar.classList.add('w-20');
          sidebar.classList.remove('w-1/6');
          sidebar.classList.remove('translate-x-2');
          sidebar.classList.add('translate-x-0');
          icon.classList.remove('fa-xmark');
          icon.classList.add('fa-bars');
          pElements.forEach(p => {
              p.classList.add('hidden');
              p.classList.remove('flex');
          });
      }
  }
}
</script>