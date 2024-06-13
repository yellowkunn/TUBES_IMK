<div>
    @include('components.pengajar.navbar')

    <div class="flex max-w-[1440px]">
        <div class="translate-x-[-100%] md:translate-x-0 md:h-fit fixed md:static z-10 h-screen duration-300"
            id="sidebar">
            @include('components.pengajar.sidebar')
        </div>

        <!-- content -->
        <div class="w-full">
            <div id="content" class="p-8">
                <!-- page hierarchy -->
                <div class="flex items-center gap-2 text-smallContent">
                    <a href=" route('home')" class="hover:font-semibold">Dashboard</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href=" route('pengajar.kelas')" class="hover:font-semibold">Kelas</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="" class="hover:font-semibold">{{ $p1->kelas->nama }}
                        {{ $p1->kelas->tingkat_kelas }}</a>
                    <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    <a href="" class="hover:font-semibold">Pertemuan ke {{ $p1->pertemuan_ke }}</a>
                </div>

                <div class="border-b-2 border-baseBlue w-full flex gap-6 mt-7">
                    <button type="button" id="BahanAjarBtn"
                        class="rounded-t-lg bg-white py-2 px-4 text-white focus:font-semibold">Bahan Ajar</button>
                    <button type="button" id="absensiBtn"
                        class="rounded-t-lg py-2 px-4 bg-white text-baseBlue focus:font-semibold">Absensi</button>
                </div>

                <div id="BahanAjarContent" class="mt-6">
                    <div class="flex justify-between items-center mt-6">
                        <p class="text-subtitle font-semibold">Bahan Ajar</p>

                        <select wire:model="selectedBahan" wire:change="filter_detail_pertemuan" id="filterBahan"
                            class="w-44 bg-white border border-greyBorder text-greyIcon px-4 py-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                            <option value="">Filter</option>
                            <option value="Materi">Materi</option>
                            <option value="Latihan">Latihan</option>
                            <option value="Link">Link</option>
                        </select>
                    </div>

                    {{-- M A T E R I --}}

                    @if ($selectedBahan == 'Materi')
                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-6">
                                <p class="text-subtitle font-semibold">Materi</p>
                                @livewire('detail_pertemuan-materi', ['pertemuan' => $p1])
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->materi->isNotEmpty())
                                    @foreach ($groupedPertemuans->materi as $materi)
                                        <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $materi->nama_asli_file_materi }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p class="text-sm">
                                                            <span>Dapat diakses:</span>
                                                            {{ \Carbon\Carbon::parse($materi->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($materi->jam_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
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
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- L A T I H A N --}}
                    @elseif($selectedBahan == 'Latihan')
                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-10">
                                <p class="text-subtitle font-semibold">Latihan</p>
                                @livewire('detail_pertemuan-latihan', ['pertemuan' => $p1])
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->tugas->isNotEmpty())
                                    @foreach ($groupedPertemuans->tugas as $tugas)
                                        <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $tugas->nama_asli_file_tugas }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p class="text-sm">
                                                            <span>Akses:</span>
                                                            {{ \Carbon\Carbon::parse($tugas->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($tugas->jam_akses)->format('g:i A') }}
                                                            <br>
                                                            <span>Tenggat:</span>
                                                            {{ \Carbon\Carbon::parse($tugas->tgl_batas_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($tugas->jam_batas_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $tugas->file_tugas);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $tugas->file_tugas);
                                                    @endphp
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
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- L I N K --}}
                    @elseif($selectedBahan == 'Link')
                        <div class="flex justify-between items-center mt-10">
                            <p class="text-subtitle font-semibold">Link</p>
                            {{-- belum ada livewire link --}}
                        </div>
                        @if ($groupedPertemuans->link->isNotEmpty())
                            @foreach ($groupedPertemuans->link as $link)
                                <a href="{{ $link->url }}" target="_blank"
                                    style="display: block; margin-bottom: 10px; color: #007bff; text-decoration: none; font-size: 16px;">
                                    {{ $link->url }}
                                </a>
                            @endforeach
                        @endif

                        {{-- A L L --}}
                    @else
                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-6">
                                <p class="text-subtitle font-semibold">Materi</p>
                                @livewire('detail_pertemuan-materi', ['pertemuan' => $p1])
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->materi->isNotEmpty())
                                    @foreach ($groupedPertemuans->materi as $materi)
                                        <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $materi->nama_asli_file_materi }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p class="text-sm">
                                                            <span>Dapat diakses:</span>
                                                            {{ \Carbon\Carbon::parse($materi->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($materi->jam_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $materi->file_materi);
                                                    @endphp
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
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between items-center mt-10">
                                <p class="text-subtitle font-semibold">Latihan</p>
                                @livewire('detail_pertemuan-latihan', ['pertemuan' => $p1])
                            </div>

                            <div class="md:grid grid-cols-2 gap-20">
                                @if ($groupedPertemuans->tugas->isNotEmpty())
                                    @foreach ($groupedPertemuans->tugas as $tugas)
                                        <div class="shadow rounded-3xl p-4 h-fit">

                                            <!-- isi card -->
                                            <div class="flex justify-between items-center px-4 py-2">
                                                <div>
                                                    <div class="flex gap-3 items-center">
                                                        <i class="fa-regular fa-file"></i>

                                                        <a href=" $fileUrl " target="_blank">
                                                            {{ $tugas->nama_asli_file_tugas }} </a>
                                                    </div>
                                                    <div class="flex gap-4 mt-1 text-greyIcon text-smallContent">
                                                        <p class="text-sm">
                                                            <span>Akses:</span>
                                                            {{ \Carbon\Carbon::parse($tugas->tgl_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($tugas->jam_akses)->format('g:i A') }}
                                                            <br>
                                                            <span>Tenggat:</span>
                                                            {{ \Carbon\Carbon::parse($tugas->tgl_batas_akses)->translatedFormat('d F Y') }},
                                                            {{ \Carbon\Carbon::parse($tugas->jam_batas_akses)->format('g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-3 items-center">
                                                    <button></button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $tugas->file_tugas);
                                                    @endphp
                                                    <button onclick="window.open('{{ $fileUrl }}', '_blank')"">
                                                        <span class="material-symbols-outlined">visibility</span>
                                                    </button>

                                                    @php
                                                        $fileUrl = asset('storage/' . $tugas->file_tugas);
                                                    @endphp
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
                                                    <button><i
                                                            class="fa-solid fa-pen text-white p-1.5 bg-baseBlue rounded-full"></i></button>
                                                </div>
                                            </div>
                                            <!-- akhir dari isi card -->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

                <div id="absensiContent" class="hidden mt-6">
                    <p class="text-subtitle font-semibold">Absensi Siswa</p>
                </div>

            </div>
        </div>
    </div>
</div>
