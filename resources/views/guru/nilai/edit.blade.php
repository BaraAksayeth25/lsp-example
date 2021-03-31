@extends('layouts.app')
@section('content-left')
    <h1>Edit Nilai</h1>
    <a href="{{route('view.guru.data-nilai')}}">
        <div class="button">Kembalu</div>
    </a>
@endsection
@section('content-right')
<h1>Edit Nilai</h1>
<form action="{{route('guru.edit-nilai')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$nilai->id}}">
        <div class="content-input">
            <label for="">Kelas</label>
            <input type="text" name="kelas" id="" class="input" value="{{$nilai->nama_kelas}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Mapel</label>
            <input type="text" name="kelas" id="" class="input" value="{{$nilai->nama_mapel}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Siswa</label>
            <input type="text" name="nis" id="" class="input" value="{{$nilai->nama_siswa}}" disabled>
            </select>
        </div>
        <div class="content-input">
            <label for="">Ulangan Harian</label>
            <input type="text" name="uh" id="" class="input" value="{{$nilai->uh}}">
        </div>
        <div class="content-input">
            <label for="">Ulangan Tengah Semester</label>
            <input type="text" name="uts" id="" class="input" value="{{$nilai->uts}}">
        </div>
        <div class="content-input">
            <label for="">Ulangan Akhir Semester</label>
            <input type="text" name="uas" id="" class="input" value="{{$nilai->uas}}">
        </div>
        <div class="content-input">
           <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection