<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('view.login', ['role' => 'admin']);
});

Route::group([
    "prefix" => "auth"
], function(){
    Route::get("{role}/login", "LoginController@view_login")->name("view.login");
    Route::post("{role}/login", "LoginController@login")->name("login");
    Route::get("logout", "LoginController@logout")->name("logout");
});

Route::get("{role}/home", "HomeController@view_home")->name("view.home");

Route::group([
    "prefix" => "siswa",
    "middleware" => "auth:siswa"
], function(){
    Route::get("data-nilai", "NilaiController@nilai_siswa")->name("view.siswa.data-nilai");
});

Route::group([
    "prefix" => "guru",
    "middleware" => "auth:guru"
], function(){
    Route::prefix("nilai")->group(function(){
        Route::get("/data", "NilaiController@view_data")->name("view.guru.data-nilai");
        Route::get("tambah/{id}", "NilaiController@view_tambah")->name("view.guru.tambah-nilai");
        Route::get("delete/{id}", "NilaiController@hapus")->name("guru.hapus-nilai");
        Route::get("edit/{id}", "NilaiController@view_edit")->name("view.guru.edit-nilai");
        Route::post("tambah", "NilaiController@tambah")->name("guru.tambah-nilai");
        Route::post("edit", "NilaiController@edit")->name("guru.edit-nilai");
    });
});

Route::group([
    "prefix" => "admin",
    "middleware" => "auth:admin"
], function(){
    Route::prefix("mapel")->group(function(){
        Route::get("data", "MapelController@all")->name("view.admin.data-mapel");
        Route::get("edit/{id}", "MapelController@view_edit")->name("view.admin.edit-mapel");
        Route::get("hapus/{id}", "MapelController@hapus")->name("admin.hapus-mapel");
        Route::post("tambah", "MapelController@tambah")->name("admin.tambah-mapel");
        Route::post("edit", "MapelController@edit")->name("admin.edit-mapel");
    });
    Route::prefix("jurusan")->group(function(){
        Route::get("data", "JurusanController@all")->name("view.admin.data-jurusan");
        Route::get("edit/{id}", "JurusanController@view_edit")->name("view.admin.edit-jurusan");
        Route::get("hapus/{id}", "JurusanController@hapus")->name("admin.hapus-jurusan");
        Route::post("tambah", "JurusanController@tambah")->name("admin.tambah-jurusan");
        Route::post("edit", "JurusanController@edit")->name("admin.edit-jurusan");
    });
    Route::prefix("kelas")->group(function(){
        Route::get("data", "KelasController@all")->name("view.admin.data-kelas");
        Route::get("edit/{id}", "KelasController@view_edit")->name("view.admin.edit-kelas");
        Route::get("hapus/{id}", "KelasController@hapus")->name("admin.hapus-kelas");
        Route::post("tambah", "KelasController@tambah")->name("admin.tambah-kelas");
        Route::post("edit", "KelasController@edit")->name("admin.edit-kelas");
    });
    Route::prefix("siswa")->group(function(){
        Route::get("data", "SiswaController@all")->name("view.admin.data-siswa");
        Route::get("edit/{nis}", "SiswaController@view_edit")->name("view.admin.edit-siswa");
        Route::get("hapus/{nis}", "SiswaController@hapus")->name("admin.hapus-siswa");
        Route::post("tambah", "SiswaController@tambah")->name("admin.tambah-siswa");
        Route::post("edit", "SiswaController@edit")->name("admin.edit-siswa");
    });
    Route::prefix("guru")->group(function(){
        Route::get("data", "GuruController@all")->name("view.admin.data-guru");
        Route::get("edit/{nip}", "GuruController@view_edit")->name("view.admin.edit-guru");
        Route::get("hapus/{nip}", "GuruController@hapus")->name("admin.hapus-guru");
        Route::post("tambah", "GuruController@tambah")->name("admin.tambah-guru");
        Route::post("edit", "GuruController@edit")->name("admin.edit-guru");
    });
    Route::prefix("mengajar")->group(function(){
        Route::get("data", "MengajarController@all")->name("view.admin.data-mengajar");
        Route::get("edit/{id}", "MengajarController@view_edit")->name("view.admin.edit-mengajar");
        Route::get("hapus/{id}", "MengajarController@hapus")->name("admin.hapus-mengajar");
        Route::post("tambah", "MengajarController@tambah")->name("admin.tambah-mengajar");
        Route::post("edit", "MengajarController@edit")->name("admin.edit-mengajar");
    });
});