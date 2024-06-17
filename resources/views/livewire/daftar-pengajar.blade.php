<div>
    <div class="md:flex justify-between items-center mt-4 my-7">
        <p class="text-title font-semibold mb-4 md:mb-0">Daftar Pengajar</p>

        <div class="sm:flex gap-4">
            @include('livewire.includes.search')
            <button onclick="showPopupTambahPengajar()"
                class="w-full sm:w-fit bg-baseBlue/5 hover:bg-baseBlue/10 border-2 border-baseBlue/80 flex items-center gap-3 px-3 py-2 rounded-lg">
                <i class="fa-solid fa-plus p-1 px-[5px] rounded-full text-white bg-baseBlue"></i>
                <p class="text-greyIcon font-semibold">Tambah pengajar</p>
            </button>
        </div>
    </div>

    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">
        <!-- tabel pengajar -->
        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
            style="color: #191919">
            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                style="color: #717171">
                <th scope="col" class= "w-2 px-8 py-3">No.</th>
                <th scope="col" class= "px-8 py-3">Nama Lengkap</th>
                <th scope="col" class= "px-8 py-3">Jabatan</th>
                <th scope="col" class= "px-8 py-3">Kelas</th>
                <th></th>
                <th scope="col" class= "px-8 py-3 text-center">Aksi</th>
            </thead>

            <tbody>
                @if ($pengajars)
                    @php
                        $i = 1;
                        $no = 1;
                    @endphp
                    @foreach ($pengajars as $pengajar)
                        <tr class="border-b border-neutral-200">
                            <td class="px-8 py-4 font-semibold">{{ $no++ }}.</td>
                            <td class="px-8 py-4">
                                <div class="flex gap-2 items-center">
                                    <img src="{{ asset('berkas_ujis/' . $pengajar->pengguna->foto_profile ?? 'default.jpg') }}"
                                        alt="pic" class="w-10 h-10 object-cover rounded-full">
                                    <p class="font-semibold">
                                        {{ $pengajar->pengguna->biodataPengajar->nama_lengkap ?? '-' }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-8 py-4">{{ $pengajar->jabatan ?? '-' }}</td>
                            <td class="px-8 py-4">{{ $pengajar->kelas->nama ?? '-' }}</td>
                            <td class="py-4">
                                <button
                                    onclick="showPopupUploadSertif({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                    id="sertif">
                                    <span
                                        class="material-symbols-outlined text-greyIcon mt-1.5">workspace_premium</span>
                                </button>
                            </td>
                            <td class="px-8 py-6 flex items-center gap-4 justify-center">
                                <button
                                    onclick="showPopupDetailPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                    class="text-baseBlue font-semibold w-16 h-8 rounded hover:bg-white hover:border-2 hover:border-baseBlue focus:bg-baseBlue focus:text-white">Detail</button>
                                <button
                                    onclick="showPopupEditPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                    class="flex items-center gap-2">
                                    <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                </button>
                                <button
                                    onclick="showPopupHapusPengajar({{ $pengajar->pengguna->biodataPengajar->id_biodata ?? '0' }})"
                                    class="flex items-center gap-2">
                                    <i class="fa-regular fa-trash-can fa-lg"></i>
                                </button>
                            </td>
                        </tr>
    </div>
    @php
        $i++;
    @endphp
    @endforeach
    @endif
    </tbody>
    </table>
    <!-- akhir dari tabel pengajar -->
</div>
</div>
</div>
