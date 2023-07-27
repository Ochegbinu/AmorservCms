
      <!-- sidebar end -->
      <div class="content">
        <!-- top navbar start -->
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
          <div class="container-fluid px-3">

            <button class="navbar-toggler border-0" type="button" id="show_sidebar_phone">
              <span class="navbar-toggler-icon"></span>
            </button>


            <a class="navbar-brand d-none d-md-block" href="javascript:void(0)" id="show_sidebar_pc">
              <i class="fas fa-bars fa-lg"></i>
            </a>

            <div class="fw-bold text-secondary d-md-none d-block">Admin Panel</div>


            <div class="ms-auto d-flex align-items-center">

              <div class="nav-item d-none d-md-block me-2" data-bs-toggle="tooltip" data-bs-title="Full Screen" data-bs-placement="left">
                <a href="#" class="nav-link" id="fullscreen">
                  <i class="fa-solid fa-expand"></i>
                </a>
              </div>

              <div class="dropdown">

                <a class="nav-link dropdown-toggle py-1 px-3 rounded-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle me-1"></i>{{Auth::user()->name}}
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                  <form method="POST" action="{{ route('profile.edit') }}">
                    @csrf
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-user me-2"></i>Profile
                    </a>
                </form>
                  </li>
                  <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear me-2"></i>Account</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                    </a>
                </form>
                  </li>
                </ul>
              </div>


            </div>


          </div>
        </nav>
        <!-- top navbar end -->