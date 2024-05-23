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



//card pertemuan (siswa)
document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(dropdown => {
      const index = dropdown.getAttribute('data-index');
      tab_pertemuan('iconDD-' + index, 'contentPertemuan-' + index, 'tabPertemuan-' + index);
  });
});

function tab_pertemuan(idDD, contentPertemuan, tabPertemuan) {
  const dropdownButton = document.getElementById(idDD);
  const dropdownContent = document.getElementById(contentPertemuan);
  let isDropdownOpen = false;

  function toggleDropdown() {
      isDropdownOpen = !isDropdownOpen;
      if (isDropdownOpen) {
          dropdownContent.classList.remove('hidden');
          dropdownButton.classList.add('rotate-90');
      } else {
          dropdownContent.classList.add('hidden');
          dropdownButton.classList.remove('rotate-90');
      }
  }

  dropdownButton.addEventListener('click', (event) => {
      event.stopPropagation();
      toggleDropdown();
  });

  window.addEventListener('click', (event) => {
      if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
          dropdownContent.classList.add('hidden');
          dropdownButton.classList.remove('rotate-90');
          isDropdownOpen = false;
      }
  });
}

function selectOption(event, index, option) {
  event.preventDefault(); 
  document.getElementById('selectedOption-' + index).textContent = option;
  document.getElementById('tabPertemuan-' + index).value = option;
  document.getElementById('contentPertemuan-' + index).classList.add('hidden');
  document.getElementById('iconDD-' + index).classList.remove('rotate-90');
  isDropdownOpen = false;
}