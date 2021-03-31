@extends('layouts.app')
@section('content-left')
    <h1>Login Guru</h1>
    <form action="{{route('login', ['role' => 'guru'])}}" method="post">
    @csrf
        <div class="content-input">
            <label for="">NIP</label>
            <input type="text" class="input" name="nip" id="">
        </div>
        <div class="content-input">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="input">
        </div>
        <div class="content-input">
            <button type="submit" class="button">Login</button>
        </div>
    </form>
@endsection
@section('content-right')
    <h2>Selamat Datang Di Aplikasi SMK Indonesia Bisa</h2>
@endsection