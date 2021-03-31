@extends('layouts.app')
@section('content-left')
    <h1>Login Admin</h1>
    <form action="{{route('login', ['role' => 'admin'])}}" method="post">
    @csrf
        <div class="content-input">
            <label for="">Username</label>
            <input type="text" class="input" name="username" id="">
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