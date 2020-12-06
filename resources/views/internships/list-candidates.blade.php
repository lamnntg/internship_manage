@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h1 class="text-center card-title">LIST CANDIDATES</h1>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Full Name</th>
                <th class="text-center">Birthday</th>
                <th class="text-center">Address</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Email</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($candidates as $key => $candidate)
                <tr>
                    <th class="text-center">{{$key +($candidates->currentPage() - 1)* $candidates->perPage() + 1 }}</th>
                    <th class="text-center">{{ $candidate->full_name}}</th>
                    <th class="text-center">{{ $candidate->birthday}}</th>
                    <th class="text-center">{{ $candidate->address }}</th>
                    <th class="text-center">{{ $candidate->phone}}</th>
                    <th class="text-center">{{ $candidate->email}}</th>
                    <th class="text-center">{{ $candidate->status}}</th>
                    <th scope="col" class="d-flex justify-content-between">
                        <a href="{{route("candidates.edit", $candidate-> id)}}" class="btn btn-warning btn-sm" role="button">Accept </a>
                        <a href="" class="btn btn-info btn-sm" role="button">View</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$candidate-> id}}">
                             Delete 
                        </button>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you sure you want to delete this Candidate ? 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form id="delete-candidate" action="{{ route('candidates.destroy', 'id')}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div>
        <span class="d-flex flex-row-reverse bd-highlight">{{ $candidates->links() }}</span> 
    </div>
</div> 
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        let oldIdTarget;
    $(".delete-confirm-btn").click(function() {
        let idTarget = $(this).data('id');   
        action = $("#delete-candidate").attr("action");
        if (action.search('id') != -1) {
            action = action.replace('id', idTarget);
        } else {
            action = action.replace(oldIdTarget, idTarget);
        }
        oldIdTarget = idTarget;
        $("#delete-candidate").attr({
            "action" : action,
        });
    });
    });
</script>
@endpush
