@extends('layouts.main')
@section('title', 'kategori')
@section('title_content', 'Menambahkan kategori')

@section('content')

    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @elseif(session()->has('message-deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('message-deleted') }}
        </div>
    @elseif(session()->has('message-edit'))
        <div class="alert alert-primary" role="alert">
            {{ session('message-edit') }}
        </div>
    @endif

    <form action="{{ route('mutate_kategori_create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp"
                @error('nama') is-invalid @enderror required value="{{ old('nama') }}">
        </div>

        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <img id="imagePreview" src="#" alt="Image Preview"
                style="display: none; height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" required name="image"
                accept="image/png, image/jpg, image/jpeg">
        </div>

        @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thumbnail</label>
            <img id="imagePreview2" src="#" alt="Image Preview"
                style="display: none; height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile02" required name="thumbnail"
                accept="image/png, image/jpg, image/jpeg">
        </div>

        <input class="btn btn-primary" type="submit" value="Kirim">
    </form>
    <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>
@endsection
