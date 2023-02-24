@extends('main-home')

@section('content')
 <!-- Basic Bootstrap Table -->
 @if (Session::has('success'))
 <div class="alert alert-success alert-dismissible" role="alert">
   {{ Session::get('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif
 <div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Level</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $item)
        <tr>
          <td>{{ $item->level }}</td>
          <td >
            <div class="demo-inline-spacing">
              <a class="btn btn-primary" href="/level-edit{{ $item->id }}"
              >
                Edit
            </a>
            <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-toggle="modal"
                    data-bs-target="#smallModal"
                    data-id="{{ $item->id}}"
                    id="btn-delete-data"
                  >
                    Hapus
                  </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
<div class="col-12">
      <div class="demo-inline-spacing">
        <a href="/level-input" class="btn btn-primary">Tambah</a>
  </div>
</div>

      <!-- Small Modal -->
      <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
             
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                <label for="nameSmall" class="form-label">Apakah Anda yakin ?</label>
                  <form action="/level-delete" method="POST">
                    @csrf
                  <input type="hidden" id="id_delete" name="id_delete" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit"  class="btn btn-danger">Hapus</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">

        $(document).on('click', '#btn-delete-data', function() {
            let id = $(this).data('id');
      
            $('#id_delete').val(id);
        });
      </script>


@endsection