@extends('main-home')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Edit data</h5>
        <form action="/content-update{{ $edit->id}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your username"
                  value="{{ $edit->username }}"
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
                  value="{{ $edit->email }}"
                  autofocus
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
                  value="{{ $edit->nama}}"
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
                  value="{{ $edit->tanggal_lahir }}"
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
                  value="{{ $edit->tempatlahir }}"
                  autofocus
                />
              </div>
              <div class="mb-3">
                <label for="telp" class="form-label">No telepon</label>
                <input
                  type="text"
                  class="form-control"
                  id="telp"
                  name="nomor"
                  placeholder="Enter your Email"
                  value="{{ $edit->nomor}}"
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
                  value="{{ $edit->alamat }}"
                  autofocus
                />
              </div>
              <div class="mb-4">
              <select name="level_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="{{ $edit->level_id}}" >{{ $edit->level->level}}</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
              </div>
              <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="{{ $edit->jenis_kelamin}}">@if($edit->jenis_kelamin == 1)
                  Laki-Laki
                  @elseif($edit->jenis_kelamin == 2)
                  Perempuan
                 @endif</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
              </div>
            </div>
        
        </div>
      </div>
    </div>
<div class="col-12">
      <div class="demo-inline-spacing">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/content" type="button" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
  </div>
</form>
</div>


@endsection