@extends('layouts.main')
@section('title', 'Instance')
@section('title_content', 'Menambahkan instansi')

@section('content')
    <form action="{{ route('mutate_admin_instance_create') }}" method="post" enctype="multipart/form-data">
        @csrf

        @error('instance')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Instansi</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="instance" aria-describedby="emailHelp"
                @error('instance') is-invalid @enderror required value="{{ old('instance') }}">
        </div>

        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
                @error('email') is-invalid @enderror required value="{{ old('email') }}">
        </div>

        @error('logo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Logo</label>
            <img id="imagePreview" src="#" alt="Image Preview"
                style="display: none; height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" required name="logo"
                accept="image/png, image/jpg, image/jpeg">
        </div>
        <input class="btn btn-primary" type="submit" value="Kirim">
    </form>
    <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>
@endsection
