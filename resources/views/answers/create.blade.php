@extends('layouts.master')
@section('content')

  <div class="card card-primary mt-2">
    <div class="card-header">
        <h1 class="text-center card-title">Create Answer</h1>
    </div>
    <div class="card-body">
        <form  method='POST' action="{{route('answer.store', $question->id)}}" id="formCreate">  
        @csrf
            <div class="form-group">
                <label for="question">Question :</label>
                <input hidden type="text" class="form-control" value="{{$question->id}}" name="question_id">
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
            
            @for ($i = 0; $i < 4; $i++)
                <div class="form-row d-flex justify-content-start">
                    <div class="col-md-8">
                        <label for="answer">Answer {{$i + 1}}:</label>
                        <input required type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer[]" value="" placeholder="Answer">
                        <p class="invalid-feedback">{{ $errors->first('answer') }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="correct_flag">Answer Correct : </label>
                        <select class="form-control" id="correct_flag" name="correct_flag[]">
                            <option value="1">Correct</option>
                            <option value="0">Incorrect</option>
                        </select>
                    </div>
                </div>
            @endfor
            <button type="submit" name= "submitCreate" class="btn btn-primary mt-5">Create Answers</button>
        </form>
    </div>
  </div>
@endsection
