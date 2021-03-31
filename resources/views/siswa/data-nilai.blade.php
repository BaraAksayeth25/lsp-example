@extends('layouts.app')
@section('content-left')
    <h1>Hallo {{$user}}</h1>
@endsection
@section('content-right')
<h1>Data Nilai</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>NIP</th>
            <th>Guru</th>
            <th>UH</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>NA</th>
        </tr>
        @foreach($nilai as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->nama_mapel}}</td>
                <td>{{$data->nip}}</td>
                <td>{{$data->nama_guru}}</td>
                <td>{{$data->uh}}</td>
                <td>{{$data->uts}}</td>
                <td>{{$data->uas}}</td>
                <td>{{$data->na}}</td>
            </tr>
        @endforeach
    </table>
@endsection