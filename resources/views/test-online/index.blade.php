@extends('layouts.master')

@section('content')
<h1 class="text-center"> Test Online</h1>

<a class="btn btn-primary mb-1" href="{{ route('createExam', $candidateId) }}" role="button">Create Exam</a>
<table class="table table-bordered">
    <tbody>
    <tr>
        <td>
            @foreach ($testsOnline as $countTest => $testOnline)
            <table id="" class="table table-bordered table-hover">
                <tr class="text-center"><strong>Test Number {{$countTest + 1}} . Type : {{$testOnline->exam_type}}</strong></tr>
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($testOnline->question as $count => $testOnlineQuestion)
                    <tr>
                        <td><strong> Question {{$count +1 }} :</strong>{{ $testOnlineQuestion->question }}</td>
                        <td>
                            @foreach ( $testOnlineQuestion->examAnswer as $key => $answer)
                            <strong> Answer {{$key +1 }} :</strong> {{ $answer->answer }} <br>
                            @endforeach
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </td>
    </tr>
    </tbody>
</table>

@endsection

