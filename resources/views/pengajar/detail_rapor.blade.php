<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Saya</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">
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
                        <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('raporpengajar',  ['kelas' => $kelas->id_kelas]) }}" class="hover:font-semibold">Rapor {{ $kelas->nama}}</a>
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                        <a href="{{ route('isirapor',  ['kelas' => $kelas->id_kelas, 'siswa' => $siswa->id_siswa]) }}" class="hover:font-semibold">{{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}</a>
                    </div>

                    <p class="text-title font-semibold mt-8">Rapor Siswa</p>   
                    

                    <div x-data="formHandler()">
                    <form action="" id="formId" method="POST" enctype="multipart/form-data"
                        autocomplete="off" onchange="setDataForm()">
                        @csrf

                        <div class="flex flex-col gap-2 my-5">
                            <p class="font-semibold">Nama : <span class="font-normal">{{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}</span></p>
                            <p class="font-semibold">Kelas : <span class="font-normal">{{ $kelas->nama ?? '-' }}</span></p>
                        </div>

                        <div class="w-full sm:grid grid-cols-2 md:grid-cols-3 gap-8 mt-8">
                            <!-- dd jenis rapor -->
                            <div class="mt-4 sm:mt-0">
                                <div class="relative flex flex-col w-full">
                                    <label for="jenisrapor" class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Pilih jenis rapor</label>
                                    <select id="jenisrapor" name="jenisrapor"
                                        class="dark:focus:bg-[#374151]/40 pt-8 block appearance-none w-full bg-greyBackground dark:bg-[#374151]/40 dark:text-white dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                        <option value="" class="text-greyIcon dark:dark-mode">Rapor</option>
                                            <option value="raporBulanan" class="dark:dark-mode">Rapor Bulanan</option>
                                            <option value="raporTengahSemester" class="dark:dark-mode">Rapor Tengah Semester</option>
                                            <option value="raporSemester" class="dark:dark-mode">Rapor Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <p class="text-[18px] font-semibold mt-8">Keterangan kelas</p>
                        <div class="w-full sm:grid grid-cols-2 md:grid-cols-3 gap-8 sm:mt-4">
                            <!-- dd jenis rapor -->
                            <div class="mt-4 sm:mt-0">
                                <div class="relative flex flex-col gap-3 w-full">
                                    <label for="pengetahuan" class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Nilai Pengetahuan</label>
                                    <input type="number" id="pengetahuan" name="pengetahuan" required class="ps-4 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-[#374151]/40 dark:text-white rounded dark:text-black w-full pt-8">
                                </div>
                            </div>

                            <div class="mt-4 sm:mt-0">
                                <div class="relative flex flex-col gap-3 w-full">
                                    <label for="keterampilan"
                                        class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Nilai Keterampilan</label>
                                    <input type="number" id="keterampilan" name="keterampilan" required
                                        class="ps-4 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-[#374151]/40 dark:text-white rounded dark:text-black w-full pt-8">
                                </div>
                            </div>  
                            <div class="mt-4 sm:mt-0">
                                <div class="relative flex flex-col gap-3 w-full">
                                    <label for="keterampilan"
                                        class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Nilai Sikap</label>
                                    <input type="number" id="keterampilan" name="keterampilan" required
                                        class="ps-4 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-[#374151]/40 dark:text-white rounded dark:text-black w-full pt-8">
                                </div>
                            </div>  
                        </div>

                        <p class="text-[18px] font-semibold mt-8 mb-4">Catatan</p>
                        
                        <div class="relative flex flex-col gap-3 w-full">
                            <label for="catatan"
                                class="absolute top-2 left-4 text-smallContent text-[#717171] dark:text-white font-semibold">Tambahkan catatan</label>
                            <textarea id="catatan" name="catatan" required
                                class="ps-4 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-[#374151]/40 dark:text-white rounded dark:text-black w-full pt-8"></textarea>
                        </div> 

                        <div class="flex justify-end gap-4 mt-16">
                            <button onclick="localStorage.clear();" type="reset"
                                class="w-[10px] px-16 hover:font-semibold">Reset</button>
                            <button type="submit"
                                class="w-[150px] p-2 bg-baseBlue/90 text-white rounded hover:bg-baseBlue">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
    @include('components.footer')
    </div>

    <script>
        const inputElementIds = ['jenisrapor', 'pengetahuan', 'keterampilan', 'sikap', 'catatan'];

        function setDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                localStorage.setItem('"' + inputId + '"', inputElement.value);
            });
        }

        function getDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                inputElement.value = localStorage.getItem('"' + inputId + '"');
            });
        }

        getDataForm();
    </script>
</body>

</html>