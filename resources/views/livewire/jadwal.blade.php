<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-col gap-8">
        <form wire:submit.prevent="pilihJadwal">
            @csrf
            <div class="md:flex justify-between">
                <button type="button" wire:click="pilihJadwal('senin')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Sen
                </button>
                <button type="button" wire:click="pilihJadwal('selasa')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Sel
                </button>
                <button type="button" wire:click="pilihJadwal('rabu')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Rab
                </button>
                <button type="button" wire:click="pilihJadwal('kamis')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Kam
                </button>
                <button type="button" wire:click="pilihJadwal('jumat')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Jum
                </button>
                <button type="button" wire:click="pilihJadwal('sabtu')"
                    class="m-2 md:m-0 bg-white border-2 focus:bg-baseBlue/10 focus:font-semibold focus:text-baseBlue border-neutral-200 focus:border-baseBlue rounded-lg p-2 px-8 drop-shadow-regularShadow">
                    Sab
                </button>
            </div>
        </form>
        @if($classes)
        @foreach ($classes as $kelas)
        <div class="w-full p-5 px-8 flex justify-between bg-white drop-shadow-regularShadow rounded-lg">
            
            <p>{{ $kelas->jam }}</p>
            <p>{{ $kelas->nama }}</p>
            <p>{{ $kelas->tingkat_kelas }}</p>
            <p>{{ $kelas->durasi }}</p>
        </div>
        @endforeach
        @elseif(session('message'))
        <div class="mt-4">
            <h2 class="text-lg font-semibold">No classes found for {{ ucfirst(session('message')) }}</h2>
        </div>
        @endif
    </div>
</div>
