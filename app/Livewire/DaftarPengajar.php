<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengajar;
use Illuminate\Support\Facades\DB;

class DaftarPengajar extends Component
{
    public $search;
    public function render()
    {
        $pengajars = Pengajar::leftJoin('users', 'pengajar.pengguna_id', '=', 'users.id_pengguna')
            ->leftJoin('biodata_pengajar', 'users.id_pengguna', '=', 'biodata_pengajar.pengguna_id')
            ->select('pengajar.*', DB::raw('IFNULL(biodata_pengajar.nama_lengkap, "") as nama_pengajar'))
            ->where(function($query) {
                $query->where(DB::raw('IFNULL(biodata_pengajar.nama_lengkap, "")'), 'like', "%{$this->search}%");
            })
            ->orderBy('pengajar.dibuat', 'asc')
            ->paginate(9);


        
        return view('livewire.daftar-pengajar', compact('pengajars'));
    }
}
