<div class="mt-2 bg-white hidden md:block text-smallContent">
    <div class="flex justify-between items-center px-8 lg:px-12 py-5">

        <div class="flex gap-8 lg:gap-24">
            <p class="text-baseBlue text-center font-bold lg:text-[18px] leading-snug">Fortunate<br>Education Center</p>
            <div id="menus" class="flex gap-5 lg:gap-12 items-center">
                @if (Route::has('login'))
                @auth
                @php
                $siswa = App\Models\Siswa::where('pengguna_id', Auth::user()->id_pengguna)->first();
                @endphp
                    @if (Auth::user()->role === 'siswa')
                        @if ($siswa->status === 'Aktif' || $siswa->status === 'TidakAktif')
                        <a href="{{ route('home') }}" class="nav">Dashboard</a>
                        @else
                    <a href="{{ route('home') }}" class="nav">Beranda</a>
                    @endif
                @else
                <a href="{{ route('home') }}" class="nav">Beranda</a>
                @endif
                @else
                <a href="{{ route('home') }}" class="nav">Beranda</a>
                @endauth
                @endif
                <a href="" class="nav">Kelas</a>
                <a href="" class="nav">Langkah Pendaftaran</a>
            </div>
        </div>

        @if (Route::has('login'))
        @auth
        <!-- dd more (edit & hapus) -->
        <div class="pe-4 my-auto">
            <button id="dd-more" class="flex gap-2 items-center">
                <div class="flex gap-1 items-center pe-1 w-fit">
                    @if(isset(Auth::user()->foto_profile))
                    <img src="{{ Auth::user()->foto_profile }}" class="w-10 h-10 object-cover rounded-full" alt="">
                    @else
                    <span class="material-symbols-outlined text-greyIcon">account_circle</span>
                    @endif

                    <p class="text-smallContent hidden md:block">{{ Auth::user()->username }}</p>
                </div>
                <i class="fa-solid fa-angle-down fa-xs"></i>
            </button>

            <div id="dd-menu" class="hidden grid grid-cols-1 divide-y bg-white mt-2 rounded-md drop-shadow-regularShadow absolute md:top-12 lg:top-14 md:right-10 lg:right-14" style="color: #949494;">
                <a href=" {{ url('/editprofile') }} " class="w-full h-full flex items-center gap-2 py-1 px-3">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <p>Edit Profile</p>
                </a>
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
        @else
        <a href="{{ route('login') }}" class="flex gap-2 items-center nav">
            <i class="fa-solid fa-user text-greyIcon"></i>
            <p>Masuk/Daftar</p>
        </a>
        @endauth
        @endif

    </div>
</div>
</div>

<div class="relative block md:hidden bg-white">
    <div class="flex justify-between items-center px-2 sm:px-6 md:px-8 py-5">
        <p class="text-baseBlue text-center font-bold leading-snug ms-1.5">Fortunate<br>Education Center</p>

        <div class="flex items-center gap-2">
            @if(!Route::has('login'))
            <a href="{{ route('login') }}" id="masuk"><i class="fa-solid fa-user text-greyIcon"></i></a>
            @endif

            <button id="hamburger" type="button" class="p-2 px-3 rounded-xl hover:bg-neutral-100">
                <i class="fa-solid fa-bars fa-lg text-greyIcon"></i>
            </button>
        </div>
    </div>

    <div class="hidden md:hidden z-20 fixed top-0 backdrop-brightness-50 w-full h-screen" id="menuHamburger">
        <div class="bg-white w-screen flex flex-col gap-5 p-10">
            <!-- close button -->
            <div class="flex justify-end">
                <button type="button"><i class="fa-solid fa-xmark fa-lg text-slate-600" id="btnClose"></i></button>
            </div>

            <div id="menus" class="flex flex-col gap-6">
            @if(Route::has('login'))
                @php
                    $routeName = auth()->check() ? 'Dashboard' : 'Beranda';
                @endphp
                <a href="{{ route('home') }}" class="nav w-fit">{{ $routeName }}</a>
            @endif

                <a href="" class="nav w-fit">Kelas</a>
                <a href="" class="nav w-fit">Langkah Pendaftaran</a>

                @if(Route::has('login'))
                @auth
                <a href="/profile" class="nav w-fit">Profile</i></a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav w-fit">Keluar</i></button>
                </form>
                @else
                <a href="{{ route('login') }}" class="nav w-fit">Masuk/Daftar</i></a>
                @endauth
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script>
    tippy('#masuk', {
        content: 'Masuk/Daftar',
    });


    const hamburger = document.getElementById('hamburger');
    const menuHamburger = document.getElementById('menuHamburger');
    const btnClose = document.getElementById('btnClose');

    hamburger.addEventListener('click', () => {
        menuHamburger.classList.remove('hidden');
        hamburger.classList.add('hidden');
    });

    btnClose.addEventListener('click', () => {
        menuHamburger.classList.add('hidden');
        hamburger.classList.remove('hidden');
    })


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