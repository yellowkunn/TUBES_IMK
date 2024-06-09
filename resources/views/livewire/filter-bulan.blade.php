<div>
    <div class="flex justify-between items-center mt-12">
        <p class="text-subtitle font-semibold">Pertemuan yang telah dilakukan</p>
        <div>
            <select wire:model="selectedMonth" wire:change="filter_bulan_pertemuan" id="filterBulan" class="block appearance-none w-44 bg-white border border-greyBorder text-greyIcon px-4 py-2 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
                <option value="">Bulan</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
    </div>

    <!-- card pertemuan -->
    @if($filterBulan->isNotEmpty())
        @foreach($filterBulan as $pertemuan)
            <div class="bg-white p-5 px-8 rounded-lg shadow-meetCardShadow my-8">
                <div class="flex justify-between">
                    <div class="flex flex-col">
                        <p class="font-semibold">Pertemuan {{ $pertemuan->pertemuan_ke }}</p>
                        <p>{{ $pertemuan->judul }}</p>
                        <p class="text-greyIcon text-smallContent mt-3">{{ $pertemuan->tgl_pertemuan }}</p>
                    </div>
                    <div class="flex my-auto gap-6">
                        <p class="text-baseDarkerGreen bg-baseDarkerGreen/20 h-fit p-2 px-4 rounded-full">{{ $this->getMonthName($pertemuan->tgl_pertemuan) }}</p>
                        <a href=" route('pengajar.kelas.pertemuan') " class="bg-baseBlue/85 hover:bg-baseBlue text-white hover:font-semibold p-2 px-4 rounded-full">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="mt-6">Belum ada pertemuan yang dilakukan pada bulan {{ $this->selectedMonth }}</p>
    @endif
</div>
