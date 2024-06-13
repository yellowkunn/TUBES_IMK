<div>
<div class="flex justify-between items-center mt-12">
    <p class="md:text-subtitle font-semibold">Kelas Saya</p>
    <a href="{{ route('kelas') }}" class="text-[#00e]">Selengkapnya</a>
</div>

<div class="sm:flex gap-6 mt-4 mb-3 md:mb-8">
    <!-- filter bds kelas aktif/tdk -->
    <div class="mb-3 md:mb-0">
        <select wire:model="filterkelas" wire:change="filter_kelas" id="filterKelas" class="block appearance-none w-full sm:w-48 bg-white border border-greyBorder text-greyIcon px-4 py-2.5 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-greyIcon">
            <option value="Aktif">Kelas Aktif</option>
            <option value="Tidak_aktif">Kelas Tidak Aktif</option>
        </select>
    </div>
    <!-- akhir dari filter -->
</div>

<!-- daftar kelas -->
<div class="sm:grid grid-cols-2 gap-4 lg:gap-12 mt-8">
    @php
    $i = 1;
    @endphp
    {{-- @foreach($siswas as $siswa)
    @php
    $kelas = $siswa->kelas;
    @endphp
    @if($kelas && $i <= 4)
    @php 
    $i++;
    @endphp --}}
    @if($filterkelas == 'Aktif')
    @foreach($siswa as $kelas)
    @if($kelas->status == 'Aktif')
    <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0 group">
        <p class="font-semibold md:text-[20px] lg:text-subtitle">
            {{ $kelas->kelas->nama }}
        </p>
        <div class="flex items-center">
            @if($kelas->kelas->foto)
            <img src="{{ asset('berkas_ujis/' . $kelas->kelas->foto) }}" alt="{{ $kelas->kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
            @else
            <p class="text-greyIcon">Foto tidak tersedia</p>
            @endif
        </div>
        
        <div class="flex flex-col gap-1">
            <div class="flex gap-2 items-center mt-2">
                <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                <p class="my-auto font-normal">
                    {{ $kelas->kelas->jadwal_hari }}
                </p>
            </div>
            <div class="flex gap-2 items-center">
                <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                <p class="my-auto font-normal">
                    {{ $kelas->kelas->durasi }} /sesi
                </p>
            </div>
        </div>

        <button wire:click="baru_diakses({{ $kelas->kelas_id }})"
            onclick="window.location.href = '{{ route('programkelas', ['kelas' => $kelas->kelas_id]) }}';"
            class="text-center text-white group-hover:font-semibold bg-baseBlue/80 group-hover:bg-baseBlue w-full rounded-lg py-2 mt-4">
        Lihat Detail
    </button>
    
    
    
        
        <div class="absolute bg-baseBlue/80 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
    </div>
    @endif
    @endforeach

@elseif($filterkelas == 'Tidak_aktif')
@foreach($siswa as $kelas)
    @if($kelas->status == 'TidakAktif')
    <div class="p-6 lg:p-8 px-8 md:px-6 lg:px-10 bg-white drop-shadow-regularShadow rounded-lg flex flex-col gap-2 my-8 sm:my-4 md:my-0 group">
        <p class="font-semibold md:text-[20px] lg:text-subtitle">
            {{ $kelas->kelas->nama }}
        </p>
        <div class="flex items-center">
            @if($kelas->kelas->foto)
            <img src="{{ asset('berkas_ujis/' . $kelas->kelas->foto) }}" alt="{{ $kelas->kelas->nama }}" class="my-2 max-h-52 md:max-h-56 lg:max-h-44 w-full object-cover rounded-lg">
            @else
            <p class="text-greyIcon">Foto tidak tersedia</p>
            @endif
        </div>
        
        <div class="flex flex-col gap-1">
            <div class="flex gap-2 items-center mt-2">
                <span class="material-symbols-outlined text-[20px]">calendar_today</span>  
                <p class="my-auto font-normal">
                    {{ $kelas->kelas->jadwal_hari }}
                </p>
            </div>
            <div class="flex gap-2 items-center">
                <i class="fa-lg fa-regular fa-clock fa-sm"></i>  
                <p class="my-auto font-normal">
                    {{ $kelas->kelas->durasi }} /sesi
                </p>
            </div>
        </div>

        <a href="{{ route('programkelas', ['kelas' => $kelas->kelas_id]) }}"
            class="text-center text-white group-hover:font-semibold bg-baseBlue/80 group-hover:bg-baseBlue w-full rounded-lg py-2 mt-4">Lihat Detail
        </a>
        
        <div class="absolute bg-baseBlue/80 group-hover:bg-baseBlue h-1 rounded-full bottom-0 left-1/2 transform -translate-x-1/2 w-1/4 group-hover:w-2/3 duration-500"></div>
    </div>
    @endif
    @endforeach
@endif
</div>
</div>