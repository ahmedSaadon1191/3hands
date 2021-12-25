<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
  <div class="container">
      <a class="navbar-brand mx-auto d-lg-none" href="index.html">
          Medic Care
          <strong class="d-block">Health Specialist</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
             

             @auth
             <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.articales.index') }}">Articales</a>
                </li>
                <a class="navbar-brand d-none d-lg-block" href="">
                    {{ auth()->user()->name }}
                    <strong class="d-block">User Account </strong>
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.profile.edit',auth()->user()->id) }}">Profile</a>
                </li>
             @else
             <li class="nav-item active">
                <a class="nav-link" href="#hero">Home</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Register</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="#booking">Login</a>
                </li>
                <a class="navbar-brand d-none d-lg-block" href="index.html">
                    Medic Care
                    <strong class="d-block">Health Specialist</strong>
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="#timeline">Timeline</a>
                </li>
             @endauth
              

             

              <li class="nav-item">
                  <a class="nav-link" href="#reviews">Testimonials</a>
              </li>

             

              
          </ul>
      </div>

  </div>
</nav>