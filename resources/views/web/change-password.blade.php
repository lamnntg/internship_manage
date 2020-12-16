<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("web/fonts/icomoon/style.css")}}">

    <link rel="stylesheet" href="{{asset("web/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("web/css/jquery-ui.css")}}">
    <link rel="stylesheet" href="{{asset("web/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("web/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("web/css/owl.theme.default.min.css")}}">

    <link rel="stylesheet" href="{{asset("web/css/jquery.fancybox.min.css")}}">

    <link rel="stylesheet" href="{{asset("web/css/bootstrap-datepicker.css")}}">

    <link rel="stylesheet" href="{{asset("web/fonts/flaticon/font/flaticon.css")}}">

    <link rel="stylesheet" href="{{asset("web/css/aos.css")}}">

    <link rel="stylesheet" href="{{asset("web/css/style.css")}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="{{url()->current()}}">OneSchool</a></div>

          <div class="mx-auto text-center">
            
          </div>

          <div class="ml-auto w-25">
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
    </header>
    <div class="intro-section" id="home-section">
      <div class="slide-1" style=" background-image: url('{{asset('web/images/backg.jpg')}}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Learn From The Expert</h1>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="{{url("http://localhost:8000")}}" class="btn btn-primary py-3 px-5 btn-pill">Home Page</a></p>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">@include('flash::message')</p>
                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="{{route('updatePassword', $candidate->id)}}" method="POST" class="form-box">
                  @csrf
                    <h3 class="h4 text-black mb-4">Confirm your account</h3>
                    @if (!empty($candidate->user_name))
                      <div class="form-group">
                        <input disabled type="text" name="" class="form-control" placeholder="" value="{{$candidate->user_name}}">
                      </div>
                    @else
                      <div class="form-group">
                        <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" placeholder="User Name" value="{{old("user_name")}}">
                        <p class="invalid-feedback text-danger">{{ $errors->first('user_name') }}</p>
                      </div>
                    @endif
                    <div class="form-group">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password">
                      <p class="invalid-feedback text-danger">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirm">
                      <p class="invalid-feedback">{{ $errors->first('password_confirmation') }}</p>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div> <!-- .site-wrap -->
  <script src="{{asset("web/js/jquery-3.3.1.min.js")}}"></script>
  <script src="{{asset("web/js/jquery-migrate-3.0.1.min.js")}}"></script>
  <script src="{{asset("web/js/jquery-ui.js")}}"></script>
  <script src="{{asset("web/js/popper.min.js")}}"></script>
  <script src="{{asset("web/js/bootstrap.min.js")}}"></script>
  <script src="{{asset("web/js/owl.carousel.min.js")}}"></script>
  <script src="{{asset("web/js/jquery.stellar.min.js")}}"></script>
  <script src="{{asset("web/js/jquery.countdown.min.js")}}"></script>
  <script src="{{asset("web/js/bootstrap-datepicker.min.js")}}"></script>
  <script src="{{asset("web/js/jquery.easing.1.3.js")}}"></script>
  <script src="{{asset("web/js/aos.js")}}"></script>
  <script src="{{asset("web/js/jquery.fancybox.min.js")}}"></script>
  <script src="{{asset("web/js/jquery.sticky.js")}}"></script>

  
  <script src="{{asset("web/js/main.js")}}"></script>
    
  </body>
</html>