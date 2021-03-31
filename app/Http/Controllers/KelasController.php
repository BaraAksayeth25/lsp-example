<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM vkelas");
        $data_jurusan = \DB::select("SELECT * FROM jurusan");
        return view("admin.kelas.data", ["menu" => "home", "role" => "admin", "kelas" => $data, "jurusan" => $data_jurusan]);
    }
    public function tambah(Request $r){
        \DB::insert("INSERT INTO kelas VALUES(null, '$r->nama', '$r->id_jurusan')");
        return redirect()->route("view.admin.data-kelas");
    }
    public function hapus(Request $r, $id){
        \DB::delete("DELETE FROM kelas WHERE id='$id'");
        return redirect()->route("view.admin.data-kelas");
    }
    public function view_edit(Request $r, $id){
        $data = \DB::select("SELECT * FROM kelas WHERE id='$id'");
        $data_jurusan = \DB::select("SELECT * FROM jurusan");
        return view("admin.kelas.edit", ["menu" => "home", "role" => "admin", "kelas" => $data[0], "jurusan" => $data_jurusan]);
    }
    public function edit(Request $r){
        \DB::update("UPDATE kelas SET nama='$r->nama', id_jurusan='$r->id_jurusan' WHERE id='$r->id'");
        return redirect()->route("view.admin.data-kelas");
    }
}
