@extends('layouts.master')
<head>
    @include('candidate.layoutsCandidate.head')
</head>
@section('content')
    <header>
        @include('candidate.layoutsCandidate.header')
    </header>
    <div method="GET" action="{{ route('list-candidate.index') }}">
        <form class="form-inline">
            <div class="mb-2 col">
                <input type="text" class="form-control" placeholder="Tên" name="full_name">
            </div>
            <div class="mb-2 col">
                <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
            </div>
            <div class="mb-2 col">
                <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
            </div>
            <div class="mb-2 col">
                <input type="text" class="form-control" placeholder="Địa chỉ mail" name="email">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
    </div>
    <div class="form-group">
        <table class="table table-bordered">
            @include('flash::message')
            <tbody>
            <tr>
                <div class="bg-secondary text-white text-center">
                    Bảng danh sách
                </div>
            </tr>
            <tr>
                <td>
                    <table id="member_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{ $candidate->full_name }}</td>
                                <td>{{ $candidate->address }}</td>
                                <td>{{ $candidate->birthday }}</td>
                                <td>{{ $candidate->phone }}</td>
                                <td>{{ $candidate->email }}</td>
                                <td>
                                    <a class="btn btn-primary mb-1"
                                       href="{{ route('candidates.edit',$candidate->id) }}" role="button">Edit</a>
                                    <form action="{{ route('candidates.destroy',$candidate->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        {{ $candidates->appends(request()->query())->links() }}
    </div>
@endsection
