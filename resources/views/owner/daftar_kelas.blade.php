<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite('resources/css/app.css')
</head>

<body class="font-Inter text-regularContent">

    <div class="relative flex justify-center items-center" id="session">
        @if(session('success'))
        <div id="success" class="fixed top-8 mt-5 bg-[#f7fff4] border border-[#8bdc64] shadow-[0px_0px_6px_1px_rgba(86,169,47,0.2)] z-20 w-fit gap-2 px-8 py-3 rounded-2xl unselectable translate-y-4 duration-300">
            <div class="flex justify-between items-center gap-4 lg:gap-36">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-check fa-lg p-2 py-4 bg-success rounded-full text-white"></i>
                    <p class="text-lg text-greyIcon">{{session('success')}}</p>
                </div>

                <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('success').classList.add('hidden')"></i>
            </div>
        </div>
        @elseif(session('error'))
        <div id="error" class="fixed top-8 mt-5 bg-[#ffefef] border border-[#ff3838] shadow-[0px_0px_6px_2px_rgba(227,0,0,0.2)] z-20 gap-2 items-center w-fit px-8 py-3 justify-center rounded-2xl flex unselectable">
                <div class="flex justify-between items-center gap-36">
                    <div class="flex gap-4 items-center">
                        <i class="fa-solid fa-exclamation fa-lg p-4 bg-error rounded-full text-white"></i>
                        <p class="text-lg text-greyIcon">{{ session('error') }}</p>
                    </div>

                    <i class="fa-solid fa-xmark fa-lg p-2 py-4 h-fit text-greyIcon hover:bg-gray-200 rounded-full" onclick="document.getElementById('error').classList.add('hidden')"></i>
                </div>
            </div>
        @endif
    </div>

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
                        <a href="{{ route('editdaftarkelas') }}" class="hover:font-semibold">Kelas</a>
                    </div>

                    
                    {{-- @livewire('tambah-kelas') --}}
                    @livewire('tambah-kelas')

                    
                </div>
            </div>
        </div>
    </div>

    <div class="mt-16">
    @include('components.footer')
    @push('additional-scripts') 
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const load = $('#skeleton');
            const show = $('#hasilKelas');
            
            load.show();
            show.hide();

            setTimeout(function() {
                load.hide();
                show.show();
            }, 150);
        });

        function showPopupEditKelas(i) {
            document.getElementById('popupEditKelas'+i).classList.toggle('hidden');
        }

        function showPopupHapusKelas(i) {
            document.getElementById('popupHapusKelas'+i).classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            function initializeDropdown(buttonId, menuId) {
                const dropdownButton = document.getElementById(buttonId);
                const dropdownMenu = document.getElementById(menuId);
                let isDropdownOpen = false;

                function toggleDropdown() {
                    isDropdownOpen = !isDropdownOpen;
                    if (isDropdownOpen) {
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                }

                dropdownButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    toggleDropdown();
                });

                window.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                        isDropdownOpen = false;
                    }
                });
            }

            // Select all dropdown buttons and menus
            const dropdownButtons = document.querySelectorAll('[id^="dd-more"]');
            dropdownButtons.forEach((button, index) => {
                initializeDropdown(`dd-more${index}`, `dd-menu${index}`);
            });
        });

        
        //save data for unsubmitted form
        const inputElementIds = ['nama', 'fasilitas', 'durasi', 'tingkat_kelas', 'harga', 
            'rentang', 'jadwal_hari', 'deskripsi'];

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

        setTimeout(function() {
            const session = document.getElementById('session');
            if (session) {
                session.classList.add('hidden');
            }
        }, 1500);

        function showPopupTambahKelas() {
            document.getElementById('popupTambahKelas').classList.toggle('hidden');
        }

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
    </script>
</body>

</html>