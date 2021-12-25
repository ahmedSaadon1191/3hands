<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('backEnd/assets/img/sidebar-2.jpg') }}">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="{{ route('admin.DashBoard') }}" class="simple-text logo-normal">
          Welcome mr   {{ auth()->user()->name }}
        </a>
      </div>
     @include('backEnd.layouts.sidebar')
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          
        <div class="container-fluid">
          <div class="navbar-wrapper">
              
            <a class="navbar-brand" href="javascript:void(0)">@yield('page_name')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      <p class="d-lg-none d-md-block">
                        Some Actions
                      </p>
                    <div class="ripple-container"></div></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('admin.profile.edit',auth()->user()->id) }}">profile</a>
                      <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                      
                    </div>
                  </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
     