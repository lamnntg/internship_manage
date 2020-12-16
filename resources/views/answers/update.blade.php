@extends('layouts.master')
@section('content')

  <div class="card card-primary mt-2">
    <div class="card-header">
        <h1 class="text-center card-title">Update Answer</h1>
    </div>
    <div class="card-body">
        <form  method='POST' action="{{route('answer.update', $question->id)}}" id="formCreate">  
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="question">Question :</label>
                <textarea disabled name="question" class="form-control @error('question') is-invalid @enderror" id="question" cols="30" rows="6">{{$question->question}}</textarea>
                <p class="invalid-feedback">{{ $errors->first('question') }}</p>
            </div>
           
            <div class="form-group">
                <label for="answer_type">Answer Type : </label>
                <select class="form-control" id="answer_type" name="answer_type">
                    @foreach (\App\Models\Question::$typeAnswers as $key => $typeAnswer)
                        <option value="{{$key}}" {{ $key == 2 ? 'selected' : ''}} >{{$typeAnswer}}</option>
                    @endforeach
                </select>
            </div>
            
            <h4 class="text-center">Answers List</h4>
            @foreach ($question->answer as $key => $answer)
                <div class="form-row d-flex justify-content-start">
                    <div class="col-md-8">
                        <label for="answer">Answer {{$key + 1}}:</label>
                        <input type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer[]" value="{{$answer->answer}}" placeholder="Answer">
                        <p class="invalid-feedback">{{ $errors->first('answer') }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="correct_flag">Answer Correct : </label>
                        <select class="form-control" id="correct_flag" name="correct_flag[]">
                            <option value="1" {{ $answer->correct_flag == 1 ? 'selected' : ''}}>Correct</option>
                            <option value="0" {{ $answer->correct_flag == 0 ? 'selected' : ''}}>Incorrect</option>
                        </select>
                    </div>
                </div>
            @endforeach
            <button type="submit" name= "submitUpdate" class="btn btn-primary mt-3">Update Answers</button>
        </form>
    </div>
  </div>
@endsection
