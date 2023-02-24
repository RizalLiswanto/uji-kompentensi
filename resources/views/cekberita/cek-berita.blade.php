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
          <th>Tipe</th>
          <th>Judul</th>
          <th>Pembuat</th>
          <th>Dibuatpada</th>
          <th>Status</th>
          <th>Headline</th>
          <th>Di Hapus</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($data as $item)
        <tr>
          <td>{{ $item->tipe_berita->tipe}}</td>
          <td>{{ $item->judul}}</td>
          <td>{{ $item->user->nama}}</td>
          <td>{{ $timeAgoArray[$item->id] }}</td>
          <td>
            
            {{-- <form id="form-berita" action="{{ route('items.update', $item->id) }}" method="POST">
              @csrf
              @method('PATCH')
              <select class="form-control" name="status">
                  @if ($item->status === 'pending')
                      <option value="pending" selected>Pending</option>
                      <option value="posting">Posting</option>
                      <option value="deleted">Delete</option>
                  @elseif ($item->status === 'posting')
                      <option value="posting" selected>Posting</option>
                      <option value="deleted">Delete</option>
                  @elseif ($item->status === 'deleted')
                      <option value="deleted" selected>Delete</option>
                  @endif
              </select>
          </form>  --}}
          <form id="form-berita-{{ $item->id }}" data-id="{{ $item->id }}" action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PATCH')
    
            <select class="form-control" name="status">
                @if ($item->status === 'pending')
                    <option value="pending" selected>Pending</option>
                    <option value="posting">Posting</option>
                @elseif ($item->status === 'posting')
                    <option value="posting" selected>Posting</option>
                    <option value="deleted">Delete</option>
                @elseif ($item->status === 'deleted')
                    <option value="deleted" selected>Delete</option>
                @endif
            </select>
        </form>
          </td>
        
          <td><form id="form-berita-headline" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <input type="checkbox" id="{{ $item->id }}" name="status_headline" value="2" class="form-check-input" data-id="{{ $item->id }}" @if($item->status_headline == 2) checked @endif>
                <label for="{{ $item->id }}">Aktif</label>
            </div>
        </form>
         </td>
         <td>
          @if ($item->status === 'deleted')
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop{{ $item->id }}">
          komen
          </button> @endif</td>
        <td>
          <button type="button" class="btn btn-primary" id="btn-modal-{{ $item->id }}">Detail Berita</button>
       </td>
      </td>
     
    </td>
        </tr>
        
        
        @endforeach
      </div>
      <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalScrollableTitle"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img id="news-image" class="img-fluid rounded mb-2" alt="News Image" style="width: 76%; height: 300px; margin:auto;" alt="News Image">

              <p class="text-wrap" id="isi-berita"></p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        <!-- Modal -->
      </tbody>
    </table>
    
  </div>
</div>
<!--/ Basic Bootstrap Table -->
<div class="col-12">
      <div class="demo-inline-spacing">
        <a href="content-input" class="btn btn-primary">Tambah</a>
  </div>
</div>

{{-- /// --}}
@foreach ($data as $item)
    

<div class="modal modal-top fade" id="modalTop{{ $item->id }}" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" action="{{ url('/komen',$item->id ) }}" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTopTitle">Alasan Berita di hapus</h5>
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
            <label for="nameSlideTop" class="form-label">ISi komentar</label>
            <textarea
              type="text"
              id="nameSlideTop"
              class="form-control"
              placeholder="Enter Name">
            </textarea>
          </div>
        </div>
        <div class="row g-2">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Keluar
        </button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
@endforeach
{{-- 

  
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
                  <form action="content-delete" method="post">
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
      </div> --}}
{{--       
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">

        $(document).on('click', '#btn-delete-data', function() {
            let id = $(this).data('id');
      
            $('#id_delete').val(id);
        });
      </script> --}}

<script>
  @foreach ($data as $item)
    document.getElementById('btn-modal-{{ $item->id }}').addEventListener('click', function() {
      document.getElementById('modalScrollableTitle').innerHTML = '{{ $item->judul }}';
      document.getElementById('isi-berita').innerHTML = '{{ $item->isi_berita }}';
      document.getElementById('news-image').setAttribute('src', '{{ asset("storage/news/".$item->images[0]->image) }}');

      $('#modalScrollable').modal('show');
    });
  @endforeach
</script>


<script>
  const checkboxes = document.querySelectorAll('.form-check-input');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const beritaId = this.dataset.id;
            const isChecked = this.checked ? 2 : 1;
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PATCH');
            formData.append('status_headline', isChecked);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', `/update-headline-status/${beritaId}`);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(JSON.parse(xhr.responseText).message);
                    } else {
                        console.log('Terjadi kesalahan dalam mengirim form.');
                    }
                }
            };
            xhr.send(formData);
        });
    });
</script>
  
<script>
//  $(document).ready(function() {
//     // Tambahkan event listener untuk elemen select
//     $('select[name="status"]').on('change', function() {
//         // Ambil nilai id dan status dari form
//         var id = $('#form-berita').data('id');
//         var status = $(this).val();
        
//         // Kirim permintaan AJAX ke server
//         $.ajax({
//             url: '/items/' + id,
//             type: 'PATCH',
//             data: {
//                 status: status,
//                 _token: $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function(response) {
//                 // Tampilkan pesan sukses jika berhasil
//                 alert(response.message);
//             },
//             error: function(xhr) {
//                 // Tampilkan pesan error jika terjadi kesalahan
//                 alert(xhr.responseJSON.message);
//             }
//         });
//     });
// });
$(document).ready(function() {
    // Tambahkan event listener untuk elemen select pada setiap form
    $('select[name="status"]').on('change', function() {
        // Ambil nilai id dan status dari form yang bersangkutan
        var id = $(this).closest('form').data('id');
        var status = $(this).val();
        
        // Kirim permintaan AJAX ke server untuk form yang bersangkutan
        $.ajax({
            url: '/items/' + id,
            type: 'PATCH',
            data: {
                status: status,
                _token: $('meta[name="csrf-token"]').attr('content')
            },success: function(response) {
    alert(response.message);
    location.reload(); // Refresh halaman
},
        });
    });
});


</script>

  
  
  
  
  

@endsection
