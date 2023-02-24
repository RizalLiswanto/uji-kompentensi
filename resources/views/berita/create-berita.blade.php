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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
          <!-- Layout container -->
          <div class="layout-page">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                      <!-- Basic Layout -->
                      <div class="col-xxl">
                        <div class="card mb-4">
                          <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Berita </h5>
                          </div>
                          <div class="card-body">
                            <form action="/berita-create" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Judul</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" id="basic-default-name" placeholder="Masukkan Judul">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Tipe Berita</label>
                                <div class="col-sm-10">
                                 
                                  <select id="defaultSelect" class="form-select" name="tipeberita">
                                    <option hidden value="disabled value">Pilih Tipe</option>
                                    @foreach ($kate as $item)
                                    <option value="{{$item->id}}">{{$item->tipe  }}</option>
                                    @endforeach
                                  </select>
                                 
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Isi Berita</label>
                                <div class="col-sm-10">
                                  <div class="input-group input-group-merge">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="5"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-phone">Upload Gambar Berita</label>
                                <div class="col-sm-10">
                                  <input class="form-control" type="file" id="formFile" name="gambar">
                                </div>
                              </div>                
                              <div class="row justify-content-end">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Kirim</button>
                                  <a href="/indexberita" type="button" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                    </div>
                   
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      {{ Session::get('error') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif 
  
              <div class="container-xxl flex-grow-1 container-p-y"></div>
          
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#defaultSelect').select2();
      });
  </script>
  </body>
</html>
