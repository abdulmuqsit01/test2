@extends('layouts.main')
@section('title', 'Instance')
@section('title_content', 'Daftar Instansi')

@section('content')
    <div class="  my-5  d-flex justify-content-between">
        <a href="{{ route('view_admin_instance_new') }}" class="btn btn-success">Tambah data</a>
    </div>

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
    <table class="table table-bordered table-sm" id="table">
        <thead>
            <tr>
                <th class="fs-4 align-top text-center">No</th>
                <th class="fs-4 align-top text-center">Nama</th>
                <th class="fs-4 align-top text-center">Email</th>
                <th class="fs-4 align-top text-center">Logo</th>
                <th class="fs-4 align-top text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($InstanceList as $item)
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text">{{ $item->name }}</td>
                    <td class="text">{{ $item->email }}</td>
                    <td class="w-25 p-3">
                        <img src="{{ uploads('storage/instance_logo/' . $item->logo) }}" class="img-fluid">
                    </td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            {{-- <a href="/administrator/instanceDetail/{{$item->slug}}" class="btn btn-warning">
                        Detail
                    </a> --}}
                            <a href="{{ route('view_admin_instance_edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" value="{{ $item->id }}" name="{{ $item->name }}"
                                class="btn btn-danger openDeleteAlertButton" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                data-route="{{ route('mutate_admin_instance_delete', ['id' => $item->id]) }}"
                                data-redirect="{{ route('view_admin_instance') }}">
                                Hapus
                            </button>
                        </div>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 nama" id="deleteModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('administrator.partials.popup_delete')
@endsection
