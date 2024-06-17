@include('htmlhead')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas</title>

  <!-- font awsome -->
  <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

  <!-- google font for icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent dark:dark-mode">
@include('components.navbar')
  <div class="flex flex-col bg-white dark:dark-mode">
    <main class="flex flex-col self-center w-full px-8 sm:px-16 lg:px-20 my-4 md:my-12">
        <p class="dark:text-white font-semibold dark:font-normal text-subtitle">Selamat datang di Fortunate Education Centre!</p>
        <p class="dark:text-white mt-2">Ingin bergabung dan menjadi bagian dari keluarga besar FEC?</p>
        <p class="dark:text-white my-1">Ikuti tata cara pendaftaran kelas berikut biar kamu nggak bingung ya!</p>

        <div class="md:px-48 mt-6 flex flex-col gap-20">
            <div class="grid grid-cols-2 gap-2 flex-col mt-4">
                <div>
                <p class="rounded-full text-white p-2 px-4 bg-baseBlue dark:bg-[#313A49] w-fit h-fit">1</p>
                <div class="flex gap-8 items-center">
                    <img src="{{asset('tutor_pendaftaran/1.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                    <img src="{{asset('tutor_pendaftaran/2.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                </div>
                <p class="dark:text-white">Saat masuk pertama kali, kamu bisa lihat-lihat dulu daftar kelas yang tersedia ya!</p>
                </div>
            </div>

            <div class="grid grid-cols-2">
                <div></div>
                <div>
                <p class="rounded-full text-white p-2 px-4 bg-baseBlue dark:bg-[#313A49] w-fit h-fit">2</p>
                <div class="flex gap-2 flex-col mt-4 justify-end">
                    <div class="sm:flex gap-8 items-center">
                        <img src="{{asset('tutor_pendaftaran/3.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/4.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/5.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                    </div>
                    <p class="dark:text-white">Kamu bisa mendaftar kelas setelah melakukan login atau register akun.</p>
                </div>
                </div>
            </div>

            <div class="grid grid-cols-2">
            <div>
                <p class="rounded-full text-white p-2 px-4 bg-baseBlue dark:bg-[#313A49] w-fit h-fit">3</p>
                <div class="flex gap-2 flex-col mt-4">
                    <div class="sm:flex gap-8 items-center">
                        <img src="{{asset('tutor_pendaftaran/6.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/7.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                    </div>
                    <p class="dark:text-white">Setelah login, daftar kelas dengan cara klik tombol daftar sekarang. Kemudian <b>lengkapi data</b> Anda serta lakukan <b>pembayaran</b>.
                        Untuk pembayaran tersedia 2 metode yaitu <b>cash</b> dan <b>bank BNI</b>.
                    </p>
                </div>
            </div>
            </div>

            <div class="grid grid-cols-2">
            <div></div>
            <div>
                <p class="rounded-full text-white p-2 px-4 bg-baseBlue dark:bg-[#313A49] w-fit h-fit">4</p>
                <div class="flex gap-2 flex-col mt-4 justify-end self-end">
                    <div class="sm:flex gap-8 items-center self-end">
                        <img src="{{asset('tutor_pendaftaran/8.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/9.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                    </div>
                    <p class="dark:text-white">Setelahnya kamu harus menunggu verifikasi dari admin. Jangan lupa untuk <b>mengecek secara berkala</b>
                        notifikasi kamu ya!</p>
                </div>
            </div>
            </div>

            <div class="grid grid-cols-2">
                <div>
                <p class="rounded-full text-white p-2 px-4 bg-baseBlue dark:bg-[#313A49] w-fit h-fit">5</p>
                <div class="flex gap-2 flex-col mt-4">
                    <div class="sm:flex gap-8 items-center">
                        <img src="{{asset('tutor_pendaftaran/10.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/11.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/12.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                        <img src="{{asset('tutor_pendaftaran/13.png')}}" alt="" class="w-40 my-4 border-2 border-slate-800">
                    </div>
                    <p class="dark:text-white">Jika diterima, maka tombol dashboard akan tersedia dan kamu dapat masuk ke laman siswa untuk mengakses kelas yang kamu ambil.</p>
                </div>
                </div>
            </div>
        </div>
    </main>
  </div>

  @include('components.footer')
</body>

</html>