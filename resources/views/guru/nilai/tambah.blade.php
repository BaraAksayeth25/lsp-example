@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.guru.data-nilai')}}">
        <div class="button">Kembalu</div>
    </a>
@endsection
@section('content-right')
<form action="{{route('guru.tambah-nilai')}}" method="post">
        @csrf
        <input type="hidden" name="id_mengajar" value="{{$mengajar->id}}">
        <div class="content-input">
            <label for="">Kelas</label>
            <input type="text" name="kelas" id="" class="input" value="{{$mengajar->kelas}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Mapel</label>
            <input type="text" name="kelas" id="" class="input" value="{{$mengajar->mapel}}" disabled>
        </div>
        <div class="content-input">
            <label for="">Siswa</label>
            <select name="nis" id="">
                @foreach($siswa as $data)
                    <option value="{{$data->nis}}">{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <label for="">Ulangan Harian</label>
            <input type="text" name="uh" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Ulangan Tengah Semester</label>
            <input type="text" name="uts" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Ulangan Akhir Semester</label>
            <input type="text" name="uas" id="" class="input">
        </div>
        <div class="content-input">
           <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection