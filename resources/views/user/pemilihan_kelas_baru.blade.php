@include('htmlhead')

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
<body class="font-Inter text-regularContent bg-white">
    <div>
    @include('components.siswa.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
            @include('components.siswa.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-6">

                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href="">Dashboard</a>
                </div>

                <p class="text-subtitle font-semibold my-7">Pilih Kelas</p>
    
                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <article class="flex flex-col">
                        <a href="" class="flex flex-col justify-center">
                            <div class="flex flex-col p-5 sm:p-7 w-full drop-shadow-regularShadow bg-white hover:bg-white rounded-xl">
                            <div class="flex flex-col items-start text-neutral-700">
                                <h4 class="font-semibold">Bahasa Inggris</h4>
                                <p class="text-smallContent italic font-light">kurikulum nasional</p>        
                            </div>
                            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a9d649e5d3f12aafc79229e974e098d601878ee8ae388a23229704f8f6b346f2?apiKey=8e216de591ec44d2b3973e5d1e77a02f&" alt="Bahasa Inggris class" class="mt-4 w-full" />
                            <p class="mt-6 text-smallContent text-neutral-700 text-start">
                            matematika adalah pelajaran paporit jerome
                            </p>

                            <p class="text-justify text-neutral-600 mt-2 break-pretty">
                                <span class="text-[20px] sm:text-subtitle font-semibold text-amber-500">Rp500.000</span>/bulan
                            </p>
                            <a href="#" class="py-2 w-full font-semibold text-center text-white bg-baseBlue hover:bg-[#607FB2] rounded-lg mt-3">
                                Lihat
                            </a>
                            </div>
                        </a>
                    </article>
                    
                </div>

            </div>
        </div>
    </div>
    </div>

    @include('components.footer')

<script src="{{asset('js/style.js')}}"></script>
</body>
</html>