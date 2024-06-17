<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajar</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div>
        @include('components.owner.navbar')

        <div class="flex max-w-[1440px]">
            <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
                @include('components.owner.sidebar')
            </div>

            <!-- content -->
            <div class="w-full">
                <div id="content" class="p-8">

                    <!-- page hierarchy -->
                    <div class="flex items-center gap-2 text-smallContent">
                        <a href=" route('home') " class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href=" route('pengaturanruangan') " class="hover:font-semibold">Kalender Pendidikan</a>
                    </div>

                    <p class="text-title font-semibold mt-8">Pembayaran</p>   
                      
                    <div class="bg-white rounded-lg p-4 shadow-md overflow-x-auto my-5">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Kelas</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><p class="text-center">1. </p></td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('berkas_ujis/file_20240519034914.jpeg') }}" alt="pic" class="w-8 h-8 object-cover rounded-full">
                                            <span class="font-bold"> Sakifa </span>
                                        </div>
                                    </td>
                                    <td> 12 Oktober 2012 </td>
                                    <td> Matematika SMP </td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <div class="flex gap-2 items-center">
                                                <div class="rounded-full bg-amber-500 w-3 h-3"></div>
                                                <p class="font-medium text-amber-500">Belum bayar</p>
                                        </div>
                                    </td>
                                    <td>Rp310.000</td>
                                    <td>
                                        <button class="me-8"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="text-center">2. </p></td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('berkas_ujis/file_20240519034914.jpeg') }}" alt="pic" class="w-8 h-8 object-cover rounded-full">
                                            <span class="font-bold"> Mellani </span>
                                        </div>
                                    </td>
                                    <td> 12 Oktober 2012 </td>
                                    <td> TOEFL </td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <div class="rounded-full bg-success w-3 h-3"></div>
                                            <p class="font-medium text-success">Sudah bayar</p>
                                        </div>
                                    </td>
                                    <td>Rp310.000</td>
                                    <td>
                                        <button class="me-8"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="text-center">3. </p></td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('berkas_ujis/file_20240519034914.jpeg') }}" alt="pic" class="w-8 h-8 object-cover rounded-full">
                                            <span class="font-bold"> Sintong </span>
                                        </div>
                                    </td>
                                    <td> 12 Oktober 2012 </td>
                                    <td> Matematika SMP </td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <div class="rounded-full bg-error w-3 h-3"></div>
                                            <p class="font-medium text-error">Tidak bayar</p>
                                        </div>
                                    </td>
                                    <td>Rp310.000</td>
                                    <td>
                                        <button class="me-8"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="text-center">4. </p></td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('berkas_ujis/file_20240519034914.jpeg') }}" alt="pic" class="w-8 h-8 object-cover rounded-full">
                                            <span class="font-bold"> Sintong </span>
                                        </div>
                                    </td>
                                    <td> 12 Oktober 2012 </td>
                                    <td> Bahasa Indonesia SMP </td>
                                    <td>
                                        <div class="flex gap-2 items-center">
                                            <div class="rounded-full bg-greyIcon w-3 h-3"></div>
                                            <p class="font-medium text-greyIcon">Menunggu</p>
                                        </div>
                                    </td>
                                    <td>Rp310.000</td>
                                    <td>
                                        <button class="me-8"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
</body>
</html>