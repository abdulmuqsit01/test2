@extends('layouts.main')
@section('title', 'Banner')
@section('title_content', 'Ubah Data Banner')

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
    @elseif(session()->has('message-edit'))
        <div class="alert alert-primary" role="alert">
            {{ session('message-edit') }}
        </div>
    @endif

    <form action="{{ route('mutate_admin_banner_edit', ['id' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                {{ $banner->program_id == null ? 'checked' : '' }} value="INFO">
            <label class="form-check-label" for="flexRadioDefault1">
                INFO PENTING
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                {{ $banner->program_id != null ? 'checked' : '' }} value="PILOT">
            <label class="form-check-label" for="flexRadioDefault2">
                PILOT PROJECT
            </label>
        </div>
        <br>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- @dd(uploads('storage/banner/'.$banner->name) ) --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <br>
            <img id="imagePreview" src="{{ uploads('storage/banner/' . $banner->name) }}" alt="Image Preview"
                style="height:100px; padding-bottom:5px;">
            <input type="file" class="form-control" id="inputGroupFile01" name="image"
                accept="image/png, image/jpg, image/jpeg">
        </div>

        {{-- @error('gambar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Gambar</label>
        <img id="imagePreview" src="{{uploads('storage/program/'.$program->image)}}" alt="Image Preview" style="display: block; height:120px; padding-bottom:5px;">
        <input type="file" class="form-control" id="inputGroupFile01" name="gambar"
            accept="image/png, image/jpeg, image/jpg">
    </div> --}}


        <div id="myDiv" class="hidden">
            @error('id_categori')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                <select class="form-select" id="dropwown-kategori" aria-label="Floating label disabled select example"
                    name="idProgram" style="width: 100%">
                    <option selected value="{{ $banner->program_id }}">Daftar Program</option>
                    @foreach ($programList as $item)
                        <option value="{{ $item->id }}" {{ @$item->id == $banner->program_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Kirim">
        {{-- </form> --}}
        <script src="{{ statics('js/preview_image_input.js?v=0.0.1') }}"></script>


        <script>
            // Ambil semua elemen radio button
            var radios = document.querySelectorAll('input[type=radio][name=flexRadioDefault]');
            if ("{{ $banner->program_id != null }}") {
                document.getElementById("myDiv").style.display = 'block';
            }
            // Tambahkan event listener untuk setiap radio button
            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        console.log("Nilai radio berubah menjadi: " + this.value);
                        if (this.value == "PILOT") {
                            document.querySelector('.form-select').required = true;
                            document.getElementById("myDiv").style.display = 'block';
                        } else {
                            document.querySelector('.form-select').required = false;
                            document.getElementById("myDiv").style.display = 'none';
                        }
                    }
                });
            });
        </script>
    @endsection
