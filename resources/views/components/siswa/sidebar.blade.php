<div class="bg-white dark:dark-mode pt-3 h-screen my-5 w-screen md:w-1/6 duration-500" id="sidebarContent">
    <div class="px-8 ms-1 flex flex-col gap-12 lg:gap-14 text-regularContent font-semibold dark:font-normal text-greyIcon dark:text-white">
        <a href="{{ route('home') }}">
            <div class="flex items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('home') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg dark:bg-baseDarkerGreen/80' : '' }}">
                <span class="material-symbols-outlined relative left-10">grid_view</span> 
                <p class="flex duration-500 relative left-10 hidden">Dashboard</p>
            </div>
        </a>
        <a href="{{ route('pembayaran') }}">
            <div class="flex mt-3 h-4 items-center gap-3 ps-1 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('pembayaran') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
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
        <a href="{{ url('/sertifikatt') }}">
            <div class="flex items-center gap-2 absolute left-0 w-5/6 lg:w-full py-3 {{ request()->routeIs('sertifikat-siswa') ? 'bg-baseDarkerGreen text-white font-normal rounded-r-lg' : '' }}">
                <span class="material-symbols-outlined relative left-10">verified</span>
                <p class="flex duration-500 relative left-10 hidden">Sertifikat</p>
            </div>
        </a>
    </div>
</div>


<script>
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
      sidebar.classList.remove('w-24');
      sidebar.classList.add('lg:w-1/6', 'w-1/3');
      sidebar.classList.remove('translate-x-0');
      sidebar.classList.add('translate-x-2');
      icon.classList.remove('fa-bars');
      icon.classList.add('fa-xmark');
      pElements.forEach(p => {
          p.classList.remove('hidden');
          p.classList.add('flex');
      }); 
      } else {
          sidebar.classList.add('w-24');
          sidebar.classList.remove('lg:w-1/6', 'w-1/3');
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