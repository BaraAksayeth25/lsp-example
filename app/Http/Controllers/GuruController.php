<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM guru");
        return view("admin.guru.data", ["menu" => "home", "role" => "admin", "guru" => $data]);
    }
    public function edit(Request $r){
        \DB::update("UPDATE guru SET nama='$r->nama', jk='$r->jk', alamat='$r->alamat', password='$r->password' WHERE nip='$r->nip'");
        return redirect()->route("view.admin.data-guru");
    }
    public function tambah(Request $r){
        \DB::insert("INSERT INTO guru VALUES('$r->nip', '$r->nama', '$r->jk', '$r->alamat', '$r->password')");
        return redirect()->route("view.admin.data-guru");
    }
    public function hapus(Request $r, $nip){
        \DB::delete("DELETE FROM guru WHERE nip='$nip'");
        return redirect()->route("view.admin.data-guru");
    }
    public function view_edit(Request $r, $nip){
        $data = \DB::select("SELECT * FROM guru WHERE nip='$nip'");
        return view("admin.guru.edit", ["menu" => "home", "role" => "admin", "guru" => $data[0]]);
    }
}
