@extends('layouts.main')
@section('title', 'Instance')
@section('title_content', 'Ubah Data Instansi')

@section('content')
    <form action="{{ route('mutate_admin_instance_edit', ['id' => $instance->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            {{-- <span class="input-group-text" id="inputGroup-sizing-default">Instansi</span> --}}
            <label for="exampleInputEmail1" class="form-label">Instansi</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="instance" value="{{ $instance->name }}">
        </div>

        <div class="mb-3">
            {{-- <span class="input-group-text" id="inputGroup-sizing-default">Instansi</span> --}}
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="email" value="{{ $instance->email }}">
        </div>

        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Logo</label>
            {{-- <label class="input-group-text" for="inputGroupFile01">LOGO</label> --}}
            <img id="imagePreview" src="{{ uploads('storage/instance_logo/' . $instance->logo) }}" alt="Image Preview"
                style="display: block; height:120px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" name="logo"
                value='storage/instance_logo/{{ $instance->logo }}' accept="image/png, image/jpg, image/jpeg">
        </div>
        <input type="hidden" value="{{ $id }}" name="id">
        <input class="btn btn-primary" type="submit" value="Kirim">
    </form>
    <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>
@endsection
