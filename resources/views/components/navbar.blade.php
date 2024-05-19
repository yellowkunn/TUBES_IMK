<div class="mt-2 bg-white">
    <div class="flex justify-between items-center px-12 py-5">

        <div class="flex gap-8 lg:gap-24">
            <p class="text-baseBlue text-center font-bold text-[18px] leading-snug">Fortunate<br>Education Center</p>
            <div id="menus" class="flex gap-12 items-center">
                <a href="" class="nav">Beranda</a>
                <a href="" class="nav">Kelas</a>
                <a href="" class="nav">Langkah Pendaftaran</a>
            </div>
        </div>

        <div class="flex gap-2 items-center nav">
            <!-- <i class="fa-solid fa-user text-greyIcon"></i> -->
            @if (Route::has('login'))
            @auth
            <a href="profile" class="flex gap-3 items-center pe-16">
                <img src="https://t4.ftcdn.net/jpg/03/83/25/83/360_F_383258331_D8imaEMl8Q3lf7EKU2Pi78Cn0R7KkW9o.jpg" class="w-10 h-10 object-cover rounded-full" alt="">
                <p class="text-smallContent">Marissa</p>
            </a>
            @else
            <a href="{{ route('login') }}">Masuk/Daftar</a>
            @endauth
            @endif
        </div>
    </div>
</div>