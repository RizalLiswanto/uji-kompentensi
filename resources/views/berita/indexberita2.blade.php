{{-- <!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ 'style/assets/ '}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Portal Berita</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ 'style/assets/img/favicon/favicon.ico '}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/fonts/boxicons.css' }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/css/core.css' }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ 'style/assets/vendor/css/theme-default.css' }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ 'style//assets/css/demo.css' }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' }}" />

    <link rel="stylesheet" href="{{ 'style/assets/vendor/libs/apex-charts/apex-charts.css' }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ 'style/assets/vendor/js/helpers.js' }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ 'style/assets/js/config.js' }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>


  </head>

  <body>

    <style>
      .carousel-inner img {
    height: 400px;
    width: 1300px;
}
      </style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">

          <!-- Layout container -->
          <div class="layout-page">
            
            <!-- Navbar -->
            
  
            <nav
              class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar"
            >
              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <!-- /Search -->
  
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  @if (Auth::user())
                  <a  class="btn btn-sm btn-primary" href="/input-berita"> Tambah Berita
                  </a>
                  @endif
                 
                  <!-- User -->
                  

                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    
                      <div class="avatar avatar-online">
                    
                        <img src="{{ 'style/assets/img/avatars/1.png' }}" alt class="w-px-40 h-auto rounded-circle" />
                     
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      @if (!Auth::user())
                      <li>
                        <a class="dropdown-item" href="/login">
                          <i class="bx bx-log-in me-2"></i>
                          <span class="align-middle">LogIn</span>
                        </a>
                      </li>
                      @endif
                      @if (Auth::user())
                      <li>
                        <a class="dropdown-item" href="/logout">
                          <i class="bx bx-power-off me-2"></i>
                          <span class="align-middle">Log Out</span>
                        </a>
                      </li>
                      @endif
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>
            </nav>
  
            <!-- / Navbar -->
            
  
            <!-- Content wrapper -->
            <div class="content-wrapper">
              @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
             
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="carousel">
                      <div class="carousel-inner">
                          @foreach($beritas as $key => $item)
                          @if($item->status == 'posting'&& $item->status_headline == '2')
                          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a href="/coba{{ $item->id }}">
                     
                              <img src="{{ asset('storage/news/'.$item->images[0]->image) }}" class="d-block w-100" alt="{{ $item->judul }}">
                            </a>
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>{{ $item->judul }}</h5>
                                  <p></p>
                              </div>
                          </div>
                          @endif
                          @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                      </a>
                  </div>
                    
                    
                          <div class="container">
                            <div class="row">
                              @foreach($beritas as $item)
                       @if($item->status == 'posting'&& $item->status_headline == '1')
                              <div class="col-md-4 mb-3">
                                <div class="card" >
                                  <img class="card-img-top" src="{{ asset('storage/news/'.$item->images[0]->image) }}"  width="200px" height="200px"alt="Card image cap">
                                  <div class="card-body">
                                    <h5 class="card-title">{{$item->judul }}</h5>
                                    <p class="card-text"> {{$item->isi_berita }}</p>
                                    <p class="card-text"> {{ $timeAgoArray[$item->id] }}</p>
                                    <a href="/coba{{ $item->id }}" class="btn btn-primary">Go somewhere</a>
                                  </div>
                                </div>
                                   </div>
                              @endif
                              @endforeach 
                            </div>
                          </div>
                      </div>
                    <!--/ Card layout -->
                  </div>
  
              <div class="container-xxl flex-grow-1 container-p-y"></div>
          
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    </div>
    <script>
      $(document).ready(function() {
          $('.carousel').carousel();
      });
      </script>
     
      <script src="{{ 'style/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ 'style/assets/vendor/libs/popper/popper.js' }}"></script>
    <script src="{{ 'style/assets/vendor/js/bootstrap.js' }}"></script>
    <script src="{{ 'style//assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js' }}"></script>

    <script src="{{ 'style/assets/vendor/js/menu.js' }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ 'style/assets/vendor/libs/apex-charts/apexcharts.js' }}"></script>

    <!-- Main JS -->
    <script src="{{ 'style/assets/js/main.js' }}"></script>

    <!-- Page JS -->
    <script src="{{ 'style/assets/js/dashboards-analytics.js' }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html> --}}
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Without menu - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/fonts/boxicons.css' }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/css/core.css' }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ 'style/assets/vendor/css/theme-default.css' }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ 'style/assets/css/demo.css' }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ 'style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ 'style/assets/vendor/js/helpers.js' }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ 'style/assets/js/config.js' }}"></script>
  </head>

  <body>
    <style>
      .carousel-inner img {
    height: 400px;
    width: 1300px;
}
      </style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">

          <!-- Layout container -->
          <div class="layout-page">
            
            <!-- Navbar -->
            
  
            <nav
              class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar"
            >
              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <!-- /Search -->
  
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                  @if (Auth::user())
                  <a  class="btn btn-sm btn-primary" href="/input-berita"> Tambah Berita
                  </a>
                  @endif

           <!-- User -->
                  

           <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            
              <div class="avatar avatar-online">
            
                <img src="{{ 'style/assets/img/avatars/1.png' }}" alt class="w-px-40 h-auto rounded-circle" />
             
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              @if (!Auth::user())
              <li>
                <a class="dropdown-item" href="/login">
                  <i class="bx bx-log-in me-2"></i>
                  <span class="align-middle">LogIn</span>
                </a>
              </li>
              @endif
              @if (Auth::user())
              <li>
                <a class="dropdown-item" href="/logout">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>
    </nav>

    <!-- / Navbar -->
    

    <!-- Content wrapper -->
    <div class="content-wrapper">
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
     
        <div class="container-xxl flex-grow-1 container-p-y">
            <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach($beritas as $key => $item)
                  @if($item->status == 'posting'&& $item->status_headline == '2')
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="/coba{{ $item->id }}">
             
                      <img src="{{ asset('storage/news/'.$item->images[0]->image) }}" class="d-block w-100" alt="{{ $item->judul }}">
                    </a>
                      <div class="carousel-caption d-none d-md-block">
                          <h5>{{ $item->judul }}</h5>
                          <p></p>
                      </div>
                  </div>
                  @endif
                  @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </a>
          </div>
            
            
                  <div class="container">
                    <div class="row">
                      @foreach($beritas as $item)
               @if($item->status == 'posting'&& $item->status_headline == '1')
                      <div class="col-md-4 mb-3">
                        <div class="card" >
                          <img class="card-img-top" src="{{ asset('storage/news/'.$item->images[0]->image) }}"  width="200px" height="200px"alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title">{{$item->judul }}</h5>
                            <p class="card-text"> {{$item->isi_berita }}</p>
                            <p class="card-text"> {{ $timeAgoArray[$item->id] }}</p>
                            <a href="/coba{{ $item->id }}" class="btn btn-primary">Go somewhere</a>
                          </div>
                        </div>
                           </div>
                      @endif
                      @endforeach 
                    </div>
                  </div>
              </div>
            <!--/ Card layout -->
          </div>

      <div class="container-xxl flex-grow-1 container-p-y"></div>
  
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
</div>

    

    <!-- Core JS -->
    <script>
      $(document).ready(function() {
          $('.carousel').carousel();
      });
      </script>
    
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ 'style/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ 'style/assets/vendor/libs/popper/popper.js' }}"></script>
    <script src="{{ 'style/assets/vendor/js/bootstrap.js' }}"></script>
    <script src="{{ 'style/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js' }}"></script>

    <script src="{{ 'style/assets/vendor/js/menu.js' }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ 'style/assets/js/main.js' }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
