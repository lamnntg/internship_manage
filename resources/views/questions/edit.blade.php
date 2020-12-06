@extends('layouts.master')

@section('content')
<div class="card card-primary">
    <h2 class="text-center card-header"> Edit Form </h2>
    <div class="card-body">
        <form  method='POST' action="{{route('questions.update', $tagetQuestion->id)}}" id="formEdit">  
        @method('PUT')
        @csrf
            <div class="form-group">
                <label for="question_category_id">Question Category :</label>
                <select name="question_category_id" id="question_category_id" class="form-control">
                    @foreach ($questionCategories as $key => $questionCategory )
                        <option value="{{$key}}" {{ $tagetQuestion->question_category_id == $key ? 'selected' : ''}}>{{$questionCategory}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question_degree_id">Question Degree :</label>
                <select name="question_degree_id" id="question_degree_id" class="form-control">
                    @foreach ($questionDegrees as $key => $questionDegree )
                        <option value="{{$key}}" {{ $tagetQuestion->question_degree_id == $key ? 'selected' : ''}}>{{$questionDegree}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question :</label>
                <textarea name="question" class="form-control  @error('question') is-invalid @enderror" id="question" cols="30" rows="10">{{$tagetQuestion->question}}</textarea>
                <p class="help is-danger">{{ $errors->first('question') }}</p>
            </div>
            <div class="form-group">
                <label for="media_url">Media URL :</label>
                <input type="text" class="form-control form-control  @error('media_url') is-invalid @enderror" id="media_url" name="media_url" value="{{$tagetQuestion->media_url}}">
                <p class="help is-danger">{{ $errors->first('media_url') }}</p>
            </div>
            <div class="form-group">
                <label for="answer_type">Anser Type :</label>
                <select name="answer_type" id="answer_type" class="form-control">
                    @foreach (\App\Models\Question::$typeAnswers as $key => $typeAnswer )
                    <option value="{{$key}}" {{ $tagetQuestion->answer_type == $key ? 'selected' : ''}}>{{$typeAnswer}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="check_point_flg">Check Point Flag :</label>
                <div>
                    <input type="radio" id="yes_check_point_flg" name="check_point_flg" value="1" {{ $tagetQuestion-> check_point_flg == 1 ? 'checked' : ''}}>
                    <label for="yes_check_point_flg">Yes</label><br>
                    <input type="radio" id="no_check_point_flg" name="check_point_flg" value="0" {{ $tagetQuestion-> check_point_flg == 0 ? 'checked' : ''}}>
                    <label for="no_check_point_flg">No</label><br>
                </div>

            </div>
            <div class="form-group">
                <label for="interview_flg">Interview Flag :</label>
                <div>
                    <input type="radio" id="yes_interview_flg" name="interview_flg" value="1" {{ $tagetQuestion-> interview_flg == 1 ? 'checked' : ''}}>
                    <label for="yes_interview_flg">Yes</label><br>
                    <input type="radio" id="no_interview_flg" name="interview_flg" value="0" {{ $tagetQuestion-> interview_flg == 0 ? 'checked' : ''}}>
                    <label for="no_interview_flg">No</label><br>
                </div>
            </div>
                <button type="submit" name="submitEdit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
    
@endsection
