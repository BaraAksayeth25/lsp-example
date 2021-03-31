@extends('layouts.app')
@section('content-left')
<h1>Tambah Mengajar</h1>
    <form action="{{route('admin.tambah-mengajar')}}" method="post">
        @csrf
        <div class="content-input">
            <label for="">Guru</label>
            <select name="nip" id="" class="input">
                @foreach($guru as $data)
                    <option value="{{$data->nip}}">{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="content-input">
            <label for="">Kelas</label>
            <select name="id_kelas" id="" class="input">
                @foreach($kelas as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            </select>
        </div>
         <div class="content-input">
            <label for="">Mata Pelajaran</label>
            <select name="id_mapel" id="" class="input">
                @foreach($mapel as $data)
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
<h1>Data Mengajar</h1>
    <table>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Guru</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Action</th>
        </tr>
        @foreach($mengajar as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nip}}</td>
                <td>{{$data->guru}}</td>
                <td>{{$data->kelas}}</td>
                <td>{{$data->mapel}}</td>
                <td>
                    <div class="action">

                        <a href="{{route('view.admin.edit-mengajar', ['id' => $data->id])}}">
                            <div class="button-action blue">Edit</div>
                        </a>
                        <a href="{{route('admin.hapus-mengajar', ['id' => $data->id])}}">
                            <div class="button-action red">hapus</div>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection