@extends('main-home')

@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Edit data</h5>
        <form action="/level-update{{ $edit->id}}" method="POST">
            @csrf
        <div class="card-body">
            <label for="defaultFormControlInput1" class="form-label">Level</label>
            <input
              type="text"
              name="level"
              class="form-control"
              id="defaultFormControlInput1"
              aria-describedby="defaultFormControlHelp"
              value="{{ $edit->level}}"
            />
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