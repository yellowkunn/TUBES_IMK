<div>
    <form wire:submit="kehadiranSiswas" action="">
        @csrf
        <table class="min-w-full text-left text-sm font-light text-surface" style="color: #717171">
            <thead class="border-b border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
                <th scope="col" class="px-12 py-2">No.</th>
                <th scope="col" class="w-full px-12 py-2">Nama</th>
                <th scope="col" class="px-12 py-2">Kehadiran</th>
            </thead>
            <tbody class="bg-baseDarkerGreen/10">
                @php $nomor = 1; @endphp
                @if ($siswas->isNotEmpty() && (optional($siswaHadir->first())->status !== 'Hadir'))
                @foreach ($siswas as $siswa)
                        <tr>
                            <td class="px-12 py-4 font-semibold">{{ $nomor++ }}</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="{{ asset('berkas_ujis/' . $siswa->pengguna->foto_profile) }}"
                                    class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>{{ $siswa->pengguna->biodataSiswa->nama_lengkap }}</p>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" wire:model="kehadiran_siswas.{{ $siswa->id_siswa }}"
                                    value="{{ $siswa->id_siswa }}"
                                    class="bg-white/10 border-2 border-greyIcon rounded drop-shadow-regularShadow"
                                    name="" id="">
                                <input type="text" wire:model="pengajar"
                                    value="{{ $siswa->kelas->pengajar[0]->id_pengajar }}" style="display: none;">
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="mt-8 flex justify-end gap-6">
            <button type="reset" class="text-greyIcon hover:font-semibold">Reset</button>
            <button type="submit"
                class="text-baseDarkerGreen bg-white border-2 border-baseDarkerGreen p-1.5 px-5 rounded-lg hover:bg-baseDarkerGreen hover:text-white hover:font-semibold"
                style="box-shadow: 0px 4px 5px 0 rgba(105,212,220,0.3);">Simpan</button>
        </div>
    </form>


    <table class="min-w-full text-left text-sm font-light text-surface mt-10" style="color: #717171">
        <thead class="border-b border-neutral-200 font-semibold bg-greyBackground" style="color: #717171">
            <th scope="col" class="px-12 py-2">No.</th>
            <th scope="col" class="w-full px-12 py-2">Nama</th>
            <th scope="col" class="px-12 py-2">Hadir</th>
        </thead>
        <tbody class="bg-baseDarkerGreen/10">
            @php $nomor = 1; @endphp
<<<<<<< HEAD
            @if($siswas->isNotEmpty())
                @foreach($siswas as $siswa)
                <tr>
                    <td class="px-12 py-4 font-semibold">{{ $nomor++ }}</td>
                    <td class="px-12 py-4 flex items-center gap-4">
                        <img src="{{ asset('berkas_ujis/' . $siswa->pengguna->foto_profile) }}" class="w-10 h-10 object-cover rounded-full" alt="">
                        <p>{{ $siswa->pengguna->biodataSiswa->nama_lengkap }}</p>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" wire:model="kehadiran_siswas.{{ $siswa->id_siswa }}" value="{{ $siswa->id_siswa }}" class="rounded appearance-none checked:bg-baseDarkerGreen" name="" id="">
                        <input type="text" wire:model="pengajar" value="{{ $siswa->kelas->pengajar[0]->id_pengajar }}" style="display: none;">
                        </td>
                </tr>
=======
            @if ($siswaHadir->isNotEmpty())
                @foreach ($siswaHadir as $siswa)
                    @if ($siswa->status == 'Hadir')
                        <tr>
                            <td class="px-12 py-4 font-semibold">{{ $nomor++ }}</td>
                            <td class="px-12 py-4 flex items-center gap-4">
                                <img src="{{ asset('berkas_ujis/' . $siswa->siswa->pengguna->foto_profile) }}"
                                    class="w-10 h-10 object-cover rounded-full" alt="">
                                <p>{{ $siswa->siswa->pengguna->biodataSiswa->nama_lengkap }}</p>
                            </td>
                            <td></td>
                        </tr>
                    @endif
>>>>>>> 5cfca83c3e67fbdee6a843b574f3927d405f9ec8
                @endforeach
            @endif
        </tbody>
    </table>

</div>
