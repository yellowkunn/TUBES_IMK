<div>
    @include('livewire.includes.search-pengatur-ruangan')

<div id="siswaContent">
    <div class="bg-white drop-shadow-regularShadow py-3 my-5 rounded-lg border overflow-x-auto">

        <!-- tabel siswa -->
        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white"
            style="color: #191919">
            <thead class="border-b-2 border-neutral-200 font-semibold bg-greyBackground"
                style="color: #717171">
                <th scope="col" class= "w-2 px-8 py-3">No.</th>
                <th scope="col" class= "px-8 py-3">Nama Lengkap</th>
                <th scope="col" class= "px-8 py-3">Tingkat</th>
                <th scope="col" class= "px-8 py-3">Kelas</th>
                <th scope="col" class= "px-8 py-3">Hari</th>
                <th scope="col" class= "px-8 py-3">Waktu</th>
                <th scope="col" class= "px-8 py-3">Status</th>
                <th scope="col" class= "px-8 py-3">Aksi</th>
            </thead>

            <tbody>
                @php $nomor = ($siswas->currentPage() - 1) * $siswas->perPage() + 1; @endphp
                @if ($siswas)
                    @foreach ($siswas as $siswa)
                        <tr class="bg-greyBackground">
                            <td class="px-8 py-4">{{ $nomor++ }}</td>
                            <td class="px-8 py-4">
                                {{ $siswa->pengguna->biodataSiswa->nama_lengkap ?? '-' }}
                            </td>
                            <td class="px-8 py-4">
                                {{ $siswa->pengguna->biodataSiswa->tingkat_kelas ?? '-' }}
                            </td>
                            <td class="px-8 py-4">{{ $siswa->kelas->nama ?? '-' }}
                            </td>
                            <td class="px-8 py-4">
                                {{ $siswa->kelas->jadwal_hari ?? '-' }}</td>
                            <td class="px-8 py-4">
                                {{ $siswa->jam_kelas ?? '-' }}
                            </td>
                            <td class="px-8 py-4">
                                {{-- {{ $siswa->kelas->pengajar->first()?->pengguna->biodataPengajar->nama_lengkap ?? '-' }} --}}
                                {{ $siswa->status ?? '-' }}
                            </td>
                            <td class="px-8 py-4 flex items-center gap-4">

                                <button
                                    onclick="showPopupUploadSertif({{ $siswa->pengguna->biodataSiswa->id_biodata ?? '0' }})"
                                    id="sertif">
                                    <span
                                        class="material-symbols-outlined text-greyIcon mt-1.5">workspace_premium</span>
                                </button>
                                <button
                                    onclick="showPopupHapusDataSiswa({{ $siswa->id_siswa }})"><i
                                        class="fa-regular fa-trash-can fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- akhir dari tabel siswa -->
    </div>
    <div class="mt-6">
        {{ $siswas->links() }}
    </div>
</div>
</div>