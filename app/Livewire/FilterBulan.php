<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pertemuan;
use Carbon\Carbon;
use App\Models\Kelas;


class FilterBulan extends Component
{
    public $selectedMonth;
    public $filterBulan;
    public $kelas;

    public function mount(Kelas $kelas)
    {
        // Set the default selected month to the current month
        $currentMonthNumber = Carbon::now()->format('m');
        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $this->selectedMonth = $months[$currentMonthNumber];

        // Initialize filterBulan with the current month's data
        $this->filter_bulan_pertemuan();

        $this->kelas = $kelas;
    }

    public function filter_bulan_pertemuan()
    {
        $months = [
            'Januari' => '01',
            'Februari' => '02',
            'Maret' => '03',
            'April' => '04',
            'Mei' => '05',
            'Juni' => '06',
            'Juli' => '07',
            'Agustus' => '08',
            'September' => '09',
            'Oktober' => '10',
            'November' => '11',
            'Desember' => '12'
        ];

        $monthNumber = $months[$this->selectedMonth] ?? null;

        if ($monthNumber) {
            $this->filterBulan = Pertemuan::whereMonth('tgl_pertemuan', $monthNumber)
                ->where('kelas_id', $this->kelas->id_kelas)
                ->get();
        } else {
            $this->filterBulan = collect();
        }
    }

    public function render()
    {
        return view('livewire.filter-bulan', [
            'filterBulan' => $this->filterBulan,
        ]);
    }
}
