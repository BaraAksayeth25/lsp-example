@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.admin.data-jurusan')}}">
        <div class="button">Kembali</div>
    </a>
@endsection
@section('content-right')
<h1>Edit Jurusan</h1>
    <form action="{{route('admin.edit-jurusan')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$jurusan->id}}">
        <div class="content-input">
            <label for="">Nama Jurusan</label>
            <input type="text" name="nama" id="" class="input" value="{{$jurusan->nama}}">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection