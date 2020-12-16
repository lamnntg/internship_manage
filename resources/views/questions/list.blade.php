@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h1 class="text-center card-title">LIST QUESTION</h1>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-between row " >
            <form class="d-flex justify-content-between col-6" method="GET" action="{{ route('questions.index') }}">
                <div class="mb-2 col">
                    <input type="text" class="form-control" placeholder="Question" name="question">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
            </form>
            <div><a href="{{route("questions.create")}}" class="btn btn-outline-info pull-right">CREATE QUESTION</a></div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Question</th>
                <th class="text-center">Media URL</th>
                <th class="text-center">Answer Type</th>
                <th class="text-center">Check Point Flag</th>
                <th class="text-center">Interview Flag</th>
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
                    <th scope="col" class="d-flex justify-content-between">
                        <a href="{{route("questions.edit", $question-> id)}}" class="btn btn-info mb-1" role="button">Edit</a>
                        @if ($question->answer->first()==NULL)
                            <a href="{{route("answer.show", $question-> id)}}" class="btn btn-outline-primary mb-1" role="button">Create Answer</a>
                        @else
                            <a href="{{route("answer.edit", $question-> id)}}" class="btn btn-outline-primary mb-1" role="button">Update Answer</a>
                        @endif
                        <button type="button" class="btn btn-danger delete-confirm-btn mb-1" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$question-> id}}">
                            Delete
                        </button>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <span class="d-flex flex-row-reverse bd-highlight">{{ $questions->appends(request()->query())->links() }}</span> 
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
