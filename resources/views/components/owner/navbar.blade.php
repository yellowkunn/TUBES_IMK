<div class="w-full border-b bg-white">
<div class="flex justify-between px-4 h-20">
    <div class="flex gap-6 items-center">
        <button onclick="sidebar()" id="buttonToggle">
            <i class="fa-solid fa-bars md:fa-xmark fa-lg p-3.5 py-5 rounded ms-3" style="background-color: #EAEAEA; color: #363636" id="toggle"></i>
        </button>
    </div>

    <!-- dd more (edit & hapus) -->
    <div class="pe-4 my-auto">
    <button id="dd-more" class="flex gap-3 items-center">
        <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
        <p class="text-smallContent hidden md:block">Marissa</p>
        <i class="fa-solid fa-angle-down fa-xs"></i>
    </button>

        <div id="dd-menu" class="hidden grid grid-cols-1 divide-y bg-white mt-2 rounded-md drop-shadow-regularShadow absolute top-12 right-5" style="color: #949494;">
            <a href="" class="w-full h-full flex items-center gap-2 py-1 px-3">
                <i class="fa-regular fa-pen-to-square"></i>
                <p>Edit Profile</p>
            </a>
            <!-- <a href="" class="w-full h-full flex items-center gap-2 py-1 px-3">
                <i class="fa-solid fa-arrow-right-from-bracket fa-sm"></i>
                <p>Logout</p>
            </a> -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full h-full flex items-center gap-2 py-1 px-3">
                <i class="fa-solid fa-arrow-right-from-bracket fa-sm"></i>
                <p>{{ __('logout') }}</p>
                </button>
            </form>
        </div>
    </div>
    <!-- akhir dari dd more (edit & hapus) -->

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

        initializeDropdown('dd-more', 'dd-menu');
</script>