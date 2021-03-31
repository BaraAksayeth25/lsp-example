<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function all(Request $r){
        $data = \DB::select("SELECT * FROM vmengajar");
        $data_guru = \DB::select("SELECT * FROM guru");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        $data_mapel = \DB::select("SELECT * FROM mapel");
        return view("admin.mengajar.data", ["menu" => "home", "role" => "admin", "mengajar" => $data, "guru" => $data_guru, "kelas" => $data_kelas, "mapel" => $data_mapel]);
    }
    public function hapus(Request $r, $id){
        \DB::delete("DELETE FROM mengajar WHERE id='$id'");
        return redirect()->route("view.admin.data-mengajar");
    }
    public function tambah(Request $r){
        $data_exist = \DB::select("SELECT * FROM mengajar WHERE id_mapel='$r->id_mapel' AND id_kelas='$r->id_kelas'");
        if(count($data_exist) > 0){
            return redirect()->route("view.admin.data-mengajar");
        }
        \DB::insert("INSERT INTO mengajar VALUES(null, '$r->nip', '$r->id_mapel', '$r->id_kelas')");
        return redirect()->route("view.admin.data-mengajar");
    }
    public function edit(Request $r){
        $data_exist = \DB::select("SELECT * FROM mengajar WHERE id_mapel='$r->id_mapel' AND id_kelas='$r->id_kelas'");
        if(count($data_exist) > 0){
            return redirect()->route("view.admin.data-mengajar");
        }
        \DB::update("UPDATE mengajar SET nip='$r->nip', id_mapel='$r->id_mapel', id_kelas='$r->id_kelas' WHERE id='$r->id'");
        return redirect()->route("view.admin.data-mengajar");
    }
    public function view_edit(Request $r, $id){
        $data = \DB::select("SELECT * FROM mengajar WHERE id='$id'");
        $data_guru = \DB::select("SELECT * FROM guru");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        $data_mapel = \DB::select("SELECT * FROM mapel");
        return view("admin.mengajar.edit", ["menu" => "home", "role" => "admin", "mengajar" => $data[0], "guru" => $data_guru, "kelas" => $data_kelas, "mapel" => $data_mapel]);
    }
}
