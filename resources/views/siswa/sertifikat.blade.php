@include('htmlhead')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Saya</title>

    <!-- google font for icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/8c8655eff1.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')

    <style>
        .no-certificates-row {
            background-color: #f9fafb; /* Warna latar belakang yang lebih ringan */
        }
        .no-certificates-cell {
            text-align: center;
            padding: 2rem; /* Menambah padding untuk kenyamanan visual */
        }
        .no-certificates-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .no-certificates-content i {
            color: #6b7280; /* Warna ikon abu-abu */
        }
        .no-certificates-content p {
            font-size: 1.25rem;
            color: #6b7280; /* Warna teks abu-abu */
        }
    </style>
</head>
<body class="font-Inter text-regularContent dark:dark-mode">
    <div>
    @include('components.siswa.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300" id="sidebar">
            @include('components.siswa.sidebar')
        </div>
        
        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">

            <!-- page hierarchy -->
            <div class="flex items-center gap-2 text-smallContent">
                <a href="{{ route('home') }}" class="hover:font-semibold">Dashboard</a>
                <i class="fa-solid fa-caret-right text-baseBlue"></i>
                <a href="{{ route('sertifikat') }}" class="hover:font-semibold">Sertifikat</a>
            </div>

            <p class="text-title font-semibold mt-7 mb-4 md:mb-6">Sertifikat Saya</p>
                
            <div class="bg-white dark:bg-[#374151]/40 drop-shadow-regularShadow py-3 mb-8 rounded-lg border">
                <!-- tabel rapor -->
                <div class="overflow-x-auto">
                    
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground dark:bg-[#374151]/40 dark:text-white text-[#717171]">
                            <tr>
                                <th scope="col" class="w-2 px-4 sm:px-12 py-3">No.</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Nama Sertifikat</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Keterangan</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Tanggal</th>
                                <th scope="col" class="px-4 sm:px-12 py-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        @php $nomor = 1; @endphp
                            @if ($sertifikats->isNotEmpty())
                                @foreach ($sertifikats as $sertifikat)
                                    <tr class="border-b border-neutral-200">
                                        <td class="px-4 sm:px-12 py-4">{{ $nomor++ }}</td>
                                        <td class="px-4 sm:px-12 py-4">{{ $sertifikat->nama }}</td>
                                        <td class="px-4 sm:px-12 py-4">{{ $sertifikat->keterangan }}</td>
                                        <td class="px-4 sm:px-12 py-4">
                                            {{ \Carbon\Carbon::parse($sertifikat->dibuat)->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="flex gap-4 text-greyIcon py-4 px-4 sm:px-12">
                                        @php
                                            $fileUrl = asset('sertifikat/' . $sertifikat->sertifikat);
                                        @endphp
                                        <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                            <span class="material-symbols-outlined">visibility</span>
                                        </button>
                                        <button onclick="downloadFile('{{ $fileUrl }}')">
                                            <span class="material-symbols-outlined">download</span>
                                        </button>

                                        <script>
                                            function downloadFile(url) {
                                                const a = document.createElement('a');
                                                a.href = url;
                                                a.download = ''; // Optional: you can specify the filename here
                                                document.body.appendChild(a);
                                                a.click();
                                                document.body.removeChild(a);
                                            }
                                        </script>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr class="border-b border-neutral-200 no-certificates-row">
                                <td colspan="5" class="px-4 sm:px-12 py-4 text-center no-certificates-cell">
                                    <div class="no-certificates-content">
                                        <i class="fa-solid fa-circle-exclamation fa-3x text-greyIcon mb-2"></i>
                                        <p class="text-gray-500">Tidak ada sertifikat</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- akhir dari tabel rapor -->
            </div>

            </div>
        </div>
    </div>
    </div>
</div>

    @include('components.footer')
</body>
</html>