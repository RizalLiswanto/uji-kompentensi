@extends('main-login')

@section('content')
    
      {{-- <form action="/simpanregister" method="POST">
        @csrf
        <input type="text" placeholder="Nama" name="nama"><br>
        <input type="text" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Password" name="password"><br>
        <input type="text" placeholder="Alamat" name="alamat"><br>
        <input type="text" placeholder="Jenis kelamin" name="jenis_kelamin"><br>
        
        
       
        <button>Daftar akun</button> --}}

        <div class="container-xxl">
          <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
              <!-- Register -->
              <div class="card">
                <div class="card-body"> 
                  <h4 class="mb-2">Registrasi</h4>
                 
    
                  <form id="formAuthentication" class="mb-3" action="/simpanregister" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Enter your username"
                        autofocus
                      />
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your Email"
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
                    <div class="mb-3">
                      <label for="1" class="form-label">Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="1"
                        name="nama"
                        placeholder="Enter your name"
                        autofocus
                      />
                    </div>
                    <div class="mb-3">
                      <label for="2" class="form-label">Tanggal Lahir</label>
                      <input
                        type="date"
                        class="form-control"
                        id="2"
                        name="tanggal_lahir"
                        placeholder="Enter your tanggal lahir"
                        autofocus
                      />
                    </div>
                    <div class="mb-3">
                      <label for="3" class="form-label">Tempat Lahir</label>
                      <input
                        type="text"
                        class="form-control"
                        id="3"
                        name="tempatlahir"
                        placeholder="Enter your tempat lahir"
                        autofocus
                      />
                    </div>
                    <div class="mb-3">
                      <label for="telp" class="form-label">No telepon</label>
                      <input
                        type="text"
                        class="form-control"
                        id="telp"
                        name="no_telepon"
                        placeholder="Enter your Email"
                        autofocus
                      />
                    </div>
                    <div class="mb-4">
                      <label for="3" class="form-label">Alamat</label>
                      <input
                        type="text"
                        class="form-control"
                        id="3"
                        name="alamat"
                        placeholder="Enter your alamat"
                        autofocus
                      />
                    </div>
                    <div class="mb-4">
                    <select name="level_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected="">Level</option>
                      <option value="1">Admin</option>
                      <option value="2">User</option>
                    </select>
                    </div>
                    <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected="">Jenis Kelamin</option>
                      <option value="1">Laki-Laki</option>
                      <option value="2">Perempuan</option>
                    </select>
                   
                    
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
                      <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                    </div>
                  </form>
               
    
                  <p class="text-center">
                    <span>Sudah punya Akun?</span>
                    <a href="/">
                      <span>LogIn disini</span>
                    </a>
                  </p>
                </div>
              </div>
              <!-- /Register -->
            </div>
          </div>
        </div>
          
@endsection
    
  
