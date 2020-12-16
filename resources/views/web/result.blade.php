@extends('web.layout-candidate')

@section('content')
<div >
    <h3 class="text-center"> Test Result</h3>
</div>
<div>
    @foreach ($testOnline->question as $count => $testOnlineQuestion)
    <div class="card" style="margin: 20px 0;">
        <div class="card-header">
            <p><strong> Question {{$count +1 }} :</strong>{{ $testOnlineQuestion->question }}</p>
        </div>
        <div class="card-body">
            @foreach ( $testOnlineQuestion->examAnswer as $key => $answer)
                <div class="checkbox @if($answer->correct_flag == 1) text-danger  @endif">
                    <label><strong> Answer {{$key +1 }} :</strong> {{ $answer->answer }}</label>
                </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection