@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'Daftar Program')
@section('content')

    <table class="table table-bordered table-sm" id="table">
        <thead>
            <tr>
                <td class="text-center fs-5 align-top text-center">Nama Program</td>
                <td class="text-center fs-5 align-top text-center">Nama Pendaftar</td>
                <td class="text-center fs-5 align-top text-center">Alamat E-mail</td>
                <td class="text-center fs-5 align-top text-center">Tindakan</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($enroll as $item)
                <tr>
                    <td class="text-center">{{ $item->program['name'] }}</td>
                    <td class="text-center">{{ $item->nama }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center"><a href="{{ route('view_admin_enrollment_edit', [$item['id']]) }}">EDIT</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
