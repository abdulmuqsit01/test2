@extends('layouts.main')
@section('title', 'Instance Detail')
@section('title_content', 'Detail Instansi')

@section('content')
    <h1>{{ $instance->name }}</h1>

    <img src="{{ uploads('storage/instance_logo/' . $instance->logo) }}" style="width: 30%" alt="...">


    @foreach ($instance->program as $item)
        <hr>
        <div class="container_program">
            <div class="image_program">
                <img src="{{ uploads('storage/program/' . $item->image) }}" alt="low">
            </div>
            <div class="description_program">
                <p>{{ $item->name }}</p>
                <p class="description_text">{{ $item->description }}</p>
                <a href="/administrator/programDetail/{{ $item->slug }}" class="btn btn-primary">
                    Detail
                </a>
                {{-- <button type="button" class="btn btn-primary">Selengkapnya</button> --}}
            </div>
        </div>
    @endforeach

@endsection
