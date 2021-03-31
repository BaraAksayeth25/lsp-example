@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.admin.data-guru')}}">
        <div class="button">Kembali</div>
    </a>
@endsection
@section('content-right')
<h1>Edit Guru</h1>
    <form action="{{route('admin.edit-guru')}}" method="post">
        @csrf
        <input type="hidden" name="nip" value="{{$guru->nip}}">
        <div class="content-input">
            <label for="">NIP</label>
            <input type="text" name="nip" id="" class="input" value="{{$guru->nip}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="input" value="{{$guru->nama}}">
        </div>
        <div class="content-input">
            <label for="">Jenis Kelamin</label>
            <div>
                <label for="">Laki-laki</label>
                <input type="radio" name="jk" id="" value="L" {!! $guru->jk === "L" ? "checked" : "" !!}>
            </div>
            <div>
                <label for="">Perempuan</label>
                <input type="radio" name="jk" id="" value="P" {!! $guru->jk === "P" ? "checked" : "" !!}>
            </div>            
        </div>
        <div class="content-input">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10">{{$guru->alamat}}</textarea>
        </div>
        <div class="content-input">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="input" value="{{$guru->password}}">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection