@extends('layouts.master')

@section('content')

<div class="card card-primary">
    <h1 class="text-center card-header"> Config Testing List</h1>
    <div class="card-body">
        <a type="button" class="btn btn-info btn-primary" href="{{ route("config-testing.create") }}">Create Exam Test</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Question Category</th>
                <th class="text-center">Question Degree</th>
                <th class="text-center">Quota</th>
                <th class="text-center">Create By</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ExamConfigurations as $key => $ExamConfiguration)
            <tr>
                <th class="text-center">{{$key +($ExamConfigurations->currentPage() - 1)* $ExamConfigurations->perPage() + 1 }}</th>
                <th class="text-center">{{ $ExamConfiguration->name}}</th>
                <th class="text-center">  
                    @foreach ($ExamConfiguration->examConfigDetails as $examConfigDetail)
                        {{$examConfigDetail->questionCategory->name}}<br>
                    @endforeach
                </th>
                <th class="text-center">
                    @foreach ($ExamConfiguration->examConfigDetails as $examConfigDetail)
                        {{$examConfigDetail->questionDegree->name}}<br>
                    @endforeach
                </th>
                <th class="text-center">
                    @foreach ($ExamConfiguration->examConfigDetails as $examConfigDetail)
                        {{$examConfigDetail->quota}}<br>
                    @endforeach
                </th>
                <th class="text-center">{{ $ExamConfiguration->create_by }}</th>
                <th scope="col" class="position-center d-flex justify-content-around">
                    <div><a href="{{route("config-testing.edit", $ExamConfiguration->id)}}" class="btn btn-info btn-primary" role="button">Edit ConfigTest</a></div>
                    <button type="button" class="btn btn-danger delete-confirm-btn" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$ExamConfiguration-> id}}">
                        Delete ConfigTest
                    </button>
                </th>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Are you sure you want to delete this Config Testing ? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="deleteForm" method="POST" action="{{route('config-testing.destroy', "id")}}" > 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete ExamConfig</button> 
                </form>
            </div>   
        </div>
        </div>
    </div>
    {{ $ExamConfigurations->links() }}
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        let oldIdTarget;
    $(".delete-confirm-btn").click(function(){
        let idTarget = $(this).data('id');   
        action = $("#deleteForm").attr("action");
        if (action.search('id') != -1) {
            action = action.replace('id', idTarget);
        } else {
            action = action.replace(oldIdTarget, idTarget);
        }
        oldIdTarget = idTarget;
        console.log(action);
        $("#deleteForm").attr({
            "action" : action,
        });
    });
    });
</script>
@endpush
