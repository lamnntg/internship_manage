@extends('web.layout-candidate')

@section('content')
<div >
    <h3 class="text-center"> Test</h3>
</div>
<div>
    <form action="{{Route("submitTheExam",['candidateId' => $candidate->id, 'testId' => $testOnline->id])}}" method="POST">
    @csrf
        @foreach ($testOnline->question as $count => $testOnlineQuestion)
        <div class="card" style="margin: 20px 0;">
            <div class="card-header">
                <p><strong> Question {{$count +1 }} :</strong>{{ $testOnlineQuestion->question }}</p>
            </div>
            <div class="card-body">
                @foreach ( $testOnlineQuestion->examAnswer as $key => $answer)
                    <div class="checkbox">
                        <label><input type="checkbox" name="answer_choose_id[]" value="{{$answer->id}}"> <strong> Answer {{$key +1 }} :</strong> {{ $answer->answer }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary py-3">Submit</button>
        </div>
    </form>
</div>
@endsection