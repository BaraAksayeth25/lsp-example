<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class SiswaController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM vsiswa");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        return view("admin.siswa.data", ["role" => "admin", "menu" => "home", "siswa" => $data, "kelas" => $data_kelas]);
    }
    public function hapus(Request $r, $nis){
        \DB::delete("DELETE FROM siswa WHERE nis='$nis'");
        return redirect()->route("view.admin.data-siswa");
    }
    public function tambah(Request $r){
        \DB::insert("INSERT INTO siswa VALUES('$r->nis', '$r->nama', '$r->jk', '$r->alamat', '$r->password', '$r->id_kelas')");
        return redirect()->route("view.admin.data-siswa");
    }
    public function edit(Request $r){
        \DB::update("UPDATE siswa SET nama='$r->nama', jk='$r->jk', alamat='$r->alamat', password='$r->password', id_kelas='$r->id_kelas' WHERE nis='$r->nis'");
        return redirect()->route("view.admin.data-siswa");
    }
    public function view_edit(Request $r, $nis){
        $data = \DB::select("SELECT * FROM siswa WHERE nis='$nis'");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        return view("admin.siswa.edit", ["menu" => "home", "role" => "admin", "siswa" => $data[0], "kelas" => $data_kelas]);
    }
}
