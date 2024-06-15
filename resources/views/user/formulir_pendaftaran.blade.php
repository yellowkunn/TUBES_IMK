@include('htmlhead')

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

<body class="font-Inter dark:dark-mode">
    @include('components.navbar')

    <div id="content" class="px-24 py-10 dark:border-t-2 dark:border-white">

        <!-- page hierarchy -->
        <div class="flex items-center gap-2 text-smallContent">
            <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
            <i class="fa-solid fa-caret-right text-baseBlue"></i>
            <a href="" class="hover:font-semibold">Detail Kelas</a>
            <i class="fa-solid fa-caret-right text-baseBlue"></i>
            <a href="{{ route('formulirpendaftaran') }}" class="hover:font-semibold">Formulir</a>
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

        <div x-data="formHandler()">
        <form action="{{ url('/formulirpendaftaran') }}" id="formId" method="POST" enctype="multipart/form-data" autocomplete="off" onchange="setDataForm()">
            @csrf
            <div class=" flex flex-col mt-8 rounded-lg" id="tab-1">
                <p class="text-subtitle font-semibold">Biodata</p>
                <div class="w-[150px] mb-10 mx-auto">
                    <input type="file" name="gambar" id="gambar" class="invisible" accept="image/*" onchange="showFile(this)" required>
                    <button id="file" onclick="document.getElementById('gambar').click(); return false;" class="p-2 py-3 w-full border rounded-xl shadow">
                        <div class="w-[130px] h-[170px] p-1 mb-2 flex justify-center">
                            <img src="" alt="" id="uploadedFile" class="max-w-full max-h-full rounded">
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-arrow-up-from-bracket fa-sm text-greyIcon dark:text-white rounded-full w-fit"></i>
                            <p class="text-greyIcon text-smallContent dark:text-white">Pas foto (3 x 4)</p>
                        </div>
                    </button>
                    <p class="text-xs mt-3 dark:text-white">*Maks 2MB</p>
                </div>

                <div class="flex gap-24 justify-between w-full mt-4">
                    <div class="flex flex-col gap-8 w-full">
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Nama Lengkap</p>
                            <input type="text" id="namalengkap" name="namalengkap" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Tempat lahir</p>
                            <input type="text" id="tempatlahir" name="tempatlahir" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Agama</p>
                            <input type="text" id="agama" name="agama" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3">
                            <p>Kewarganegaraan</p>
                            <input type="text" id="kewarganegaraan" name="kewarganegaraan" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                    </div>

                    <div class="flex gap-24 justify-between w-full">
                        <div class="flex flex-col gap-8 w-full">
                            <!-- dd jenis kelamin -->
                            <div>
                                <p>Jenis Kelamin</p>
                                <div class="relative w-full">
                                    <select id="gender" name="gender" class="block mt-2 appearance-none w-full bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                        <option value="" class="text-greyIcon dark:dark-mode">Jenis Kelamin</option>
                                        <option value="Laki-laki" class="text-greyIcon dark:dark-mode">Laki-laki</option>
                                        <option value="Perempuan" class="text-greyIcon dark:dark-mode">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- akhir dari dd jenis kelamin -->

                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Tanggal lahir</p>
                                <input type="date" id="tanggallahir" name="tanggallahir" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Alamat</p>
                                <input type="text" id="alamat" name="alamat" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                            </div>
                        </div>
                    </div>
                </div>


                <p class="text-subtitle font-semibold my-4 mt-20">Kontak</p>
                <div class="flex gap-24 justify-between w-full">
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>No. HP</p>
                        <input type="text" id="nohp" name="nohp" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                    </div>
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>No. Telp</p>
                        <input type="text" id="notelp" name="notelp" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                    </div>
                </div>

                <p class="text-subtitle font-semibold my-4 mt-20">Keterangan Pendidikan</p>
                <div class="flex gap-24 justify-between w-full">
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>Pendidikan Terakhir</p>
                        <input type="text" id="pendidikanterakhir" name="pendidikanterakhir" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                    </div>
                    <div class="relative flex flex-col gap-3 w-full">
                        <p>Diterima di kursus ini</p>
                        <input type="text" id="diterimakursus" name="diterimakursus" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-8 rounded-lg" id="tab-2">
                <p class="text-subtitle font-semibold mb-4">Keterangan Orang Tua</p>

                <div class="flex gap-24 justify-between w-full mt-4">
                    <div class="flex flex-col gap-8 w-full">
                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Nama Orang Tua</p>
                            <input type="text" id="namaortu" name="namaortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>

                        <div class="relative flex flex-col gap-3 w-full">
                            <p>Tempat Lahir</p>
                            <input type="text" id="tempatlahirortu" name="tempatlahirortu" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                        <div class="relative flex flex-col gap-3">
                            <p>Pendidikan</p>
                            <input type="text" id="pendidikanortu" name="pendidikanortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                        </div>
                    </div>

                    <div class="flex gap-24 justify-between w-full">
                        <div class="flex flex-col gap-8 w-full">
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Agama</p>
                                <input type="text" id="agamaortu" name="agamaortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Tanggal lahir</p>
                                <input type="date" id="tanggallahirortu" name="tanggallahirortu" required class="px-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
                            </div>
                            <div class="relative flex flex-col gap-3 w-full">
                                <p>Pekerjaan</p>
                                <input type="text" id="pekerjaanortu" name="pekerjaanortu" required class="ps-3 border-t-0 border-r-0 border-l-0 border-b-2 border-greyBorder bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black w-full p-1">
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
                    <div>
                        <div class="relative w-full">
                            <select id="" name="kelas" class="block mt-2 appearance-none w-full bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="" class="text-greyIcon dark:dark-mode">Mata Pelajaran</option>
                                @foreach ($kelass as $kelas)
                                <option value="{{$kelas->id_kelas}}" class="dark:dark-mode">{{$kelas->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="relative w-full">
                            <select id="" name="tingkat_kelas" class="block mt-2 appearance-none w-full bg-greyBackground dark:bg-white/80 dark:rounded dark:text-black border border-greyBorder text-greyIcon py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                                <option value="" class="text-greyIcon dark:dark-mode">Kelas</option>
                                <option value="SD" class="text-greyIcon dark:dark-mode">SD</option>
                                <option class="text-greyIcon dark:dark-mode" value="SMP">SMP</option>
                                <option class="text-greyIcon dark:dark-mode" value="SMA">SMA</option>
                                <option class="text-greyIcon dark:dark-mode" value="Gap Year">Gap Year</option>
                                <option class="text-greyIcon dark:dark-mode" value="TOEFL">TOEFL</option>
                                <option class="text-greyIcon dark:dark-mode" value="IELTS">IELTS</option>
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
                <button id="btnReset" onclick="localStorage.clear();" type="reset" class="stepper-btn w-[50px] hover:font-semibold">Reset</button>
                <button id="btnNext" type="button" class="stepper-btn w-[150px] p-3 bg-baseBlue/90 text-white rounded hover:bg-baseBlue">Selanjutnya</button>

                <button id="btnSubmit" type="submit" class="stepper-btn w-[220px] p-3 bg-baseBlue/90 text-white rounded hover:bg-baseBlue">Kirim</button>
            </div>
        </form>
        </div>

    </div>

    @include('components.footer')

    <script>
        //save data for unsubmitted form
        const inputElementIds = ['namalengkap', 'tempatlahir', 'agama', 'kewarganegaraan', 'gender', 
            'tanggallahir', 'alamat', 'nohp', 'notelp', 'pendidikanterakhir', 'diterimakursus', 'namaortu', 
            'tempatlahirortu', 'pendidikanortu', 'agamaortu', 'tanggallahirortu', 'pekerjaanortu'];

        function setDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                localStorage.setItem('"'+ inputId +'"', inputElement.value);
            });
        }

        function getDataForm() {
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                inputElement.value = localStorage.getItem('"'+ inputId +'"');
            });
        }

        getDataForm();


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
        
        let currentTab = 0;

        function showTab(tabID) {
            tabs.forEach(tab => tab.classList.add('hidden'));
            tabs[tabID].classList.remove('hidden');

            currentTab = tabID;

            updateButtonVisibility();
            updateButtonDisable();
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
            btnSubmit.style.display = currentTab === 2 ? 'inline-block' : 'none';
        }

        function updateButtonDisable(){
            inputElementIds.forEach(function(inputId) {
                const inputElement = document.getElementById(inputId);

                if(inputElement.value == ''){
                    btnSubmit.classList.remove('bg-baseBlue/90', 'hover:bg-baseBlue');
                    btnSubmit.classList.add('bg-slate-400');
                    btnSubmit.disabled = true;
                } else {
                    btnSubmit.disabled = false;
                    btnSubmit.classList.remove('bg-slate-400');
                    btnSubmit.classList.add('bg-baseBlue/90', 'hover:bg-baseBlue');
                }
            });
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