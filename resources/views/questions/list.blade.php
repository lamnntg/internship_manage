@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h1 class="text-center card-title">LIST QUESTION</h1>
    </div>
    <div class="card-body">
        <div><a href="{{route("questions.create")}}" class="btn btn-info pull-right">CREATE QUESTION</a></div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Question</th>
                <th class="text-center">Media URL</th>
                <th class="text-center">Answer Type</th>
                <th class="text-center">Check Point Flag</th>
                <th class="text-center">Interview Flag</th>
                <th class="text-center">Created By</th>
                <th class="text-center">Updated By</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($questions as $key => $question)
                <tr>
                    <th class="text-center">{{$key +($questions->currentPage() - 1)* $questions->perPage() + 1 }}</th>
                    <th >{{ $question->question}}</th>
                    <th class="text-center">{{ $question->media_url}}</th>
                    <th class="text-center">{{ \App\Models\Question::$typeAnswers[$question->answer_type]}}</th>
                    <th class="text-center">{{ $question->check_point_flg == 1  ? 'Yes' : 'No'}}</th>
                    <th class="text-center">{{ $question->interview_flg == 1  ? 'Yes' : 'No'}}</th>
                    <th class="text-center">{{ $question->created_by}}</th>
                    <th class="text-center">{{ $question->updated_by}}</th>
                    <th scope="col" class="d-flex justify-content-between">
                        <a href="{{route("questions.edit", $question-> id)}}" class="btn btn-info btn-sm" role="button">Edit</a>
                        <button type="button" class="btn btn-danger delete-confirm-btn btn-sm" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$question-> id}}">
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
            Are you sure you want to delete this question ? 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form id="delete-question" action="{{ route('questions.destroy', 'id')}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div>
        <span class="d-flex flex-row-reverse bd-highlight">{{ $questions->links() }}</span> 
    </div>
</div> 
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        let oldIdTarget;
    $(".delete-confirm-btn").click(function() {
        let idTarget = $(this).data('id');   
        action = $("#delete-question").attr("action");
        if (action.search('id') != -1) {
            action = action.replace('id', idTarget);
        } else {
            action = action.replace(oldIdTarget, idTarget);
        }
        oldIdTarget = idTarget;
        $("#delete-question").attr({
            "action" : action,
        });
    });
    });
</script>
@endpush
