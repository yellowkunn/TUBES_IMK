<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function formulirpendaftaran()
    {
        return view('user.formulir_pendaftaran');
    }

    public function kirimformulirpendaftaran(Request $request)
    {
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
        DB::select('call kirimformulirpendaftaran(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        array($request->get('id_pengguna'), $berkas,
        $request->get('namalengkap'), $request->get('gender'), 
        $request->get('tempatlahir'), $request->get('tanggallahir'), 
        $request->get('agama'), $request->get('kewarganegaraan'), 
        $request->get('alamat'), $request->get('notelp'),
        $request->get('nohp'),$request->get('pendidikanterakhir'),
        $request->get('diterimakursus'),$request->get('namaortu'),
        $request->get('tempatlahirortu'),$request->get('tanggallahirortu'),
        $request->get('agamaortu'),$request->get('pendidikanortu'),
        $request->get('pekerjaanortu'),
        $request->get('kelas'), $request->get('status')));
        return redirect()->back();
    }
}
