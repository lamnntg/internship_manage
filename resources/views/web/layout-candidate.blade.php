<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool</title>
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
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                  <li><a href="{{route('candidate.show', $candidate->id)}}" class="nav-link {{route('homePage') ? 'active' : ''}}">Home</a></li>
                  <li><a href="{{route('showChooseTheExam', $candidate->id)}}" class="nav-link {{request()->is('candidate/*/*') ? 'active' : ''}}">Test</a></li>
                </ul>
              </nav>
            </div>
  
            <div class="ml-auto w-25">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                  <li class="cta"><strong>{{$candidate->email}}</strong></li>
                  <li class="cta"><a href="{{route('logout-candidate')}}" class="nav-link"><span>Logout</span></a></li>
                </ul>
              </nav>
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
            </div>
          </div>
        </div>
        
      </header>
  
      <div class="intro-section single-cover" id="home-section">
        
        <div class="slide-1 " style="background-image: url('{{asset('web/images/examb.jpg')}}');" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12">
                <div class="row justify-content-center align-items-center text-center">
                  <div class="col-lg-6">
                  <h1 data-aos="fade-up" data-aos-delay="0">Welcome {{$candidate->full_name}}</h1>
                    <p data-aos="fade-up" data-aos-delay="100">You are having / {{App\Models\Exam::examOfCandidate($candidate->id)->count()}} Test &bullet; <a href="#" class="text-white">N comments</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" id="candidate_id" name="candidate_id" value="{{$candidate->id}}">
      <div class="site-section">
        <div class="container">
            @yield('content')
        </div>
      </div>

      
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
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