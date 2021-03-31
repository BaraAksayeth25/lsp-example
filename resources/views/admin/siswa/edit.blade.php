@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
<a href="{{route('view.admin.data-siswa')}}">
        <button class="button">Kembali</button>
    </a>
    
@endsection
@section('content-right')
<h1>Edit Siswa</h1>
    <form action="{{route('admin.edit-siswa')}}" method="post">
        @csrf
        <input type="hidden" name="nis" value="{{$siswa->nis}}">
        <div class="content-input">
            <label for="">NIS</label>
            <input type="text" name="nis" id="" class="input" value="{{$siswa->nis}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="input" value="{{$siswa->nama}}">
        </div>
        <div class="content-input">
            <label for="">Jenis Kelamin</label>
            <div>
                <label for="">Laki-laki</label>
                <input type="radio" name="jk" id="" value="L" {!! $siswa->jk === "L" ? "checked" : "" !!}>
            </div>
            <div>
                <label for="">Perempuan</label>
                <input type="radio" name="jk" id="" value="P" {!! $siswa->jk === "P" ? "checked" : "" !!}>
            </div>            
        </div>
        <div class="content-input">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10">{{$siswa->alamat}}</textarea>
        </div>
        <div class="content-input">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="input" value="{{$siswa->password}}">
        </div>
        <div class="content-input">
            <label for="">Kelas</label>
            <select name="id_kelas" id="">
                @foreach($kelas as $data)
                    <option value="{{$data->id}}" {!! $data->id === $siswa->id_kelas ? "selected" : "" !!}>{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <label for="">Nama</label>
            <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection