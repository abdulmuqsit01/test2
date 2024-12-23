@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'REGISTRASI AKUN ADMIN')
@section('content')
    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @endif
    <form action="{{ route('mutate_admin_registrasi_create') }}" method="POST">
        @csrf
        {{-- input name --}}
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="name" @error('name') is-invalid @enderror
                value="{{ old('name') }}">
        </div>
        {{-- input username --}}
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="username"
                @error('username') is-invalid @enderror value="{{ old('username') }}">
        </div>
        {{-- input password --}}
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="password"
                @error('password') is-invalid @enderror value="{{ old('password') }}">
        </div>

        <label for="floatingSelectDisabled">Instansi</label>
        <div class="form-floating">
            <select class="form-select" id="dropwown-instansi" aria-label="Floating label disabled select example"
                name="instansi" required value="{{ old('instansi') }}">
                <option selected value="">Daftar Instansi</option>
                @foreach ($instansiList as $item)
                    <option value="{{ $item->id }}" {{ old('instansi') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
                {{-- {{{ old('instansi') }}} --}}
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">DAFTAR</button>
    </form>

@endsection
