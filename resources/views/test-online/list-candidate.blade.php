@extends('layouts.master')
@section('content')

<table class="table table-bordered">
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
                            <a class="btn btn-primary mb-1" href="{{ route('test-online.show', $candidate->id) }}" role="button">Show Exam</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
{{ $candidates->links() }}
@endsection

