@extends('layouts.master')
@section('content')

  <div class="card card-primary">
    <h2 class="text-center card-header"> CREATE QUESTION </h2>
    <div class="card-body">
        <form  method='POST' action="{{route('questions.store')}}" id="formCreate">  
        @csrf
            <div class="form-group">
                <label for="question_category_id">Question Category :</label>
                <select class="form-control" id="question_category_id" name="question_category_id">
                    @foreach ($questionCategories as $idCategory => $questionCategory)
                        <option value="{{$idCategory}}">{{$questionCategory}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question_degree_id">Question Degree : </label>
                <select class="form-control" id="question_degree_id" name="question_degree_id">
                    @foreach ($questionDegrees as $idDegree => $questionDegree)
                        <option value="{{$idDegree}}">{{$questionDegree}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question :</label>
                <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="question" cols="30" rows="10">{{old("question")}}</textarea>
                <p class="invalid-feedback">{{ $errors->first('question') }}</p>
            </div>
            <div class="form-group">
                <label for="media_url">Media URL :</label>
                <input type="text" class="form-control @error('media_url') is-invalid @enderror" id="media_url" name="media_url" value="{{old("media_url")}}" placeholder="Can Be Nullable">
                <p class="invalid-feedback">{{ $errors->first('media_url') }}</p>
            </div>
            <div class="form-group">
                <label for="answer_type">Answer Type : </label>
                <select class="form-control" id="answer_type" name="answer_type">
                    @foreach (\App\Models\Question::$typeAnswers as $key => $typeAnswer)
                        <option value="{{$key}}">{{$typeAnswer}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="check_point_flg">Check Point Flag :</label>
                <div>
                    <input type="radio" id="yes_check_point_flg" name="check_point_flg" value="1">
                    <label for="yes_check_point_flg">Yes</label><br>
                    <input type="radio" id="no_check_point_flg" name="check_point_flg" value="0">
                    <label for="no_check_point_flg">No</label><br>
                </div>
            </div>
            <div class="form-group">
                <label for="interview_flg">Interview Flag : </label>
                <div>
                    <input type="radio" id="yes_interview_flg" name="interview_flg" value="1">
                    <label for="yes_interview_flg">Yes</label><br>
                    <input type="radio" id="no_interview_flg" name="interview_flg" value="0">
                    <label for="no_interview_flg">No</label><br>
                </div>
            </div>
            <button type="submit" name= "submitCreate" class="btn btn-primary">Create Question</button>
        </form>
    </div>
  </div>
@endsection
