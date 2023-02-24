@extends('main-login')

@section('content')
    

    {{-- <h1>Login Untuk masuk</h1>
      <form action="{{ route("postlogin") }}" method="POST">
        @csrf

        <input type="text" placeholder="Email" name="email"><br>
        <input type="password" id="password" name="password"placeholder="password">
        <button>Log in</button>

          <div class="botton">
         <a href="/registrasi">Belum punya akun ?</a>
          </div>
          @if (Session::has('success'))
          <p><div class="flashdata">{{ Session::get('success') }}</div></p>
              
          @endif --}}
          @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif 
          
         
      
          <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
              <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                  <div class="card-body"> 
                    <h4 class="mb-2">LogIn</h4>
                   
      
                    <form id="formAuthentication" class="mb-3" action="/postlogin" method="POST">
                      @csrf
                      <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input
                          type="text"
                          class="form-control"
                          id="email"
                          name="username"
                          placeholder="Enter your username"
                          autofocus
                        />
                      </div>
                      <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                          />
                          
                        </div>
                      
                      </div>
                      @if (Session::has('error'))
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif 
                      
                      @if ($errors)
                      <div class="text-danger mt-2">{{ $errors->first() }}</div>
                  @endif
                    
                      <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">LogIn</button>
                      </div>
                    </form>
                 
      
                    <p class="text-center">
                      <span>Belum punya Akun?</span>
                      <a href="/registrasi">
                        <span>Daftar disini</span>
                      </a>
                    </p>
                  </div>
                </div>
                <!-- /Register -->
              </div>
            </div>
          </div>
      

    <!-- / Content -->
@endsection
    
  
