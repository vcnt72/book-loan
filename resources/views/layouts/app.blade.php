<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/layout.css') }}" />
  <title>@yield('title')</title>
  @yield('custom-css')
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#"><strong>Nama Perusahaan</strong> </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link"> Register </a></li>
        @endguest

        @if (Auth::user())
        <li class="nav-item">
          <a href="{{ route('profile') }}" class="nav-link"> Profile </a>
        </li>



        @if (Auth::user()->role->name === 'member' || Auth::user()->role->name === 'publisher')
        <li class="nav-item">
          <a href="{{ route('borrow.index') }}" class="nav-link"> Borrow </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('book.index') }}" class="nav-link"> Book </a>
        </li>
        @endif



        @if (Auth::user()->role->name === 'admin')
        <li class="nav-item">
          <a href="{{ route('adminView') }}" class="nav-link"> Book management </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

  @yield('content')


  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col footer-human-info">
              <img src="{{asset('images/phoneNumber.png')}}" class="footer-logo" alt="" />
              <span>(630) 296-7536</span>
            </div>
          </div>
          <div class="row">
            <div class="col footer-human-info">
              <img src="{{asset('images/black-email-logo.png')}}" alt="" class="footer-logo" />
              <span>johndoe@email.com</span>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="row">
            <div class="col footer-socmed-container">
              <img src="{{asset('images/f_logo_RGB-Hex-Blue_512.png')}}" class="footer-logo" alt="facebook logo" />
              <div>Facebook</div>
            </div>
            <div class="col footer-socmed-container">
              <img src="{{asset('images/1024px-Instagram_logo_2016.svg.png')}}" alt="instagram logo"
                class="footer-logo" />
              <div>Instagram</div>
            </div>
            <div class="col footer-socmed-container">
              <img src="{{asset('images/Twitter_bird_logo_2012.svg.png')}}" alt="" class="footer-logo" />
              <div class="footer-logo-text">Twitter</div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="footer-copyright-text">
                Copyright by Nama Perusahaan
              </div>
            </div>
          </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </footer>
</body>

</html>