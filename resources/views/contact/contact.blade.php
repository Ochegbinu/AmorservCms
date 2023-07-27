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

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Contact Us</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <h4>Contact Information</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-envelope"></i> info@example.com</li>
                            <li><i class="bi bi-phone"></i> +123 456 7890</li>
                            <li><i class="bi bi-geo-alt"></i> Your Address, City, Country</li>
                        </ul>
                    </div>
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
