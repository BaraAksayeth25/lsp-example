<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM jurusan");
        return view("admin.jurusan.data", ["menu" => "home", "role" => "admin", "jurusan" => $data]);
    }
    public function hapus(Request $r, $id){
        \DB::delete("DELETE FROM jurusan WHERE id='$id'");
        return redirect()->route("view.admin.data-jurusan");
    }
    public function tambah(Request $r){
        \DB::insert("INSERT INTO jurusan VALUES(null, '$r->nama')");
        return redirect()->route("view.admin.data-jurusan");
    }
    public function edit(Request $r){
        \DB::update("UPDATE jurusan SET nama='$r->nama' WHERE id='$r->id'");
        return redirect()->route("view.admin.data-jurusan");
    }
    public function view_edit(Request $r, $id){
        $data = \DB::select("SELECT * FROM jurusan WHERE id='$id'");
        return view("admin.jurusan.edit", ["menu" => "home", "role" => "admin", "jurusan" => $data[0]]);
    }
}
