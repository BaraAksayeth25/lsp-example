<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $role_list = ["admin", "siswa", "guru"];
    public function view_home(Request $r, $role){
        if(!in_array($role, $this->role_list)){
            return redirect()->route("view.login", ["role" => "admin"]);
        }
        $role_check = $r->session()->get("role");
        if(!$r->session()->has("user") || $role_check !== $role){
            return redirect()->route("view.login", ["role" => $role]);
        }
        return view("$role.home", ["menu" => "home", "role" => $role, "user" => $r->session()->get("name")]);
    }
}
