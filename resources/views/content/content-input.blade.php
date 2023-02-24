@extends('main-home')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Tambah data</h5>
        <form action="/content-create" method="POST">
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
              name="nomor"
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
        </div>
      </div>
    </div>
<div class="col-12">
      <div class="demo-inline-spacing">
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/content" type="button" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
  </div>
</form>
</div>


@endsection