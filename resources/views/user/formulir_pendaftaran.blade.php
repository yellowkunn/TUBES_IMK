<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>

     <!-- google font for icon -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
</head>

<body class="font-Inter">
    @include('components.navbar')

    <div id="content" class="px-24 py-10">

        <!-- page hierarchy -->
        <div class="flex items-center gap-2 text-smallContent">
            <a href="">Dashboard</a>
            <i class="fa-solid fa-caret-right text-baseBlue"></i>
            <a href="">Detail Kelas</a>
            <i class="fa-solid fa-caret-right text-baseBlue"></i>
            <a href="">Formulir</a>
        </div>

        <div class="text-center">
            <p class="text-title font-semibold mt-12">Formulir Pendaftaran</p>
            <p class="mt-2">Silakan isi dan lengkapi formulir pendaftaran berikut sebelum mendaftar pada kelas.</p>
        </div>

        <div class="stepper relative my-20 flex gap-28 justify-center">
            <div id="step-circle-1" class="rounded-full bg-white border-2 border-[#7AA1E2] p-2 px-5 text-white text-subtitle text-center">1</div>
            <div id="step-circle-2" class="rounded-full bg-white border-2 border-[#7AA1E2] p-2 px-5 text-white text-subtitle text-center">2</div>
            <div id="step-circle-3" class="rounded-full bg-white border-2 border-[#7AA1E2] p-2 px-5 text-white text-subtitle text-center">3</div>
        </div>

        <form action="{{ url('/formulirpendaftaran') }}" id="formId" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class=" flex flex-col mt-8 rounded-lg" id="tab-1">
                <p class="text-subtitle font-semibold">Biodata</p>
                <div class="w-[150px] mb-10 mx-auto">
                    <input type="file" name="gambar" id="file2" class="invisible" accept="image/*" onchange="showFile(this)" required>
                    <button id="file" onclick="document.getElementById('file2').click(); return false;" class="p-2 py-3 w-full border rounded-xl shadow">
                        <div class="w-[130px] h-[170px] p-1 mb-2 flex justify-center">
                            <img src="" alt="" id="uploadedFile" class="max-w-full max-h-full rounded">
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-arrow-up-from-bracket fa-sm text-greyIcon rounded-full w-fit"></i>
                            <p class="text-greyIcon text-smallContent">Pas foto (3 x 4)</p>
                        </div>
                    </button>
                    <p class="text-xs mt-3">*Maks 2MB</p>
                </div>

                <div class="flex gap-24 justify-between w-full mt-4">
                    <div class="flex flex-col gap-8 w-full">
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Nama Lengkap</p>
                            <input type="text" id="text" name="namalengkap" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Tempat lahir</p>
                            <input type="text" id="text" name="tempatlahir" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Agama</p>
                            <input type="text" id="text" name="agama" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3">
                            <p>Kewarganegaraan</p>
                            <input type="text" id="text" name="kewarganegaraan" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                    </div>

                    <div class="flex gap-24 justify-between w-full">
                        <div class="flex flex-col gap-8 w-full">
                            <!-- dd jenis kelamin -->
                            <div>
                                <p>Jenis Kelamin</p>
                                <div class="relative w-full">
                                    <select id="genderSelect" name="gender" class="block mt-2 appearance-none w-full bg-greyBackground border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                        <option value="" class="text-greyIcon">Jenis Kelamin</option>
                                        <option value="Laki-laki" class="text-greyIcon">Laki-laki</option>
                                        <option value="Perempuan" class="text-greyIcon">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- akhir dari dd jenis kelamin -->

                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Tanggal lahir</p>
                                <input type="date" id="text" name="tanggallahir" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Alamat</p>
                                <input type="text" id="text" name="alamat" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                            </div>
                        </div>
                    </div>
                </div>


                <p class="text-subtitle font-semibold my-4 mt-20">Kontak</p>
                <div class="flex gap-24 justify-between w-full">
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>No. HP</p>
                        <input type="text" id="text" name="nohp" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                    </div>
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>No. Telp</p>
                        <input type="text" id="text" name="notelp" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                    </div>
                </div>

                <p class="text-subtitle font-semibold my-4 mt-20">Keterangan Pendidikan</p>
                <div class="flex gap-24 justify-between w-full">
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>Pendidikan Terakhir</p>
                        <input type="text" id="text" name="pendidikanterakhir" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                    </div>
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>Diterima di kursus ini</p>
                        <input type="text" id="text" name="diterimakursus" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-8 rounded-lg" id="tab-2">
                <p class="text-subtitle font-semibold mb-4">Keterangan Orang Tua</p>

                <div class="flex gap-24 justify-between w-full mt-4">
                    <div class="flex flex-col gap-8 w-full">
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Nama Orang Tua</p>
                            <input type="text" id="text" name="namaortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>

                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Tempat Lahir</p>
                            <input type="text" id="text" name="tempatlahirortu" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3">
                            <p>Pendidikan</p>
                            <input type="text" id="text" name="pendidikanortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                        </div>
                    </div>

                    <div class="flex gap-24 justify-between w-full">
                        <div class="flex flex-col gap-8 w-full">
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Agama</p>
                                <input type="text" id="text" name="agamaortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Tanggal lahir</p>
                                <input type="date" id="text" name="tanggallahirortu" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Pekerjaan</p>
                                <input type="text" id="text" name="pekerjaanortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground w-full p-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-10 rounded-lg" id="tab-3">

                <p class="text-center text-title font-bold">Masih mau di repisi</p>


                <p class="text-subtitle font-semibold mb-4">Keterangan kelas</p>
                <div class="grid grid-cols-2 gap-48 w-full">
                    <!-- dd daftar kelas -->
                    <!-- <div>
                <button type="button" id="ddDaftarKelas-0" class="bg-white flex justify-between items-center border border-greyBorder px-4 py-2 rounded-lg w-full">
                    <p class="text-greyIcon">Matematika</p>
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                
                <div id="menuDaftarKelas-0" class="hidden ps-5 w-1/3 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute" style="color: #949494;">
                    <a href="#" class="block py-1">Bahasa Inggris</a>
                    <a href="#" class="block py-1">Kimia</a>
                    <a href="#" class="block py-1">Fisika</a>
                    <a href="#" class="block py-1">TOEFL</a>
                    <a href="#" class="block py-1">IELTS</a>
                </div>
            </div> -->
                    <!-- akhir dari dd daftar kelas -->
                    <!-- dd tingkatan -->
                    <!-- <div> -->
                    <!-- <button type="button" id="ddTingkatan-0" class="bg-white flex justify-between items-center border border-greyBorder px-4 py-2 rounded-lg w-full">
                    <p class="text-greyIcon">SMP</p>
                    <i class="fa-solid fa-angle-down"></i>
                </button>
                
                <div id="menuTingkatan-0" class="hidden ps-5 w-1/3 bg-white mt-2 py-2 rounded-md drop-shadow-regularShadow absolute" style="color: #949494;">
                    <a href="#" class="block py-1">SD</a>
                    <a href="#" class="block py-1">SMP</a>
                    <a href="#" class="block py-1">SMA</a>
                </div> -->
                    <!-- </div> -->
                    <!-- akhir dari dd tingkatan -->
                    <div>
                        <div class="relative w-full">
                            <select id="" name="kelas" class="block mt-2 appearance-none w-full bg-greyBackground border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="" class="text-greyIcon">Mata Pelajaran</option>
                                @foreach ($kelass as $kelas)
                                <option value="{{$kelas->id_kelas}}">{{$kelas->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="relative w-full">
                            <select id="" name="tingkat_kelas" class="block mt-2 appearance-none w-full bg-greyBackground border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="" class="text-greyIcon">Kelas</option>
                                <option value="SD">SD</option>
                                <option class="text-greyIcon" value="SMP">SMP</option>
                                <option class="text-greyIcon" value="SMA">SMA</option>
                                <option class="text-greyIcon" value="Gap Year">Gap Year</option>
                                <option class="text-greyIcon" value="TOEFL">TOEFL</option>
                                <option class="text-greyIcon" value="IELTS">IELTS</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id_pengguna" value="{{ Auth::user()->id_pengguna }}">
                    <input type="hidden" name="status" value="MenungguVerif">
                    <!-- <input type="hidden" name="kelas" value="1"> -->
                </div>
            </div>

            <div class="flex justify-end gap-16 w-full mt-16">
                <button id="btnPrevious" type="button" class="stepper-btn text-baseBlue hover:font-semibold">Sebelumnya</button>
                <button id="btnReset" type="reset" class="stepper-btn w-[50px] hover:font-semibold">Reset</button>
                <button id="btnNext" type="button" class="stepper-btn w-[150px] p-3 bg-baseBlue text-white rounded hover:bg-baseBlue/90 hover:font-semibold">Selanjutnya</button>

                <button id="btnSubmit" type="submit" class="stepper-btn w-[220px] p-3 bg-baseBlue text-white rounded hover:bg-baseBlue/90 hover:font-semibold">Lanjut ke pembayaran</button>
                <script>
                    document.getElementById('btnSubmit').addEventListener('click', function() {
                        window.location.href = 'url-halaman-pembayaran';
                    });
                </script>
            </div>
        </form>

    </div>

    @include('components.footer')

    <script>
        function showFile(input) {
            const getFile = document.getElementById('uploadedFile');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    getFile.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // multistep form
        const steps = document.querySelectorAll('[id^="step-circle-"]');
        const tabs = document.querySelectorAll('[id^="tab-"]');
        const btnPrevious = document.getElementById('btnPrevious');
        const btnNext = document.getElementById('btnNext');
        const btnReset = document.getElementById('btnReset');

        let currentTab = 0;

        function showTab(tabID) {
            tabs.forEach(tab => tab.classList.add('hidden'));
            tabs[tabID].classList.remove('hidden');

            currentTab = tabID;

            updateButtonVisibility();
            updateStepCircle(tabID);
        }

        function updateStepCircle(tabID) {

        steps.forEach((circle, index) => {
            if (index <= tabID) {
                circle.style.background = '#7AA1E2';
            } else {
                circle.style.background = '#FFFFFF';
            }
            });

            const stepWidth = 36;
                stepLine.style.width = `${tabID * stepWidth + (stepWidth / 2)}px`;
            }
        
        function updateButtonVisibility() {
            btnPrevious.style.display = currentTab === 0 ? 'none' : 'inline-block';
            btnNext.style.display = currentTab === tabs.length - 1 ? 'none' : 'inline-block';
            btnReset.style.display = currentTab === 2 ? 'inline-block' : 'none';
            btnSubmit.style.display = currentTab === 2 ? 'inline-block' : 'none';
        }

        btnNext.addEventListener('click', () => {
            showTab(currentTab + 1);
        });

        btnPrevious.addEventListener('click', () => {
            showTab(currentTab - 1);
        });

        showTab(0);
    </script>
</body>

</html>