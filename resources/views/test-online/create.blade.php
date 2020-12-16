@extends('layouts.master')
@section('content')

  <div>
    <h2 class="text-center"> CREATE TEST ONLINE </h2>
    
    <div class="well clearfix">
        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
    </div>

    <form  method='POST' action="{{route('test-online.store')}}" id="formCreate">  
    @csrf
        <input type="hidden" id="candidate_id" name="candidate_id" value="{{$candidateId}}">
        <table class="table table-striped">
            <thead>
              <tr>
                  <th class="text-center">ExamConfig :</th>
                  <th class="text-center">Exam Type :</th>
                  <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody id="tbl_posts_body">
            
            </tbody>
        </table>
        <button type="submit" name= "submitCreate" class="btn btn-primary">Create Exam</button>
    </form>
    <div style="display:none;">
        <table id="sample_table" class="table text-center">
            <tr id="">
                <th class="text-center">
                    <div class="form-group">
                        <select class="form-control" id="exam_config_id" name="exam_config_id[]">
                            @foreach ($examConfigurations as $idCategory => $examConfiguration)
                                <option value="{{$examConfiguration->id}}">{{$examConfiguration->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </th>
                <th class="text-center">
                    <div class="form-group col">
                        <select class="form-control" id="exam_type" name="exam_type[]">
                            @foreach (\App\Models\Exam::$typeExams as $key => $typeExam)
                                <option value="{{$key}}">{{$typeExam}}</option>
                            @endforeach
                        </select>
                    </div>
                </th>
                <th class="text-center">
                    <button type="button" name="remove" id="" class="btn btn-danger delete-record" data-id="0">Remove</button>
                </th>
            </tr>
        </table>
    </div>
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