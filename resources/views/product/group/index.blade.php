@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Group Baru</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session('success')}}
                    </div>
                    @endif
                </div>
                <div class="car-body p-3">
                    <form action="">
                        <div class="form-group">
                            <label for="">Nama Group</label>
                            <input type="text" class="form-control">
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session('success')}}
                    </div>
                    @endif
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-striped table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                            <th>#</th>
                            <th width="80%">Nama Group</th>
                            <th width="15%">###</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $index=>$group)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td><a class="card-link" href="{{route('product.show', $group->id)}}">{{ $group->nama }}</a></td>
                                <td>
                                <form class="form-inline" method="post" action="{{route('group.destroy',$group->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{route('group.edit', $group->id)}}" class="badge badge-info">edit</a>&nbsp;
                                    <a href="#" class="badge badge-danger btn-delete" title="{{  $group->nama  }}" >hapus</a>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
  <script>
    // Page level custom scripts
    $(document).ready(function () {

      $('#dataTableHover').DataTable(); // ID From dataTable with Hover

      $('#jenis').on('change', function(){
          var id = $('#jenis').val();
          window.location.href = '{{url("product")}}/'+id;
      });

      $('body').on('click', '.btn-delete', function(event) {
        event.preventDefault();
        var title = $(this).attr('title');
        var choice = confirm('Yakin menghapus produk '+title+'?');
        if (choice) {
          $(this).closest('form').submit();
        }
      });
    });
  </script>
@endpush