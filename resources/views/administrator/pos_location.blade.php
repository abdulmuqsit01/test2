@extends('layouts.main')
@section('title', 'Lokasi Kantor Pos')
@section('title_content', 'Daftar Lokasi Kantor Pos')
@section('content')
    @csrf
    <div class="  my-5  d-flex justify-content-between">
        <a href="{{ route('view_create_location') }}" class="btn btn-success">Tambah Lokasi Kantor Pos</a>
    </div>

    @if (session()->has('message-success'))
        <div class="alert alert-success" role="alert">
            {{ session('message-success') }}
        </div>
    @elseif(session()->has('message-deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('message-deleted') }}
        </div>
    @endif
    <table class="table table-bordered table-sm" id="table">
        <thead>
            <tr>
                <th class="fs-4 align-top text-center">No</th>
                <th class="fs-4 align-top text-center">KCU/KCP</th>
                <th class="fs-4 align-top text-center">Alamat</th>
                <th class="fs-4 align-top text-center">Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($location as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->kcu_or_kcp }}</td>
                    <td class="text-center">{{ $item->pos_location }}</td>
                    <td class="d-flex justify-content-center">
                        <div>
                            <a href="{{ route('view_location_edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                            <!-- Button trigger modal -->
                            <button type="button" value="9999" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" id="openDeleteAlertButton"
                                data-route="{{ route('mutate_delete_pos_location', ['id' => $item->id]) }}"
                                data-redirect="{{ route('view_location') }}">
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
