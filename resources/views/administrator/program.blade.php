@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'Daftar Program')
@section('content')
    @csrf
    <div class="  my-5  d-flex justify-content-between">
        <a href="{{ route('view_admin_program_new') }}" class="btn btn-success">Tambah Program</a>
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

    <select style="width: 72px; height: 32.8px; border-radius: 3px" id="filter-select" class="dt-input">
        <option value="">All</option>
        <option value="yes">yes</option>
        <option value="no">no</option>
    </select>
    <label for="">Feature</label>

    <table class="table table-bordered table-sm" id="table-program">
        <thead>
            <tr>
                <th class="fs-5 align-top text-center">No</th>
                <th class="fs-5 align-top text-center">Program</th>
                <th class="fs-5 align-top text-center">Instansi</th>
                {{-- <th class="fs-5 align-top text-center">Logo Instansi</th> --}}
                <th class="fs-5 align-top text-center">Ilustrasi Program</th>
                <th class="fs-5 align-top text-center">Kategori</th>
                <th class="fs-5 align-top text-center">tag</th>
                <th class="fs-5 align-top text-center">URL</th>
                <th class="fs-5 align-top text-center">Aksi</th>
                <th class="fs-5 align-top text-center">Program Unggulan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programList as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td style="text-wrap:balance; text">{{ $item->name }} </td>
                    <td class="text-center text">
                        <a href="{{ route('view_admin_program_edit', ['id' => $item->id]) }}" style=""
                            class="text-center">
                            <p>{{ $item->instansi->name }}</p>
                            <img src="{{ uploads('storage/instance_logo/' . $item->instansi->logo) }}" class="img-fluid"
                                alt="" style="width:40%;">
                        </a>
                        {{-- {{$item->instansi->name}} --}}
                    </td>
                    <td class="w-25 p-3 text"><img src="{{ uploads('storage/program/' . $item->image) }}" alt=""
                            class="img-fluid"></td>
                    <td class="text">{{ $item->programCategories->name ?? '-' }}</td>
                    <td class="text">{{ $item->tag }}</td>
                    <td class="text"><a href="#">{{ $item->url }}</a></td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            {{-- <a href="/administrator/programDetail/{{$item->slug}}" class="btn btn-warning">
                        Detail
                    </a> --}}
                            <a href="{{ route('view_admin_program_edit', ['id' => $item->id]) }}" class="btn btn-warning">
                                Edit
                            </a>

                            <button type="button" value="{{ $item->id }}" name="{{ $item->name }}"
                                class="btn btn-danger openDeleteAlertButton" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                data-route="{{ route('mutate_admin_program_delete', ['id' => $item->id]) }}"
                                data-redirect="{{ route('view_admin_program') }}">
                                Hapus
                            </button>
                        </div>
                    </td>
                    <td class="text">{{ $item->featured ? 'YES' : 'NO' }}</td>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
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
