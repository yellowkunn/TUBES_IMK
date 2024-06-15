<div class="my-8 flex flex-col gap-6">
    <!-- perulangan pertemuan -->
    @if (collect($groupedPertemuans)->isNotEmpty())
        @foreach ($groupedPertemuans as $index => $pertemuan)
            <!-- Tambahkan $index untuk membuat ID unik -->
            <div class="dropdown group" data-index="{{ $index }}">
                <div id="tabPertemuan-{{ $index }}"
                    class="rounded-xl drop-shadow-regularShadow bg-white dark:bg-[#374151]/40 p-4 px-8 flex justify-between items-center relative">
                    <div>
                        <div>
                            <div
                                class="bg-baseBlue h-1/3 group-hover:h-1/2 absolute top-[3.5vh] group-hover:top-5 left-4 rounded-full transform -translate-x-1/2 duration-300 w-1">
                            </div>
                        </div>
                        <div class="ms-1">
                            <p class="font-semibold">Pertemuan {{ $pertemuan->pertemuan_ke }}</p>
                            <p class="text-smallContent">pertemuan {{ $pertemuan->judul }}</p>
                        </div>
                    </div>
                    <button id="iconDD-{{ $index }}" wire:click="newAccess({{ $pertemuan->id_pertemuan }})">
                        <!-- Modifikasi ID agar unik -->
                        <i class="fa-solid fa-caret-right text-baseBlue"></i>
                    </button>
                </div>

                <div id="contentPertemuan-{{ $index }}" class="hidden" wire:ignore>
                    <!-- Modifikasi ID agar unik -->
                    <div
                        class="bg-white dark:bg-[#374151]/40 p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-2.5">
                        <p class="font-semibold">Materi</p>
                    </div>

                    <div class="bg-baseCream w-full rounded-b-xl">
                        <div class="grid divide-y-2">
                            @if ($pertemuan->materi->isNotEmpty())
                                <div class="flex gap-4 px-8 p-1.5 text-greyIcon text-smallContent">
                                    <p>
                                        <span class="font-semibold">Dapat diakses:</span>
                                        {{ \Carbon\Carbon::parse($pertemuan->materi[0]->tgl_akses)->translatedFormat('d F Y') }},
                                        {{ \Carbon\Carbon::parse($pertemuan->materi[0]->jam_akses)->format('g:i A') }}
                                    </p>
                                </div>
                                @foreach ($pertemuan->materi as $materi)
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        @php
                                            $fileUrl = asset('storage/' . $materi->file_materi);
                                        @endphp
                                        <a href="{{ $fileUrl }}"
                                            target="_blank">{{ $materi->nama_asli_file_materi }}</a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                    <div
                        class="bg-white dark:bg-[#374151]/40 p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                        <p class="font-semibold">Latihan</p>
                    </div>

                    <div class="bg-baseCream w-full rounded-b-xl">
                        @if ($pertemuan->tugas->isNotEmpty())
                            <div class="grid divide-y-2">
                                <div class="flex gap-8 px-8 p-1.5 text-greyIcon text-smallContent">
                                    <div class="flex gap-4">
                                        <p>
                                            <span class="font-semibold">Dapat diakses:</span>
                                            {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->tgl_akses)->translatedFormat('d F Y') }},
                                            {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->jam_akses)->format('g:i A') }}
                                        </p>
                                    </div>
                                    <div class="flex gap-4">
                                        <p>
                                            <span class="font-semibold">Tenggat:</span>
                                            {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->tgl_batas_akses)->translatedFormat('d F Y') }},
                                            {{ \Carbon\Carbon::parse($pertemuan->tugas[0]->jam_batas_akses)->format('g:i A') }}
                                        </p>
                                    </div>
                                </div>
                                @foreach ($pertemuan->tugas as $tugas)
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        @php
                                            $fileUrl = asset(
                                                'storage/' . $pertemuan->tugas[0]->file_materi,
                                            );
                                        @endphp
                                        <a href="{{ $fileUrl }}"
                                            target="_blank">{{ $pertemuan->tugas[0]->nama_asli_file_tugas }}</a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>



                    <div
                        class="bg-white dark:bg-[#374151]/40 p-3 px-8 w-full rounded-t-xl drop-shadow-[0px_0px_2px_rgba(0,0,0,0.1)] mt-3">
                        <p class="font-semibold">Link</p>
                    </div>

                    <div class="bg-baseCream w-full rounded-b-xl">
                        @if ($pertemuan->link->isNotEmpty())
                            <div class="grid divide-y-2">
                                @foreach ($pertemuan->link as $link)
                                    <div class="flex gap-3 p-3 px-8 items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <a href="{{ $link->url }}" target="_blank"
                                            style="display: block; text-decoration: none; font-size: 16px;">
                                            {{ $link->url }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div
            class="rounded-xl drop-shadow-regularShadow bg-white p-4 px-8 flex justify-between items-center relative">
            <div>
                <div>
                    <div
                        class="bg-baseBlue h-1/3 group-hover:h-1/2 absolute top-[3.5vh] group-hover:top-5 left-4 rounded-full transform -translate-x-1/2 duration-300 w-1">
                    </div>
                </div>
                <div class="ms-1">
                    <p class="font-semibold">Belum ada pertemuan </p>
                    <p class="text-smallContent">~</p>
                </div>
            </div>
        </div>
    @endif

    <!-- akhir dari perulangan pertemuan -->
</div>
