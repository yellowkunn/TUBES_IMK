<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata_siswa;

class SiswaController extends Controller
{
    public function formulirpendaftaran()
    {
        $user = Auth::user();
        $form = Biodata_siswa::where('pengguna_id', $user->id_pengguna)->first();
        $kelass = Kelas::all();
        return view('user.formulir_pendaftaran', compact('kelass'));
    }

    public function kirimformulirpendaftaran(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'gambar' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp|max:2048'
        ]);        
        $file = $request->file('gambar');
        if ($file) {
            // $judul = $request->get('gambar');
            $extension = $file->getClientOriginalExtension();
            $nama_file = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move(public_path('berkas_ujis'), $nama_file);
            $berkas = '' . $nama_file;
        }
        DB::select('call kirimformulirpendaftaran(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        array($request->get('id_pengguna'), $berkas,
        $request->get('namalengkap'), $request->get('gender'), 
        $request->get('tempatlahir'), $request->get('tanggallahir'), 
        $request->get('agama'), $request->get('kewarganegaraan'), 
        $request->get('alamat'), $request->get('notelp'),
        $request->get('nohp'),$request->get('pendidikanterakhir'),
        $request->get('diterimakursus'),$request->get('tingkat_kelas'),$request->get('namaortu'),
        $request->get('tempatlahirortu'),$request->get('tanggallahirortu'),
        $request->get('agamaortu'),$request->get('pendidikanortu'),
        $request->get('pekerjaanortu'),
        $request->get('kelas'), $request->get('status')));
        return redirect()->back();
    }

    public function detailkelas($kelas)
    {
        $kelass = Kelas::where('id_kelas', $kelas)->first();
        if (!$kelass) {
            abort(404); // Tampilkan halaman 404 jika kelas tidak ditemukan
        }
        $class = Kelas::whereNotIn('id_kelas', [$kelas])->get();
        return view('detail_tawaran_kelas', compact('kelass', 'class'));
    }
}
