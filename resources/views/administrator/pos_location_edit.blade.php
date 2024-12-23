@extends('layouts.main')
@section('title', 'Lokasi Kantor Pos')
@section('title_content', 'Ubah Lokasi Kantor Pos')

@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @elseif(session()->has('message-deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('message-deleted') }}
        </div>
    @endif

    <form action="{{ route('mutate_edit_pos_location', ['id' => $location->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')

        @error('kcu_or_kcp')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lokasi KCU/KCP</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="kcu_or_kcp"
                @error('kcu_or_kcp') is-invalid @enderror value="{{ $location->kcu_or_kcp }}">
        </div>


        @error('pos_location')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat pos</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="pos_location"
                @error('pos_location') is-invalid @enderror value="{{ $location->pos_location }}">
        </div>


        <input class="btn btn-primary" type="submit" value="Kirim">
    </form>
@endsection
