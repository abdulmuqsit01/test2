@extends('layouts.main')
@section('title', 'user enrollment')
@section('title_content', 'Daftar user enrollment')

@section('content')
    @csrf

<style>
    .dt-search{
        margin-bottom: 10px;
    }
    .dt-button{
        margin-bottom: 10px;
    }
</style>

<table class="table table-bordered table-sm" id="table_user_enrollment">
    <thead>
        <tr>
            <th class="fs-6 align-top text-center">No</th>
            <th class="fs-6 align-top text-center">Tanggal Registrasi</th>
            <th class="fs-6 align-top text-center">Nama</th>
            <th class="fs-6 align-top text-center">Device</th>
            <th class="fs-6 align-top text-center">Email</th>
            <th class="fs-6 align-top text-center">No HP</th>
            <th class="fs-6 align-top text-center">Lokasi POS</th>
            <th class="fs-6 align-top text-center">Alamat</th>
            <th class="fs-6 align-top text-center">Provinsi</th>
            <th class="fs-6 align-top text-center">Kabupaten</th>
            <th class="fs-6 align-top text-center">Kecamatan</th>
            <th class="fs-6 align-top text-center">Program</th>
            <th class="fs-6 align-top text-center">Instansi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{$item->tanggal_registrasi}}</td>
            <td class="text-center">{{$item->nama}}</td>
            <td class="text-center">{{$item->device}}</td>
            <td class="text-center">{{$item->email}}</td>
            <td class="text-center">{{$item->no_hp}}</td>
            <td class="text-center">{{$item->lokasi_kantor_pos}}</td>
            <td class="text-center">{{$item->alamat}}</td>
            <td class="text-center">{{$item->provinsi}}</td>
            <td class="text-center">{{$item->kabupaten}}</td>
            <td class="text-center">{{$item->kecamatan}}</td>
            <td class="text-center">{{$item->program}}</td>
            <td class="text-center">{{$item->instansi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
