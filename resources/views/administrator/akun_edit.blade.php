@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'EDIT')
@section('content')
    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @endif
    <form action="{{ route('mutate_admin_registrasi_edit', ['id' => $akun[0]->id]) }}" method="POST">
        @csrf
        @method('put')
        {{-- input name --}}
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" name="name" @error('name') is-invalid @enderror
                value="{{ $akun[0]->name }}">
        </div>
        {{-- input username --}}
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" name="username" @error('username') is-invalid @enderror
                value="{{ $akun[0]->username }}">
        </div>
        {{-- input password --}}
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" name="password" @error('password') is-invalid @enderror
                value="">
        </div>


        <br>
        <input type="hidden" value="{{ $akun[0]->id }}" name="id">
        <button type="submit" class="btn btn-primary">DAFTAR</button>
    </form>

@endsection
