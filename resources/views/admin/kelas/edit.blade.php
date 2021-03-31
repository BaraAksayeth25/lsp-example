@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.admin.data-kelas')}}">
        <div class="button">Kembali</div>
    </a>
@endsection
@section('content-right')
<h1>Edit Kelas</h1>
    <form action="{{route('admin.edit-kelas')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$kelas->id}}">
        <div class="content-input">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="input" value="{{$kelas->nama}}">
        </div>
        <div class="content-input">
            <label for="">Jurusan</label>
            <select name="id_jurusan" id="" class="input">
                @foreach($jurusan as $data)
                    <option value="{{$data->id}}" {!! $data->id === $kelas->id_jurusan ? "selected" : "" !!}>{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection