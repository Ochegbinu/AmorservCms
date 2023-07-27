<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your CMS Landing Page</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS for the hero section background image */
    .hero {
      background: url('/try') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
      padding: 100px 0; /* Add some padding to center the content vertically */
    }

    /* CSS for the side navigation card */
    .side-nav-card {
      background-color: #f8f9fa;
      padding: 20px;
    }

    iframe {
            width: 100%;
            height: 56.25vw; /* 16:9 aspect ratio (height/width) */
            max-height: 100vh; 
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Amorserv CMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
        <!-- Check if the user is logged in, if yes, display the Dashboard link -->
        @if (Route::has('login'))
        <li class="nav-item">
                    @auth
                        <a class="nav-link" id="dashboard-link" href="{{ url('/dashboard') }}">Dashboard</a>

                    </li>

                        @else
                        <li class="nav-item">
                        <a class="nav-link" id="login-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">

                            <a class="nav-link" id="register-link" href="{{ route('register') }}">Register</a>

                        </li>

                            @endif
                    @endauth
                </div>
            @endif

        </li>
       
      </ul>
    </div>
  </div>
</nav>

<!-- Hero section -->
<section class="hero bg-primary text-white text-center py-5">
  <div class="container">
    <h1 class="display-4">Welcome to Your CMS</h1>
    <p class="lead">A powerful and user-friendly content management system.</p>
    <a href="{{route('login')}}" class="btn btn-light btn-lg">Get Started</a>
  </div>
</section>

<!-- Main content and side navigation -->
<div class="container py-5">
  <div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
      <!-- Features section -->
      <section class="features">
    <div class="container">
        <div class="row">
            @foreach($contents as $content)
            <div class="col-md-6">
                <h3>{{ $content->title }}</h3>
                <p>{!! Str::limit($content->body, 200) !!} Date: {{ $content->created_at->format('M d, Y')}}</p>
                <a href="" class="btn btn-primary">Read More</a>
            </div>
            @endforeach
        </div>
    </div>
</section>


      <!-- Media section -->
      <section class="media py-5">
        <div class="container">
          <h2 class="text-center mb-4">Media</h2>
          <!-- <div class="row">
            <div class="col-md-4">
              <video controls class="img-fluid mb-3">
                <source src="path/to/video1.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <p>Description for Video 1</p>
            </div>
          -->
                      <!-- <div class="row">
                @foreach($medias as $video)
                    <div class="col-md-4">
                        <video controls class="img-fluid mb-3">
                            <source src="{{ asset('storage/' . $video->type) }}" type="{{ $video->mime_type }}">
                            <p>{{$video->filename}}</p>
                        </video>
                    </div>
                @endforeach
            </div> -->
 
<div class="row">
    @foreach($medias as $video)
        <div class="col-md-4">
            <a href="{{ asset('storage/' . $video->type) }}" target="_blank">
                <video controls class="img-fluid mb-3" poster="{{ asset('path_to_video_thumbnail.jpg') }}">
                    <source src="{{ asset('storage/' . $video->type) }}" type="{{ $video->mime_type }}">
                    Your browser does not support the video tag.
                </video>
            </a>
            <p>{{$video->filename}}</p>
        </div>
    @endforeach
</div>

        </div>
      </section>
    </div>

    <!-- Side Navigation Section -->
    <section class="col-lg-4">
      <!-- Categories Card -->
      <div class="card side-nav-card">
        <div class="card-body">
          <h5 class="card-title">Categories</h5>
          @foreach ($categories as $key => $category )           
          <ul class="list-group">
            <li class="list-group-item">{{$category->name}}</li>           
          </ul> 
          @endforeach
        </div>
      </div>

      <!-- Tags Card -->
      <div class="card side-nav-card mt-4">
        <div class="card-body">
          <h5 class="card-title">Tags</h5>
         @foreach ($tags as $key => $tag )               
          <ul class="list-group">
            <li class="list-group-item">{{$tag->name}}</li>           
          </ul>  
          @endforeach
        </div>
      </div>
    </section>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p>&copy; 2023 Your CMS. All rights reserved.</p>
</footer>

<!-- Bootstrap JS and Font Awesome icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
