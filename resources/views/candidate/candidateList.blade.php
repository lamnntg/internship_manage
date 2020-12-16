@extends('layouts.master')
<head>
    @include('candidate.layoutsCandidate.head')
</head>
@section('content')
    <header>
        @include('candidate.layoutsCandidate.header')
    </header>
    <div method="GET" action="{{ route('candidates.index') }}">
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
            @if (session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
                {{ session_destroy('status')}}
            @endif
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
                                       href="{{ route('candidates.edit', $candidate->id) }}" role="button">Accept Or Edit</a>
                                    <a class="btn btn-warning mb-1" href="{{route('test-online.show', $candidate->id)}}" role="button">Create Exam</a>
                                    <button class="btn btn-danger deleteCandidate mb-1"
                                            data-candidate-id="{{$candidate->id}}">Delete
                                    </button>
                                    <a href="{{route('sendEmail',$candidate->id)}}" class="btn btn-outline-primary mb-1">Send Email</a>
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

    <div id="deleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog"
         aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <form action="{{route('deleteCandidate')}}" method="POST" class="remove-record-model">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title " id="custom-width-modalLabel">Cảnh báo</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Ứng viên này sẽ bị xóa?</h4>
                        <input type="hidden" name="candidate_id" id="app_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.deleteCandidate', function () {
            var candidateId = $(this).attr('data-candidate-id');
            $('#app_id').val(candidateId);
            $('#deleteModal').modal('show');
        });
    </script>
@endsection
