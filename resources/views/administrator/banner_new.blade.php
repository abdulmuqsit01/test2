@extends('layouts.main')
@section('title', 'Banner')
@section('title_content', 'Menambahkan Banner')

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

    <form action="{{ route('mutate_banner_create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked
                value="INFO">
            <label class="form-check-label" for="flexRadioDefault1">
                INFO PENTING
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="PILOT">
            <label class="form-check-label" for="flexRadioDefault2">
                PILOT PROJECT
            </label>
        </div>
        <br>
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

        <div id="myDiv" class="hidden">
            <div class="form-floating">
                <select class="form-select" id="dropwown-instansi" aria-label="Floating label disabled select example"
                    name="idProgram" value="{{ old('idProgram') }}" style="width:100%">
                    <option selected value="">Daftar Program</option>
                    @foreach ($programList as $item)
                        <option value="{{ $item->id }}" {{ old('idProgram') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                    {{-- {{{ old('instansi') }}} --}}
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

            // Tambahkan event listener untuk setiap radio button
            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        console.log("Nilai radio berubah menjadi: " + this.value);
                        if (this.value == "PILOT") {
                            document.getElementById("myDiv").style.display = 'block';
                            document.querySelector('.form-select').required = true;

                        } else {
                            document.querySelector('.form-select').required = false;

                            document.getElementById("myDiv").style.display = 'none';
                        }
                    }
                });
            });
        </script>
    @endsection
