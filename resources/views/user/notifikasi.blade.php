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

    <p class="text-title font-semibold mb-4">Pendaftaran Kelas</p>

    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">
        <!-- tabel siswa -->
        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
            style="color: #191919">
            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                style="color: #717171">
                <th scope="col" class= "w-2 px-8 py-3">No.</th>
                <th scope="col" class= "px-8 py-3">Nama Pengguna</th>
                <th scope="col" class= "px-8 py-3">Kelas</th>
                <th scope="col" class= "px-8 py-3">Harga</th>
                <th scope="col" class= "px-8 py-3">Waktu Mendaftar</th>
                <th scope="col" class= "px-8 py-3">Status</th>
                <th scope="col" class= "px-8 py-3">Keterangan</th>
            </thead>

            <tbody>
                <tr class="bg-greyBackground">
                    <td class="px-8 py-4"> $nomor++ </td>
                    <td class="px-8 py-4">
                        Sakifa 
                    </td>
                    <td class="px-8 py-4">
                        Matematika, SMP, 13:30
                    </td>
                    <td class="px-8 py-4">
                        Rp500.000
                    </td>
                    <td class="px-8 py-4">
                        12 Desember 2012, 12:39 
                    </td>
                    <td class="px-8 py-6 flex items-center gap-2">
                        <div class="rounded-full bg-error w-3 h-3"></div> 
                        <p class="font-semibold">Ditolak</p>

                        <!-- <div class="rounded-full bg-amber-500 w-3 h-3"></div> 
                        <p class="font-semibold">Menunggu Verifikasi</p>

                        <div class="rounded-full bg-success w-3 h-3"></div>  -->
                        <!-- <p class="font-semibold">Diterima</p>   -->
                    </td>
                    <td class="px-8 py-4">
                        <button onclick="showPopupKeterangan( parameter)" class="bg-amber-500/90 hover:bg-amber-500 text-white rounded-lg p-1.5 px-6">Lihat</button> 
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- akhir dari tabel siswa -->
    </div>
    </div>

    <!-- pop up keterangan -->
    <div class="top-0 left-0 hidden flex flex-col justify-center items-center fixed z-10 backdrop-blur-sm backdrop-brightness-50 drop-shadow-regularShadow 
        w-full h-screen" id="popupKeterangan parameter">
            <div class="flex flex-col justify-center min-w-[450px]">
                <div class="flex justify-between bg-baseBlue px-10 py-4 rounded-t-xl text-white">
                    <p class="text-title">keterangan</p>
                    <button onclick="showPopupKeterangan( parameter)">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
                <div class="bg-white p-7 pt-4 rounded-b-xl px-10 py-8">
                    <form method="post" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <p class="font-semibold mb-1">Keterangan</p>
                            <div>
                                <p>cepatla siap</p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-center gap-6">
                            <button type="button" onclick="showPopupKeterangan( parameter)" class="text-baseBlue bg-white border-2 border-baseBlue p-1.5 px-7 rounded-full
                                hover:bg-baseBlue hover:text-white" style="box-shadow: 
                                0px 0px 5px 1px rgba(122,161,226,0.3);">Tutup</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- akhir dari pop up keterangan -->

@include('components.footer')

<script>
    function showPopupKeterangan(i) {
        document.getElementById('popupKeterangan'+i).classList.toggle('hidden');
    }
</script>
</body>

</html>