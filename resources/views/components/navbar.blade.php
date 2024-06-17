<div class="mt-2 bg-white hidden md:block text-smallContent dark:dark-mode">
    <div class="flex justify-between items-center px-8 lg:px-12 py-5">

        <div class="flex gap-8 lg:gap-24">
            <a href="{{ route('berandasiswa') }}"><p class="dark:text-white dark:font-normal text-baseBlue text-center font-bold lg:text-[18px] leading-snug">Fortunate<br>Education Center</p></a>
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

        <div class="flex items-center gap-4">
            <div class="group" id="setTheme">
                <button onclick="changeToDark()" id="darkModeBtn" class="bg-yellow-400/30 group-hover:bg-black p-1.5 px-2"><i class="group-hover:text-white text-yellow-400 fa-regular fa-moon fa-xl text-greyIcon"></i></button>
                <button onclick="changeToLight()" id="lightModeBtn" class="hidden group-hover:bg-slate-500/30 p-1.5 px-2"><i class="fa-solid fa-sun fa-lg"></i></button>
            </div>

            @if (Route::has('login'))
            @auth
            @if(isset($notif))
            <div class="relative group">
                <div class="bg-red-600 absolute top-0 right-0 rounded-full text-white text-[11px] px-1">{{ $notif->count() }}</div>
                <a href="{{ route('notifikasi') }}"><i class="fa-regular fa-bell fa-xl bg-slate-100 py-4 px-2 rounded dark:dark-mode dark:hover:bg-[#313A49]"></i></a>

                <div class="absolute hidden group-hover:block bg-white shadow -translate-x-1/2 rounded-lg z-10 w-80 dark:bg-[#313A49] divide-y divide-slate-400">
                    <!-- perulangan notif baru, batasi maks 4 sj untuk ditampilkan disini -->
                    @foreach ($notif as $n)
                    <a href="">
                        <div class="py-2 px-4">
                            {{-- <p class="truncate">{{ $n->title }}</p> --}}
                            <p class="truncate">{{ $n->keterangan }}</p>
                            <p class="text-greyIcon dark:text-white/80 text-[12px]">
                                {{ \Carbon\Carbon::parse($n->dibuat)->locale('id')->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- dd more (edit & hapus) -->
            <div class="pe-4 my-auto">
                <button id="dd-more" class="flex items-center">
                    <div class="flex gap-2 items-center pe-1 w-fit">
                        @if(isset(Auth::user()->foto_profile))
                        <img src="{{ asset('berkas_ujis/' . Auth::user()->foto_profile) }}" class="w-9 h-9 object-cover rounded-full" alt="">
                        @else
                        <span class="material-symbols-outlined text-greyIcon">account_circle</span>
                        @endif

                        <p class="text-smallContent hidden md:block">{{ Auth::user()->username }}</p>
                    </div>
                    <i class="fa-solid fa-angle-down fa-xs"></i>
                </button>

                <div id="dd-menu" class="invisible grid grid-cols-1 divide-y bg-white dark:dark-mode mt-2 rounded-md drop-shadow-regularShadow absolute md:top-14 lg:top-16 md:right-10 lg:right-14">
                    <!-- <a href=" {{ url('/editprofile') }} " class="w-full h-full flex items-center gap-2 py-1 px-3">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <p>Edit Profile</p>
                    </a> -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full h-full flex items-center gap-2 py-2 px-4 text-black dark:bg-white dark:tect-black dark:rounded">
                            <i class="fa-solid fa-arrow-right-from-bracket fa-sm"></i>
                            <p>{{ __('logout') }}</p>
                        </button>
                    </form>
                </div>
            </div>
            <!-- akhir dari dd more (edit & hapus) -->
            @else
            <a href="{{ route('login') }}" class="flex gap-2 items-center nav">
                <i class="fa-solid fa-user text-greyIcon dark:text-white"></i>
                <p>Masuk/Daftar</p>
            </a>
            @endauth
            @endif
        </div>

    </div>
</div>
</div>

<!-- mobile -->
<div class="relative block md:hidden bg-white dark:dark-mode">
    <div class="flex justify-between items-center px-2 sm:px-6 md:px-8 py-5">
        <a href="{{ route('berandasiswa') }}"><p class="text-baseBlue text-center font-bold leading-snug ms-1.5 dark:text-white dark:font-normal">Fortunate<br>Education Center</p></a>

        <div class="flex gap-2">
            <div class="group" id="setTheme">
                <button onclick="changeToDark()" id="darkModeBtn" class="bg-yellow-400/30 group-hover:bg-black p-1.5 px-2"><i class="group-hover:text-white text-yellow-400 fa-regular fa-moon fa-xl text-greyIcon"></i></button>
                <button onclick="changeToLight()" id="lightModeBtn" class="hidden group-hover:bg-slate-500/30 p-1.5 px-2"><i class="fa-solid fa-sun fa-lg"></i></button>
            </div>

            <div class="flex items-center gap-2">
                @if(!Route::has('login'))
                <a href="{{ route('login') }}" id="masuk"><i class="fa-solid fa-user text-greyIcon"></i></a>
                @endif

                <button id="hamburger" type="button" class="p-2 px-3 rounded-xl hover:bg-neutral-100">
                    <i class="fa-solid fa-bars fa-lg text-greyIcon dark:text-white"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="hidden md:hidden z-20 fixed top-0 backdrop-brightness-50 w-full h-screen" id="menuHamburger">
        <div class="bg-white dark:dark-mode w-screen flex flex-col gap-5 p-10">
            <!-- close button -->
            <div class="flex justify-end">
                <button type="button"><i class="fa-solid fa-xmark fa-lg text-slate-600 dark:text-white" id="btnClose"></i></button>
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
    }),
    tippy('#darkModeBtn', {
        content: 'Dark',
    }),
    tippy('#lightModeBtn', {
        content: 'Light',
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
                dropdownMenu.classList.add('translate-y-2', 'duration-300');
                dropdownMenu.classList.remove('invisible');
            } else {
                dropdownMenu.classList.remove('translate-y-2', 'duration-300');
                dropdownMenu.classList.add('invisible');
            }
        }

        toggleDropdown();

        dropdownButton.addEventListener('click', toggleDropdown);

        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('translate-y-2', 'duration-300');
                dropdownMenu.classList.add('invisible');
                isDropdownOpen = false;
            }
        });
    }

    initializeDropdown('dd-more', 'dd-menu');
</script>