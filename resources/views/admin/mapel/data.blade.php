@extends('layouts.app')
@section('content-left')
<h1>Tambah Mata Pelajaran</h1>
    <form action="{{route('admin.tambah-mapel')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">Kode Mapel</label>
            <input type="text" name="kode" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Mata Pelajaran</label>
            <input type="text" name="nama" id="" class="input">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection
@section('content-right')
<h1>Data Mata Pelajaran</h1>
    <table>

        <tr>
            <th>No</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Action</th>
        </tr>
        @foreach($mapel as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->kode}}</td>
                <td>{{$data->nama}}</td>
                <td>
                    <div class="action">

                        <a href="{{route('view.admin.edit-mapel', ['id' => $data->id])}}">
                            <div class="button-action blue">Edit</div>
                        </a>
                        <a href="{{route('admin.hapus-mapel', ['id' => $data->id])}}">
                            <div class="button-action red">Hapus</div>
                        </a>
                    </div>
                    </td>
            </tr>
        @endforeach
    </table>
@endsection