@extends('layouts.main')
@section('title', 'kategori')
@section('title_content', 'Ubah Data kategori')

@section('content')

    <form action="{{ route('mutate_admin_kategori_edit', ['id' => $kategori->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            {{-- <span class="input-group-text" id="inputGroup-sizing-default">Instansi</span> --}}
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default" required name="nama" value="{{ $kategori->name }}">
        </div>
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            {{-- <label class="input-group-text" for="inputGroupFile01">LOGO</label> --}}
            <img id="imagePreview" src="{{ uploads('storage/kategori_image/' . $kategori->image) }}" alt="Image Preview"
                style="display: block; height:120px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" name="image"
                value='storage/kategori_image/{{ $kategori->image }}' accept="image/png, image/jpg, image/jpeg">
        </div>
        {{-- FOR THUMBNAIL --}}
        <div class=" mb-3">
            <label for="exampleInputEmail2" class="form-label">Thumbnail</label>
            {{-- <label class="input-group-text" for="inputGroupFile01">LOGO</label> --}}
            <img id="imagePreview2" src="{{ uploads('storage/kategori_image/' . $kategori->thumbnail) }}"
                alt="Image Preview" style="display: block; height:120px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile02" name="thumbnail"
                value='storage/kategori_image/{{ $kategori->image }}' accept="image/png, image/jpg, image/jpeg">
        </div>
        <input type="hidden" value="{{ $id }}" name="id">
        <input class="btn btn-primary" type="submit" value="Kirim">
    </form>
    <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>
@endsection
