<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $role_list = ["admin", "guru", "siswa"];
    public function login(Request $r, $role){   
        if(!in_array($role, $this->role_list)){
            return redirect()->route("view.login", ["role" => "admin"]);
        }
        $data = null;
        if($role === "admin"){
            $data = \DB::select("SELECT * FROM admin WHERE username='$r->username' AND password='$r->password'");
            if(count($data) === 0){
                return redirect()->route("view.login", ["role" => "admin"]);
            }
            session([
                "user" => $data[0]->username,
                "name" => $data[0]->username,
                "role" => "admin"
            ]);
        }else if($role === "siswa"){
            $data = \DB::select("SELECT * FROM siswa WHERE nis='$r->nis' AND password='$r->password'");
            if(count($data) === 0){
                return redirect()->route("view.login", ["role" => "admin"]);
            }
            session([
                "user" => $data[0]->nis,
                "name" => $data[0]->nama,
                "role" => "siswa"
            ]);
        }else if($role === "guru"){
            $data = \DB::select("SELECT * FROM guru WHERE nip='$r->nip' AND password='$r->password'");
            if(count($data) === 0){
                return redirect()->route("view.login", ["role" => "admin"]);
            }
            session([
                "user" => $data[0]->nip,
                "name" => $data[0]->nama,
                "role" => "guru"
            ]);
        }
        return redirect()->route("view.home", ["role" => $role]);
    }
    public function view_login(Request $r, $role){
        if(!in_array($role, $this->role_list)){
            return redirect()->route("view.login", ["role" => "admin"]);
        }
        $role_check = $r->session()->get("role");
        if($r->session()->has("user") && $role === $role_check){
            return redirect()->route("view.home", ["role" => $role]);
        }
        return view("$role.login", ["role" => $role, "menu" => "login"]);
    }

    public function logout(Request $r){
        $role_check = $r->session()->get("role");
        $r->session()->forget(["user", "name", "role"]);
        return redirect()->route("view.login", ["role" => $role_check ?? "admin"]);
    }
}
