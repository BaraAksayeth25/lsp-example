<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('styles/style.css') }}" />
        <title>SMK INDONESIA BISA</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img
                    src="{{ asset('images/header.jpg') }}"
                    alt=""
                    class="img"
                />
            </div>
            <div class="menu">
                @if($menu === "login")
                <a href="{{route('view.login', ['role' => 'admin'])}}">
                    <div class="content-menu">
                        <span>Login Admin</span>
                    </div>
                </a>
                <a href="{{route('view.login', ['role' => 'guru'])}}">
                    <div class="content-menu">
                        <span>Login Guru</span>
                    </div>
                </a>
                <a href="{{route('view.login', ['role' => 'siswa'])}}">
                    <div class="content-menu">
                        <span>Login Siswa</span>
                    </div>
                </a>
                @else @if($role === "admin")
                <a href="{{ route('view.admin.data-mapel') }}">
                    <div class="content-menu">
                        <span>Mapel</span>
                    </div>
                </a>
                <a href="{{ route('view.admin.data-jurusan') }}">
                    <div class="content-menu">
                        <span>Jurusan</span>
                    </div>
                </a>
                <a href="{{ route('view.admin.data-kelas') }}">
                    <div class="content-menu">
                        <span>Kelas</span>
                    </div>
                </a>
                <a href="{{ route('view.admin.data-siswa') }}">
                    <div class="content-menu">
                        <span>Siswa</span>
                    </div>
                </a>
                <a href="{{ route('view.admin.data-guru') }}">
                    <div class="content-menu">
                        <span>Guru</span>
                    </div>
                </a>
                <a href="{{ route('view.admin.data-mengajar') }}">
                    <div class="content-menu">
                        <span>Mengajar</span>
                    </div>
                </a>
                @elseif($role === "guru")
                <a href="{{ route('view.guru.data-nilai') }}">
                    <div class="content-menu">
                        <span>Nilai</span>
                    </div>
                </a>
                @elseif($role === "siswa")
                <a href="{{ route('view.siswa.data-nilai') }}">
                    <div class="content-menu">
                        <span>Nilai</span>
                    </div>
                </a>

                @endif
                <a href="{{ route('logout') }}">
                    <div class="content-menu">
                        <span>Logout</span>
                    </div>
                </a>
                @endif
            </div>
            <div class="content">
                <div class="content-left">@yield('content-left')</div>
                <div class="content-right">@yield('content-right')</div>
            </div>
            <div class="footer">SMKINDONESIA BISA &COPY; 2021</div>
        </div>
    </body>
</html>
