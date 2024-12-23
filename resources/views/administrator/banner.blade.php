@extends('layouts.main')
@section('title', 'Banner')
@section('title_content', 'Daftar Banner')
@section('content')
    @csrf
    <div class="  my-5  d-flex justify-content-between">
        <a href="{{ route('view_banner_create') }}" class="btn btn-success">Tambah Banner</a>
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
                <th class="fs-4 align-top text-center">Image</th>
                <th class="fs-4 align-top text-center">Jenis</th>
                <th class="fs-4 align-top text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banner as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="w-50 p-3 text">
                        <img src="{{ uploads('storage/banner/' . $item->name) }}" class="img-fluid">
                    </td>
                    <td class="text-center">
                        {{ $item->program_id == null ? 'INFO PENTING' : 'PILOT PROJECT' }}
                    </td>
                    <td class="d-flex justify-content-center">
                        <div>
                            <a href="{{ route('view_admin_banner_edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" value="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" id="openDeleteAlertButton"
                                data-route="{{ route('mutate_admin_banner_delete', ['id' => $item->id]) }}"
                                data-redirect="{{ route('view_admin_kategori') }}">
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
                    Apakah anda yakin?
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
