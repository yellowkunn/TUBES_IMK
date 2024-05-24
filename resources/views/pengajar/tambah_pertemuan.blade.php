<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pengajar</title>

     <!-- google font for icon -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>
<body class="font-Inter">
    <div>
    @include('components.pengajar.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
            @include('components.pengajar.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">
                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href="">Daftar Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="">Tambah</a>
                </div>
                
                <form action="" method="post">
                @csrf

                    <div class="flex justify-between items-center">
                        <p class="text-title font-semibold my-7">Tambah Pertemuan</p>
                        <button type="submit" id="submit"><i class="fa-solid fa-check fa-xl p-5 px-[10px] border-2 border-emerald-500 hover:border-none 
                        hover:bg-emerald-400 text-emerald-600 hover:text-white rounded-full drop-shadow-xl"></i></button> 
                    </div>

                    <div class="flex flex-col gap-12">
                        <input type="text" name="pertemuan" id="pertemuan" value="Pertemuan ke-i" disabled class="w-fit ps-4 bg-neutral-50">

                        <div class="flex flex-col gap-2 w-1/2">
                            <label for="date">Tanggal</label>
                            <input type="date" name="date" id="date" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>

                        <div class="flex flex-col gap-2 w-1/2">
                            <label for="topikbahasan">Topik Bahasan</label>
                            <input type="text" name="topikbahasan" id="topikbahasan" class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1" required>
                        </div>
                    </div>

                    <hr class="my-12">

                    <p class="text-subtitle font-semibold mb-5">Bahan Ajar</p>

                    <div class="md:flex items-start gap-20">
                        <div class="md:w-1/2">
                            <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                <p>Materi</p>
                                <button type="button" id="addFileMateri" onclick="addInputFileMateri()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                            </div>
                            
                            <div class="rounded-lg">
                                <div id="divInputFileMateri" class="grid grid-cols-3 bg-neutral-100 border-4 border-white"></div>
                            </div>
                        </div>
                            
                        <div class="md:w-1/2">
                            <div class="flex justify-between items-center border-2 border-baseBlue/20 bg-baseBlue/5 p-3 px-6 rounded-lg">
                                <p>Latihan</p>
                                <button type="button" id="addFileLatihan" onclick="addInputFileLatihan()"><i class="fa-solid fa-plus p-2 px-[9px] bg-baseBlue text-white rounded-full"></i></button>
                            </div>
                            
                            <div class="rounded-lg">
                                <div id="divInputFileLatihan" class="grid grid-cols-3 bg-neutral-100 border-4 border-white"></div>
                            </div>
                        </div>

                    </div>
                </form>

                
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')


<script src="{{asset('js/style.js')}}"></script>
<script>
    var divInputFileMateri = document.getElementById('divInputFileMateri');
    var divInputFileLatihan = document.getElementById('divInputFileLatihan');
    var index = 0;

    function addInputFileMateri() {
        index++;

        var inputElement = document.createElement('input');
        inputElement.type = 'file';
        inputElement.name = 'materi[]';
        inputElement.className = 'rounded p-4 md:ps-8 file:border-none file:text-sm col-span-2';
        inputElement.innerHTML = '<input type="hidden" name="type" value="materi">';
        inputElement.multiple = true;
        inputElement.id = 'inputMateri-' + index;

        var deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        deleteButton.onclick = function() {
            divInputFileMateri.removeChild(inputElement);
            divInputFileMateri.removeChild(deleteButton);
        };

        divInputFileMateri.insertBefore(deleteButton, divInputFileMateri.firstChild);
        divInputFileMateri.insertBefore(inputElement, divInputFileMateri.firstChild);
    }

    function addInputFileLatihan() {
        index++;

        var inputElement = document.createElement('input');
        inputElement.type = 'file';
        inputElement.name = 'Latihan[]';
        inputElement.className = 'rounded p-4 md:ps-8 file:border-none file:text-sm col-span-2';
        inputElement.innerHTML = '<input type="hidden" name="type" value="latihan">';
        inputElement.multiple = true;
        inputElement.id = 'inputLatihan-' + index;

        var deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        deleteButton.onclick = function() {
            divInputFileLatihan.removeChild(inputElement);
            divInputFileLatihan.removeChild(deleteButton);
        };

        divInputFileLatihan.insertBefore(deleteButton, divInputFileLatihan.firstChild);
        divInputFileLatihan.insertBefore(inputElement, divInputFileLatihan.firstChild);
    }

    tippy('#submit', {
        content: 'Tambah Pertemuan',
    });
</script>
</body>
</html>