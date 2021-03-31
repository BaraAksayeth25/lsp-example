@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.admin.data-mapel')}}">
        <div class="button">Kembali</div>
    </a>
@endsection
@section('content-right')
<h1>Tambah Mata Pelajaran</h1>
    <form action="{{route('admin.edit-mapel')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$mapel->id}}">
        <div class="content-input">
            <label for="">Kode Mapel</label>
            <input type="text" name="kode" id="" class="input" value="{{$mapel->kode}}">
        </div>
        <div class="content-input">
            <label for="">Mata Pelajaran</label>
            <input type="text" name="nama" id="" class="input" value="{{$mapel->nama}}">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection