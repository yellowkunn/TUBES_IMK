<div class="mt-2 bg-white hidden md:block text-smallContent">
<div class="flex justify-between items-center px-8 lg:px-12 py-5">

    <div class="flex gap-8 lg:gap-24">
    <p class="text-baseBlue text-center font-bold lg:text-[18px] leading-snug">Fortunate<br>Education Center</p>
    <div id="menus" class="flex gap-5 lg:gap-12 items-center">
        <a href="" class="nav">Beranda</a>
        <a href="" class="nav">Kelas</a>
        <a href="" class="nav">Langkah Pendaftaran</a>
    </div>
    </div>

    <div class="flex gap-2 items-center nav">
        <i class="fa-solid fa-user text-greyIcon"></i>
        <a href="{{ route('login') }}">Masuk/Daftar</a>
    </div>
</div>
</div>

<div class="relative block md:hidden">
    <div class="flex justify-between items-center px-6 md:px-8 py-5">
        <p class="text-baseBlue text-center font-bold leading-snug">Fortunate<br>Education Center</p>

        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}" id="masuk"><i class="fa-solid fa-user text-greyIcon"></i></a>

            <button id="hamburger" type="button" class="p-2 px-3 rounded-xl hover:bg-neutral-100">
                <i class="fa-solid fa-bars fa-lg text-greyIcon"></i>
            </button>
        </div>
    </div>

    <div class="hidden md:hidden z-10 absolute top-0" id="menuHamburger">
        <div class="bg-white w-screen flex flex-col gap-5 p-10">
        <!-- close button -->
        <div class="flex justify-end">
            <i class="fa-solid fa-xmark fa-lg text-slate-600" id="btnClose"></i>
        </div>

        <div id="menus" class="flex flex-col gap-6">
            <a href="" class="nav w-fit">Beranda</a>
            <a href="" class="nav w-fit">Kelas</a>
            <a href="" class="nav w-fit">Langkah Pendaftaran</a>

            <a href="{{ route('login') }}">Masuk/Daftar</i></a>
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
</script>