@extends('layouts.main')
@section('title', 'Lokasi Kantor Pos')
@section('title_content', 'Menambahkan Lokasi Kantor Pos')

@section('content')

    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @elseif(session()->has('message-deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('message-deleted') }}
        </div>
    @endif

    <form action="{{ route('mutate_create_location') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')

        @error('kcu_or_kcp')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lokasi KCU/KCP</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="kcu_or_kcp"
                @error('kcu_or_kcp') is-invalid @enderror value="{{ old('kcu_or_kcp') }}">
        </div>


        @error('pos_location')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat pos</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="pos_location"
                @error('pos_location') is-invalid @enderror value="{{ old('pos_location') }}">
        </div>


        <input class="btn btn-primary" type="submit" value="Kirim">

    </form>
@endsection
