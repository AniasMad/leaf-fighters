<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaf Fighters</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar sticky-top bg-secondary">
<div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Leaf Fighters</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa-solid fa-bars" style="color: #FDF8EE;"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="{{ route('login') }}">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="{{ route('register') }}">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">About Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container-fluid py-5 bg-primary d-flex justify-content-center">
      <div class="text-center">
        <h1 class="text-light">Leaf Fighters,</h1>
        <h1 class="text-light">Assemble!</h1>
      </div> 
    </div>
    <div class="container-fluid bg-secondary py-1">
      <br></br>
    </div>

    <div class="container pt-5">
  <div class="row mx-5 d-flex justify-content-center">
    <div class="col-lg-5 col-sm-12 bg-success px-4">
      <div class="bg-success px-5 image-container">
        <img src="{{ asset('images/chip.PNG') }}" alt="chip" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-5 col-sm-12 bg-primary mx-4">
      <div class="bg-primary px-4 py-3 d-flex flex-column">
        <h2 class="text-light text-left">Meet Chip</h2>
        <p class="text-wrap fs-3 text-light">Chip is a lone fighter who joined the Leaf Fighters when the world was in danger.</p>
      </div>
    </div>
  </div>
</div>
<div class="container pt-5">
  <div class="row mx-5 d-flex justify-content-center">
    <div class="col-lg-5 col-sm-12 bg-primary px-4">
      <div class="bg-primary px-4 py-3 d-flex flex-column">
        <h2 class="text-light text-left">Meet Ivy</h2>
        <p class="text-wrap fs-3 text-light">Ivy was one of the Co-Creators of Leaf Fighters. They chose to gather the strongest fighters.</p>
      </div>
    </div>
    <div class="col-lg-5 col-sm-12 bg-success mx-4">
      <div class="bg-success px-4 image-container">
        <img src="{{ asset('images/ivy.PNG') }}" alt="ivy" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<div class="container pt-5">
  <div class="row mx-5 d-flex justify-content-center">
    <div class="col-lg-5 col-sm-12 bg-success px-4">
      <div class="bg-success px-5 image-container">
        <img src="{{ asset('images/pixel.PNG') }}" alt="pixel" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-5 col-sm-12 bg-primary mx-4">
      <div class="bg-primary px-4 py-3 d-flex flex-column">
        <h2 class="text-light text-left">Meet Pixel</h2>
        <p class="text-wrap fs-3 text-light">Pixel has 2 master degrees, PhD in Environmental Science, and an awesome hat. He is a co-founder of Leaf Fighters.</p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-primary py-5 my-5 d-flex flex-column justify-content-center">
  <div class="d-flex flex-column justify-content-center">
    <div class="align-self-center py-2">
      <a href="{{ route('register') }}">
        <button type="button" class="btn btn-secondary text-light align-self-center"><h3 class="px-5">Sign Up</h3></button> 
      </a>
    </div>
    <div class="align-self-center py-2">
      <a href="{{ route('login') }}">
        <button type="button" class="btn btn-success text-light"><h3 class="px-5">Log In</h3></button>
      </a>
    </div>
  </div>  
</div>

<div class="navbar navbar-expand-lg bg-success mt-5">
  <div class="container-fluid">
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
      <ul class="navbar-nav align-self-center">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><p class="fs-5">About Us</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><p class="fs-5">Endangered Species</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><p class="fs-5">Tutorial</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#"><p class="fs-5">Privacy Policy</p></a>
        </li>
      </ul>
    </div>
  </div>
</div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/b20f6317fc.js" crossorigin="anonymous"></script>
</body>
</html>
