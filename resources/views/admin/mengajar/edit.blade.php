@extends('layouts.app')
@section('content-left')
<h1>Edit Nilai</h1>
    <a href="{{route('view.admin.data-mengajar')}}">
        <div class="button">Kembali</div>
    </a>
@endsection
@section('content-right')
 <h1>Edit Mengajar</h1>
    <form action="{{route('admin.edit-mengajar')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$mengajar->id}}">
        <div class="content-input">
            <label for="">Guru</label>
            <select name="nip" id="" class="input">
                @foreach($guru as $data)
                    <option value="{{$data->nip}}" {!! $data->nip === $mengajar->nip ? "selected" : "" !!}>{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <label for="">Kelas</label>
            <select name="id_kelas" id="" class="input">
                @foreach($kelas as $data)
                    <option value="{{$data->id}}" {!! $data->id === $mengajar->id_kelas ? "selected" : "" !!}>{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
         <div class="content-input">
            <label for="">Mata Pelajaran</label>
            <select name="id_mapel" id="" class="input">
                @foreach($mapel as $data)
                    <option value="{{$data->id}}" {!! $data->id === $mengajar->id_mapel ? "selected" : "" !!}>{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
         <div class="content-input">
            <button type="submit" class="button">Simpan</button>
        </div>
    </form>
@endsection