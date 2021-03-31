<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function nilai_siswa(Request $r){
        $nis = $r->session()->get("user");
        $data = \DB::select("SELECT * FROM vnilai WHERE nis='$nis'");
        return view("siswa.data-nilai", ["menu" => "home", "role" => "siswa", "nilai" => $data, "user" => $r->session()->get("name")]);
    }

    public function view_data(Request $r){
        $nip = $r->session()->get("user");
        $data = \DB::select("SELECT * FROM vnilai WHERE nip='$nip'");
        $data_mengajar = \DB::select("SELECT * FROM vmengajar WHERE nip='$nip'");
        return view("guru.nilai.data", [ "user" => $r->session()->get("name"), "menu" => "home", "role" => "guru", "nilai" => $data, "mengajar" => $data_mengajar]);
    }
    public function hapus(Request $r, $id){
        \DB::delete("DELETE FROM nilai WHERE id='$id'");
        return redirect()->route("view.guru.data-nilai");
    }
    public function edit(Request $r){
        $na = number_format(($r->uts + $r->uas + $r->uh) / 3, 2);
        \DB::update("UPDATE nilai SET uh='$r->uh', uts='$r->uts', uas='$r->uas', na='$na' WHERE id='$r->id'");
        return redirect()->route("view.guru.data-nilai");
    }
    public function view_edit(Request $r, $id){
        $data = \DB::select("SELECT * FROM vnilai WHERE id='$id'");
        return view("guru.nilai.edit", ["menu" => "home", "role" => "guru", "nilai" => $data[0]]);
    }
    public function view_tambah(Request $r, $id){
        $data_mengajar = \DB::select("SELECT * FROM mengajar WHERE id='$id'");
        if(count($data_mengajar) === 0){
            return redirect()->route("view.guru.data-nilai");
        }
        $id_kelas = $data_mengajar[0]->id_kelas;
        $data_siswa = \DB::select("SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
        $data_vmengajar = \DB::select("SELECT * FROM vmengajar where id='$id'");
        return view("guru.nilai.tambah", ["role" => "guru", "menu" => "home", "mengajar" => $data_vmengajar[0], "siswa" => $data_siswa, "user" => $r->session()->get("name")]);
    }
    public function tambah(Request $r){
         $na = number_format(($r->uts + $r->uas + $r->uh) / 3, 2);
         \DB::insert("INSERT INTO nilai VALUES(null, '$r->uh', '$r->uts', '$r->uas', '$na', '$r->id_mengajar', '$r->nis')");
         return redirect()->route("view.guru.data-nilai");
    }
}
