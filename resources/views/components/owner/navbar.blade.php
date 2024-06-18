<div class="w-full border-b bg-white">
    <div class="flex justify-between px-4 h-20">
        <div class="flex gap-6 items-center">
            <button onclick="sidebar()" id="buttonToggle">
                <i class="fa-solid fa-bars md:fa-xmark fa-lg p-3.5 py-5 rounded ms-3"
                    style="background-color: #EAEAEA; color: #363636" id="toggle"></i>
            </button>

            <a href="{{ route('admin.verifikasi-pendaftar') }}"
                class="text-regularContent font-semibold md:mx-2 lg:mx-4 nav" style="color: #363636">Verifikasi
                Pendaftar</a>
        </div>

        <!-- dd more (edit & hapus) -->
        <div class="flex gap-4 items-center pe-4 my-auto">

            @if (isset($notif))
                <div class="relative group">
                    @if ($notif->count() > 0)
                        <div class="bg-red-600 absolute top-0 right-0 rounded-full text-white text-[11px] px-1">
                            {{ $notif->count() }}</div>
                    @endif
                    <a href="{{ route('admin.verifikasi-pendaftar') }}"><i
                            class="fa-regular fa-bell fa-xl bg-slate-100 py-4 px-2 rounded dark:dark-mode dark:hover:bg-[#313A49]"></i></a>

                    <div
                        class="absolute hidden group-hover:block bg-white shadow -translate-x-1/2 rounded-lg z-10 w-80 dark:bg-[#313A49] divide-y divide-slate-400">
                        <!-- perulangan notif baru, batasi maks 4 sj untuk ditampilkan disini -->
                        @foreach ($notif as $n)
                            <a href="{{ route('admin.verifikasi-pendaftar') }}">
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

            <button id="dd-more" class="flex items-center">
                <div class="flex gap-2 items-center pe-1 w-fit">
                    @if (isset(Auth::user()->foto_profile))
                        <img src="{{ asset('berkas_ujis/' . Auth::user()->foto_profile) }}"
                            class="w-9 h-9 object-cover rounded-full" alt="">
                    @else
                        <span class="material-symbols-outlined text-greyIcon">account_circle</span>
                    @endif

                    <p class="text-smallContent hidden md:block">{{ Auth::user()->username }}</p>
                </div>
                <i class="fa-solid fa-angle-down fa-xs"></i>
            </button>

            <div id="dd-menu"
                class="invisible grid grid-cols-1 divide-y bg-white mt-2 rounded-md drop-shadow-regularShadow absolute top-12 right-6 text-black">
                {{-- <a href=" {{ url('/editprofile') }} " class="w-full h-full flex items-center gap-2 py-2 px-4">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <p>Edit Profile</p>
                </a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full h-full flex items-center gap-2 py-2 px-4">
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
