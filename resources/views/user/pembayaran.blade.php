@include('htmlhead')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>

    <!-- google font for icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="font-Inter dark:dark-mode">
    @include('components.navbar')

    <div id="content" class="px-12 md:px-24 py-10 dark:border-t-2 dark:border-white">

        <div class="flex gap-4 items-center">
            <p class="text-title font-semibold">Pembayaran</p>
            <span class="material-symbols-outlined mt-1 text-success">account_balance_wallet</span>
        </div>

        <div class="flex gap-6 justify-center">
            <div class="h-fit border-4 border-baseDarkerGreen/20 shadow p-7 my-5 rounded-lg border overflow-x-auto dark:bg-[#374151]/40 dark:border-none dark:rounded-none">
                <p class="font-semibold dark:font-normal dark:text-white">Metode Pembayaran</p>

                <div class="flex gap-2 items-center mt-4">
                    <input type="radio" class="bg-transparent" name="metodepembayaran" id="bni" value="bni">
                    <label for="bni" class="flex gap-2">
                        <img src="{{ asset('images/bni.png')}}" alt="" class="w-7 h-6 p-0.5 bg-white rounded">
                        <p class="dark:text-white">BNI</p>
                    </label>
                </div>
                    
                <div class="flex gap-2 items-center my-4">
                    <input type="radio" class="bg-transparent" name="metodepembayaran" id="cash" value="cash">
                    <label for="cash" class="flex gap-2">
                    <i class="fa-solid fa-hand-holding-dollar text-amber-600"></i>
                        <p class="dark:text-white">Cash</p>
                    </label>
                </div>

                <div>
                    <p class="font-semibold dark:font-normal dark:text-white mt-8">Nomor Rekening</p>
                    <p class="dark:text-white text-[18px]">1234567890 <span class="text-regularContent">a.n Freddy Tambunan</span></p>
                </div>

            </div>

            <div class="bg-greyBorder/10 dark:bg-[#374151]/40 p-7 my-5 dark:text-white flex flex-col justify-between">
                <div class="flex flex-col gap-4">
                    <p class="font-semibold dark:font-normal dark:text-white text-subtitle">Rincian</p>
                    
                        <div class="flex justify-between gap-36">
                            <p>Kelas: </p>
                            <p class="font-semibold">Bahasa Inggris SMP</p>
                        </div>
                        <div class="flex justify-between gap-36">
                            <p>Hari: </p>
                            <p>Senin, Rabu, Jumat</p>
                        </div>
                        <div class="flex justify-between gap-36">
                            <p>Pukul: </p>
                            <p>13.30-15.00</p>
                        </div>
                        <div class="flex justify-between gap-36 border-t-2 border-b-2 py-4 text-amber-500 font-semibold">
                            <p>Harga: </p>
                            <p class="font-semibold">Rp310.000</p>
                        </div>
                </div>

                <p class="text-smallContent text-greyIcon dark:text-white mt-8 text-end">12 Desember 2012 12:20</p>
            </div>
        </div>

        <div class="flex gap-4 justify-center items-center mt-12 mb-4">
            <a href="{{ route('home') }}" class="p-2 px-4 text-white rounded bg-success/80 hover:bg-success">Selesai</a>
        </div>
    </div>

   @include('components.footer')
</body>

</html>