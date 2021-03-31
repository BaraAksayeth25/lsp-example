@extends('layouts.app')
@section('content-left')
<h1>Tambah Siswa</h1>
    <form action="{{route('admin.tambah-siswa')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">NIS</label>
            <input type="text" name="nis" id="" class="input">
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
            <label for="">Kelas</label>
            <select name="id_kelas" id="">
                @foreach($kelas as $data)
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
<h1>Data Siswa</h1>
    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Password</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Action</th>
        </tr>
        @foreach($siswa as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nis}}</td>
                <td>{{$data->nama_siswa}}</td>
                <td>{{$data->jk === "L" ? "Laki-laki" : "Perempuan"}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->password}}</td>
                <td>{{$data->kelas}}</td>
                <td>{{$data->jurusan}}</td>
                <td>
                    <div class="action">

                        <a href="{{route('view.admin.edit-siswa', ['nis' => $data->nis])}}">
                            <div class="button-action blue">Edit</div>
                        </a>
                        <a href="{{route('admin.hapus-siswa', ['nis' => $data->nis])}}">
                            <div class="button-action red">Hapus</div>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection