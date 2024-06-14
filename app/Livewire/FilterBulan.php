<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pertemuan;
use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\BaruDiakses;
use Illuminate\Support\Facades\Auth;


class FilterBulan extends Component
{
    public $selectedMonth;
    public $filterBulan;
    public $kelas;
    public $pertemuan;

    public function mount(Kelas $kelas)
    {
        // Set the default selected month to the current month
        // $currentMonthNumber = Carbon::now()->format('m');
        // $months = [
        //     '01' => 'Januari',
        //     '02' => 'Februari',
        //     '03' => 'Maret',
        //     '04' => 'April',
        //     '05' => 'Mei',
        //     '06' => 'Juni',
        //     '07' => 'Juli',
        //     '08' => 'Agustus',
        //     '09' => 'September',
        //     '10' => 'Oktober',
        //     '11' => 'November',
        //     '12' => 'Desember'
        // ];
        // tampilkan semua data pertemuan yang telah dilakukan sebelumnya
        // $this->filterBulan = Pertemuan::where('kelas_id', $this->kelas->id_kelas)
        //         ->whereDate('tgl_pertemuan', '<', Carbon::now())
        //         ->get();

        $this->kelas = $kelas;

        $this->filter_bulan_pertemuan();
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
            $this->filterBulan = Pertemuan::where('kelas_id', $this->kelas->id_kelas)
                ->whereDate('tgl_pertemuan', '<', Carbon::now())
                ->get();
        }
    }

    public function getMonthName($date)
    {
        $monthNumber = Carbon::parse($date)->format('m');
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
        return $months[$monthNumber];
    }


    public function baru_diakses($pertemuan_id)
    {
        $pertemuan = Pertemuan::find($pertemuan_id);
        if (!$pertemuan) {
            // Jika kelas tidak ditemukan, bisa Anda tambahkan logika untuk menangani hal ini
            return;
        }

        $pengguna_id = Auth::user()->id_pengguna;

        // Cek apakah sudah ada data dengan kelas_id yang sama
        $baruDiakses = BaruDiakses::where('pertemuan_id', $pertemuan_id)->first();

        if ($baruDiakses) {
            // Jika ada, update data
            $baruDiakses->update([
                'pengguna_id' => $pengguna_id,
                'pertemuan_id' => $pertemuan_id,
                'baru_diakses' => now()->toTimeString(), // Waktu saat fungsi dijalankan
            ]);
        } else {
            // Jika tidak ada, buat data baru
            BaruDiakses::insert([
                'pengguna_id' => $pengguna_id,
                'pertemuan_id' => $pertemuan_id,
                'baru_diakses' => now()->toTimeString(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.filter-bulan', [
            'filterBulan' => $this->filterBulan,
        ]);
    }
}
