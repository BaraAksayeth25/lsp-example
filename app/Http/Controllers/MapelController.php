<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM mapel");
        return view("admin.mapel.data", ["menu" => "home", "role" => "admin", "mapel" => $data]);
    }
    public function tambah(Request $r){
        \DB::insert("INSERT INTO mapel VALUES(null, '$r->kode', '$r->nama')");
        return redirect()->route("view.admin.data-mapel");
    }
    public function view_edit(Request $r, $id){
        $data = \DB::select("SELECT * FROM mapel WHERE id='$id'");
        return view("admin.mapel.edit", ["menu" => "home", "role" => "admin", "mapel" => $data[0]]);
    }
    public function edit(Request $r){
        \DB::update("UPDATE mapel SET kode='$r->kode', nama='$r->nama' WHERE id='$r->id'");
        return redirect()->route("view.admin.data-mapel");
    }
   public function hapus(Request $r, $id){
       \DB::delete("DELETE FROM mapel WHERE id='$id'");
        return redirect()->route("view.admin.data-mapel");
   }
}
