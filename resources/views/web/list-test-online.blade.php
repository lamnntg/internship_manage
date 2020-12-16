@extends('web.layout-candidate')
@section('content')
<h3>List Test</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name Of Candidate</th>
        <th scope="col">Exam Type</th>
        <th scope="col">Score</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($testsOnline as $key => $test)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$candidate->full_name}}</td>
            <td>{{\App\Models\Exam::$typeExams[$test->exam_type]}}</td>
            <td>{{$test->score}}/{{$test->question->count()}}</td>
            @if ($test->completed_at)
                <td>{{'Finished'}}</td>
                <td><a href="{{route('resultTheExam', ['candidateId' => $candidate->id, 'testId' => $test->id])}}" class="btn btn-outline-primary">Resuilt</a></td>
            @else
                <td>{{'Unfinished'}}</td>
                <td><a href="{{route('doTheExam', ['candidateId' => $candidate->id, 'testId' => $test->id])}}" class="btn btn-outline-primary">Test</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
