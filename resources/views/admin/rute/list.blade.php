@extends('../layouts.admin')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('admin.rute') }}">Rute Driver</a></li>
         <li class="breadcrumb-item"><a href="{{ route('admin.rute.list', $id_user) }}">{{ user($id_user)->name }}</a></li>
         <li class="breadcrumb-item active" aria-current="page">List Rute</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         @if ($message = Session::get('warning'))
         <br>
         <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
         </div>
         @endif
         @if ($message = Session::get('success'))
         <br>
         <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
         </div>
         @endif
         <a href="{{ route('admin.rute.create', $id_user) }}" class="btn btn-lg btn-primary"
            style="width: 100%; margin-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
               class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style="margin-top: -6px;">
               <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
            </svg>
            Tambah Rute {{ user($id_user)->name }}
         </a>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th scope="col" style="width: 10%;">No</th>
                        <th scope="col" style="width: 60%;">Rute</th>
                        <th scope="col" style="width: 30%;">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($rutes as $key => $rute)
                     <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $rute->nama_start }} - {{ $rute->nama_end }}</td>
                        <td>
                           <a href="{{ route('admin.rute.edit', $rute->id) }}" class="btn btn-sm btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                 <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                 <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                              </svg>
                           </a>
                           <a href="#" class="btn btn-sm btn-danger"
                              onclick="del('{{ url('admin/rute/destroy', $rute->id) }}')">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash-fill" viewBox="0 0 16 16">
                                 <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                              </svg>
                           </a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection