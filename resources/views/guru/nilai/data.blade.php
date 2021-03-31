@extends('layouts.app')
@section('content-left')
<h1>Data Mengajar</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Action</th>
        </tr>
        @foreach($mengajar as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->kelas}}</td>
                <td>{{$data->mapel}}</td>
                <td>
                    <div class="action">
                    <a href="{{route('view.guru.tambah-nilai', ['id' => $data->id])}}">
                        <div class="button-action blue">
                            Tambah Nilai
                        </div>
                    </a>
                </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
@section('content-right')

    <h1>Data Nilai</h1>
    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Siswa</th>
            <th>Kelas</th>
            <th>Mapel</th>
            <th>UH</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>NA</th>
            <th>Action</th>
        </tr>
        @foreach($nilai as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nis}}</td>
                <td>{{$data->nama_siswa}}</td>
                <td>{{$data->nama_kelas}}</td>
                <td>{{$data->nama_mapel}}</td>
                <td>{{$data->uh}}</td>
                <td>{{$data->uts}}</td>
                <td>{{$data->uas}}</td>
                <td>{{$data->na}}</td>
                <td>
                    <div class="action">
                    <a href="{{route('view.guru.edit-nilai', ['id' => $data->id])}}">
                        <div class="button-action blue">Edit</div>
                    </a>
                    <a href="{{route('guru.hapus-nilai', ['id' => $data->id])}}">
                        <div class="button-action red">Hapus</div>
                    </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection