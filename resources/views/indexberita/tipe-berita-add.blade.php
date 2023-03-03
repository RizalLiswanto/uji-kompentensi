@extends('main-home')

@section('content')
<div class="row">
  
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Tambah data</h5>
        <form action="/tipe-berita-create" method="POST">
            @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="1" class="form-label">Tipe Berita</label>
            <input
              type="text"
              class="form-control"
              id="1"
              name="tipe"
              placeholder="Enter your username"
              autofocus
            />
       
  
    </div>
    @if ($errors->any())
 <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-12">
      <div class="demo-inline-spacing">
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/tipe-berita" type="button" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
  </div>
</form>
</div>


@endsection