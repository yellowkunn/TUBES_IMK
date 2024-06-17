<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class DaftarSiswa extends Component
{
    public $search = '';

    public function render()
    {
        $siswas = Siswa::whereIn('status', ['Aktif', 'TidakAktif'])
            ->leftJoin('users', 'siswa.pengguna_id', '=', 'users.id_pengguna')
            ->leftJoin('biodata_siswa', 'users.id_pengguna', '=', 'biodata_siswa.pengguna_id')
            ->select('siswa.*', DB::raw('IFNULL(biodata_siswa.nama_lengkap, "") as nama_siswa'))
            ->where(function($query) {
                $query->where(DB::raw('IFNULL(biodata_siswa.nama_lengkap, "")'), 'like', "%{$this->search}%");
            })
            ->orderBy('siswa.dibuat', 'asc')
            ->paginate(9);

        return view('livewire.daftar-siswa', compact('siswas'));
    }
}
