@extends('layouts.main')
@section('title', 'Program Detail')
@section('title_content', 'Detail Program')
@section('content')
    <div class="container_detail_program">
        <img src="{{ uploads('storage/program/' . $program->image) }}" style="width: 30%" alt="" class="img-fluid">
        <div class="program_attribute">
            {{-- <table>
            <tr>
                <td>Nama</td>
                <td> : {{$program->name}}</td>
            </tr>
            <tr>
                <td>Url</td>
                <td> : {{$program->url}}</td>
            </tr>
            <tr>
                <td>Tag</td>
                <td> : {{$program->tag}}</td>
            </tr>
            <tr>
                <td>Fitur</td>
                <td> : {{ $program->featured ? 'YES' : 'NO' }}</td>
            </tr>
        </table> --}}
            <p>Nama : {{ $program->name }}</p>
            <p>Url : {{ $program->url }}</p>
            <p>Tag : {{ $program->tag }}</p>
            <p>Fitur : {{ $program->featured ? 'YES' : 'NO' }}</p>

        </div>
    </div>

    <hr>
    <p>{{ $program->description }}</p>
@endsection
