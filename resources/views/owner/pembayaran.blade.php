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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('pengaturanruangan') }}" class="hover:font-semibold">Kalender Pendidikan</a>
                    </div>

                    <div class="flex justify-between mt-8">
                        <p class="text-title font-semibold">Kalender Pendidikan</p>   
                        
                        <button id="" class="bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-5 py-2 rounded-lg">
                        <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                            <p class="text-greyIcon font-semibold">Tambah kegiatan</p>
                        </button>
                    </div>

                    <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                            <td>Row 2 Data 1</td>
                            <td>Row 2 Data 2</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@include('components.footer')

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
</body>
</html>