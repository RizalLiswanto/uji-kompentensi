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
     
    <div class="container">
        <div class="row">
          <div class="col-md-8 mt-3">
            <!-- Tampilan gambar dan judul berita -->
            <div class="card mb-3">
              <img src="{{ asset('storage/news/'.$up->images[0]->image) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="card-title">{{ $up->judul }}</h3>
              </div>
            </div>
            <!-- Tampilan isi berita -->
            <div class="card mb-3">
              <div class="card-body">
                <p class="card-text">{{ $up->isi_berita }}</p>
              </div>
            </div>
            <!-- Tampilan komentar -->
            <div class="card mb-3">
              <div class="card-body"> 
                 <h3 class="card-title">Komentar</h3>
                <!-- Form komentar -->
                <form action="" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="comment">Komentar</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </form> 
                <!-- Tampilan daftar komentar -->
              
                 <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                  </div>
                </div>
             
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- Tampilan berita terkait -->
            <h3>Berita Terkait</h3>
            <div class="card mb-3">
              @foreach ($relatedNews as $item)
                  
              
              <div class="row g-0">
                <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ asset('storage/news/'.$item->images[0]->image) }}" alt="Card image" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{{$item->isi_berita  }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
           
      
    </div>
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
</html>