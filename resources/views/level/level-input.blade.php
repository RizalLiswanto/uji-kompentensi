@extends('main-home')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Tambah data</h5>
        <form action="/level-create" method="POST">
            @csrf
        <div class="card-body">
          <div class="mb-3">
            <label for="1" class="form-label">Level</label>
            <input
              type="text"
              class="form-control"
              id="1"
              name="level"
              placeholder="Tambahkan Level"
              autofocus
            />
          </div>
       
      </div>
    </div>
<div class="col-12">
      <div class="demo-inline-spacing">
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/level" type="button" class="btn btn-outline-secondary w-24 mr-1">Kembali</a>
  </div>
</form>
</div>


@endsection