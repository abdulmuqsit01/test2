@extends('layouts.main')
@section('title', 'Users')
@section('title_content', 'User List')
@section('content')
    <div class="  my-5  d-flex justify-content-between">
        <a href="/student-add" class="btn btn-success">add data</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td>{{ '1' }}</td>
                    <td>{{ 'Aljiwani' }}</td>
                    <td>{{ 'aljiwani123@gmail.com' }}</td>
                    <td>{{ 'Aljiwani Nursyah' }}</td>
                    <td>
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="student/#" class="btn btn-warning">
                                detail
                            </a>
                            <a href="student-edit/#" class="btn btn-warning">
                                edit
                            </a>
                            <a href="student-deleteR/#" class="btn btn-danger">
                                delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection
