@extends('web.layout-candidate')
@section('content')
<div class="row">
  <div class="col-lg-8 pl-lg-5">
    <div class="mb-5 text-center border rounded course-instructor">
      <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Candidate Information </h3>
      <div class="mb-4 text-left">
        <img src="{{asset("web/images/avatar.jpg")}}" alt="Image" class="w-25 rounded-circle mb-4">  
        <h3 class="h5 text-black mb-4">{{$candidate->full_name}}</h3>
        <p> &bullet; <strong>Birthday :</strong> {{$candidate->birthday}}</p>
        <p> &bullet; <strong>Address :</strong> {{$candidate->address}}</p>
        <p> &bullet; <strong>Phone :</strong> {{$candidate->phone}}</p>
        <p> &bullet; <strong>Email :</strong> {{$candidate->email}}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mb-5">
    <div class="mb-5">
      <h4 class="text-black text-center">Comment Of Mentor</h4>
      @yield('main-content')
    </div>
  </div>
</div>
@endsection
