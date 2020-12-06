@extends('layouts.master')

@section('content')
<div class="card card-primary">
    <h2 class="text-center card-header"> Edit Form </h2>
    <div class="card-body">
      <form  method='POST' action="{{route('config-testing.update', $examConfig->id)}}" id="formCreate"> 
          @method('PUT') 
          @csrf
          <div class="form-group">
              <label for="name">Name Exam Configuration: </label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{$examConfig->name}}">
              @error('name')
                  <div class="invalid-feedback">Please provide a valid name.</div>
              @enderror
          </div>
          <div class="well clearfix">
              <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
          </div>
            <table class="table table-striped">
              <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Question Category</th>
                    <th class="text-center">Question Degree</th>
                    <th class="text-center">Quota</th>
                    <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody id="tbl_posts_body">
                  @foreach ($examConfig->examConfigDetails as $no => $examConfigDetail)
                  <tr id="{{'rec-'.strtolower($no+1)}}">
                      <th class="text-center"><span class="sn">{{$no + 1}}</span></th>
                      <th class="text-center">
                          <div class="form-group col">
                              <select class="form-control" id="question_category_id" name="question_category_id[]">
                                  @foreach ($questionCategories as $key => $questionCategory)
                                      <option value="{{$key}}" {{ $examConfigDetail->question_category_id == $key ? 'selected' : ''}} >{{$questionCategory}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </th>
                      <th class="text-center">
                          <div class="form-group col">
                              <select class="form-control" id="question_degree_id" name="question_degree_id[]">
                                  @foreach ($questionDegrees as $key => $questionDegree)
                                      <option value="{{$key}}" {{ $examConfigDetail->question_degree_id == $key ? 'selected' : ''}} >{{$questionDegree}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </th>
                      <th class="text-center">
                          <div class="form-group">
                              <input required type="number" class="form-control" id="quota" name="quota[]" placeholder="" value="{{$examConfigDetail->quota}}">
                          </div>
                      </th>
                      <th><button type="button" name="remove" id="" class="btn btn-danger delete-record" data-id="{{$no + 1}}">Remove</button></th>
                  </tr>
                  @endforeach
                
              </tbody>
            </table>
            <button type="submit" name="submitConfig" class="btn btn-danger">Submit</button> 
      </form>
    </div>
</div>
<div style="display:none;">
    <table id="sample_table">
      <tr id="">
        <th class="text-center"><span class="sn"></span></th>';
        <th class="text-center">
          <div class="form-group col">
            <select class="form-control" id="question_category_id" name="question_category_id[]">
              @foreach ($questionCategories as $key => $questionCategory)
              <option value="{{$key}}">{{$questionCategory}}</option>
              @endforeach
            </select>
          </div>
        </th>
        <th class="text-center">
          <div class="form-group col">
            <select class="form-control" id="question_degree_id" name="question_degree_id[]">
              @foreach ($questionDegrees as $key => $questionDegree)
                <option value="{{$key}}">{{$questionDegree}}</option>
              @endforeach
            </select>
          </div>
        </th>
        <th class="text-center">
          <div class="form-group col">
            <input required type="number" class="form-control  @error('quota') is-invalid @enderror" id="quota" name="quota[]" aria-describedby="idHelp" value="{{old("quota[]")}}">
          </div>
        </th>
        <th><button type="button" name="remove" id="" class="btn btn-danger delete-record" data-id="0">Remove</button></th>
      </tr>
    </table>
</div>
@endsection

@push('scripts')
    <script>
    let count = $('#tbl_posts_body>tr').length + 1; 
    $(document).delegate('a.add-record', 'click', function(e) {
      e.preventDefault();    
      var content = $('#sample_table tr'),
      size = $('#tbl_posts_body>tr').length + 1,
      element = null,    
      element = content.clone();
      element.attr('id', 'rec-'+count);
      element.find('.delete-record').attr('data-id', count);
      element.appendTo('#tbl_posts_body');
      element.find('.sn').html(size);
      count ++;
    });

    $(document).delegate('.delete-record', 'click', function(e) {
        e.preventDefault();    
        var id = $(this).attr('data-id');
        var targetDiv = $(this).attr('targetDiv');
        $('#rec-' + id).remove(); 

        $('#tbl_posts_body tr').each(function(index) {
            $(this).find('span.sn').html(index+1);
        });
    });
    </script>
@endpush
