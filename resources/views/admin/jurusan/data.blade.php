@extends('layouts.app')
@section('content-left')
<h1>Tambah Jurusan</h1>
    <form action="{{route('admin.tambah-jurusan')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">Nama Jurusan</label>
            <input type="text" name="nama" id="" class="input">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection
@section('content-right')
<h1>Data Jurusan</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        @foreach($jurusan as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nama}}</td>
                <td>
                    <div class="action">

                        <a href="{{route('view.admin.edit-jurusan', ['id' => $data->id])}}">
                            <div class="button-action blue">Edit</div>
                        </a>
                        <a href="{{route('admin.hapus-jurusan', ['id' => $data->id])}}">
                            <div class="button-action red">Hapus</div>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
</body>
</html>