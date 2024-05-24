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

// price card detail tawaran kelas
  function handleScroll() {
    const daftarSkrg = document.getElementById('daftarSkrg');
    const priceCard = document.getElementById('priceCard');
    const scroll = window.scrollY;

    if (window.innerWidth > 768) {
      if (scroll > 280) {
        daftarSkrg.classList.remove('hidden');
      } else {
        daftarSkrg.classList.add('hidden');
        
      }
    } else {
      if (scroll > 500) {
        daftarSkrg.classList.remove('hidden');
      } else {
        daftarSkrg.classList.add('hidden');
        
      }
    }
  }

handleScroll();
window.addEventListener('scroll', handleScroll);
window.addEventListener('resize', handleScroll);