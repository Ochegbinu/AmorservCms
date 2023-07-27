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
    <a class="navbar-brand" href="{{route('home')}}">Amorserv CMS</a>
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

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies felis eu diam hendrerit,
                        vel luctus tellus cursus. Nulla ac lorem sit amet turpis varius mollis non quis velit. Nam
                        consequat, dui eu aliquet ultrices, neque quam aliquet nisl, sit amet tristique elit arcu nec
                        est.
                    </p>

                    <h3>Mission</h3>
                    <p>
                        Our mission is to provide high-quality products and services to our customers and exceed their
                        expectations in every way possible.
                    </p>

                    <h3>Vision</h3>
                    <p>
                        Our vision is to become the leading company in our industry by constantly innovating and
                        delivering exceptional value to our clients.
                    </p>
                </div>
                <div class="col-md-6">
                <img src="{{ asset('images/amor.png') }}" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Add your JavaScript scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
