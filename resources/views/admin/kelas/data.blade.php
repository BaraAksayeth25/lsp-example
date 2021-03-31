@extends('layouts.app')
@section('content-left')
<h1>Tambah Kelas</h1>
    <form action="{{route('admin.tambah-kelas')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Jurusan</label>
            <select name="id_jurusan" id="" class="input">
                @foreach($jurusan as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection
@section('content-right')
<h1>Data Kelas</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        @foreach($kelas as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nama_kelas}}</td>
                <td>{{$data->nama_jurusan}}</td>
                <td>
                    <div class="action">
                        
                        <a href="{{route('view.admin.edit-kelas', ['id' => $data->id])}}">
                            <div class="button-action blue">Edit</div>
                        </a>
                        <a href="{{route('admin.hapus-kelas', ['id' => $data->id])}}">
                            <div class="button-action red">Hapus</div>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection