@extends('layouts.app')
@section('content-left')
<h1>Tambah Guru</h1>
    <form action="{{route('admin.tambah-guru')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">NIP</label>
            <input type="text" name="nip" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Nama</label>
            <input type="text" name="nama" id="" class="input">
        </div>
        <div class="content-input">
            <label for="">Jenis Kelamin</label>
            <div>
                <label for="">Laki-laki</label>
                <input type="radio" name="jk" id="" value="L">
            </div>
            <div>
                <label for="">Perempuan</label>
                <input type="radio" name="jk" id="" value="P">
            </div>            
        </div>
        <div class="content-input">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="content-input">
            <label for="">Password</label>
            <input type="text" name="password" id="" class="input">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Tambah</button>
        </div>
    </form>
@endsection
@section('content-right')
<h1>Data Guru</h1>
    <table>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        @foreach($guru as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nip}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->jk === "L" ? "Laki-laki" : "Perempuan"}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->password}}</td>
                <td>
                    <div class="action">
                    <a href="{{route('view.admin.edit-guru', ['nip' => $data->nip])}}">
                        <div class="button-action blue">Edit</div>
                    </a>
                    <a href="{{route('admin.hapus-guru', ['nip' => $data->nip])}}">
                        <div class="button-action red">Hapus</div>
                    </a>
                    </div>
                    
                </td>
            </tr>
        @endforeach
    </table>
@endsection