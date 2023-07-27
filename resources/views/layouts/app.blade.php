<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css' />
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>

  <body>
    <div class="wrapper">
      <div id="overlay"></div>
      <!-- sidebar start -->
      <div class="sidebar shadow">
        <div class="admin_brand d-flex justify-content-between align-items-baseline">
          <div>
            <a class="nav-link fw-bold" href="#">
              <!-- <span class="icon"><i class="fas fa-code"></i></span> -->
              <span class="menu">CMS</span>
            </a>
          </div>
          <div class="d-block d-md-none">
            <a href="javascript:void(0)" id="close_sidebar"><i class="fas fa-times-circle fa-lg"></i></a>
          </div>
        </div>

        <ul class="nav nav-pills flex-column">

          <li class="nav-item active">
            <a class="nav-link" href="#">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Dashboard"><i class="fas fa-dashboard"></i></span>
              <span class="menu">Dashboard</span>
            </a>
          </li>

        
          <li class="nav-item">
          <a class="nav-link" href="{{route('create.category')}}">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Users"><i class="fas fa-users"></i></span>
              <span class="menu">Category</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('contents.index')}}">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Users"><i class="fas fa-users"></i></span>
              <span class="menu">Content</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('tags.show')}}">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Users"><i class="fas fa-users"></i></span>
              <span class="menu">Tags</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('media.index')}}">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Users"><i class="fas fa-users"></i></span>
              <span class="menu">Media</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{route('users')}}">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Users"><i class="fas fa-users"></i></span>
              <span class="menu">Users</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="icon" data-bs-toggle="tooltip" data-bs-title="Logout"><i class="fas fa-sign-out"></i></span>
              <span class="menu">Logout</span>
            </a>
          </li>

        </ul>
      </div>

      @include('layouts.body.header')


  <main id="main" class="main">

    @yield('body_contents')

  </main>



  @include('layouts.body.footer')


  <script>
    {{-- toastr message --}}
  @if(Session::has('message'))
  let type = "{{ Session::get('alert-type', 'info') }}"
  switch (type) {
    case 'info':
      toastr.info("{{ Session::get('message') }}");
      break;
    case 'success':
      toastr.success("{{ Session::get('message') }}")
      break;
    case 'warning':
      toastr.warning("{{ Session::get('message') }}")
      break;
    case 'error':
      toastr.error("{{ Session::get('message') }}")
      break;
  
    default:
      break;
  }
  @endif
</script>

{{-- sweetalert msg for deleting item --}}
<script>
  $(document).on("click", "#delete", function(e) {
    e.preventDefault();

    let link = $(this).attr("href");

    swal({
      title: "Are you sure you want to delete?",
      text: "Once delete, this will be permanently deleted",
      closeOnClickOutside: false,
      icon: "warning",
      buttons: true,
      dangerMode: true
    })
    .then((willDelete) => {
      if(willDelete) {
        window.location.href = link;
      } else {
        swal("Safe Data!");
      }
    });
  });
</script>

{{-- sweetalert msg for restoring item --}}
<script>
  $(document).on("click", "#restore", (e) => {
    e.preventDefault();

    let link = $(this).attr("href");

    swal({
      title: "Are you sure you want to restore this item?",
      text: "Once restored, this item will be back to the distributors table",
      closeOnClickOutside: false,
      icon: "warning",
      buttons: true,
      dangerMode: true
    })
    .then((willRestore) => {
      if(willRestore){
        window.location.href = link;
      }else{
        swal("Safe Data");
      }
    });
  });
</script>
</body>

</html>