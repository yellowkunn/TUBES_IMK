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
        <span class="material-symbols-outlined mt-1">account_balance_wallet</span>
    </div>

    <div class="border-2 drop-shadow-regularShadow p-7 my-5 rounded-lg border overflow-x-auto">
        <p class="font-semibold text-gryIcon dark:font-normal dark:text-white">Metode Pembayaran</p>

        <div class="flex gap-2 items-center my-4">
            <input type="radio" name="metodepembayaran" id="bni" value="bni">
            <label for="bni" class="flex">
                <img src="{{ asset('images/bni.png')}}" alt="" class="w-12 h-8 p-1 bg-white rounded">
                <p class="dark:text-white">BNI</p>
            </label>
        </div>
        <div class="flex gap-2 items-center my-4">
            <input type="radio" name="metodepembayaran" id="cash" value="cash">
            <label for="cash">
            <i class="fa-solid fa-hand-holding-dollar"></i>
                <p class="dark:text-white">Cash</p>
            </label>
        </div>

    </div>
    </div>

    @if(isset($notif) && $notif->count() > 0)
    @foreach($notif as $n)
    <!-- pop up keterangan -->
    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
        w-full h-screen" id="popupKeterangan{{ $n->id_notification }}">
            <div class="flex flex-col justify-center min-w-[450px]">
                <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                    <p class="text-title">keterangan</p>
                    <button onclick="showPopupKeterangan({{ $n->id_notification }})">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                    <form method="post" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <p class="font-semibold mb-1">Keterangan</p>
                            <div>
                                <p>{{ $n->keterangan }}</p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-center gap-6">
                            <button type="button" onclick="showPopupKeterangan({{ $n->id_notification }})" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                hover:bg-baseBlue hover:text-white" style="box-shadow: 
                                0px 0px 5px 1px rgba(122,161,226,0.3);">Tutup</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
        @endif

@include('components.footer')

<script>
    function showPopupKeterangan(i) {
        document.getElementById('popupKeterangan'+i).classList.toggle('hidden');
    }
</script>
</body>

</html>