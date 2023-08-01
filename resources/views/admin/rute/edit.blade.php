@extends('../layouts.admin')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('admin.rute') }}">Rute Driver</a></li>
         <li class="breadcrumb-item"><a href="{{ route('admin.rute.list', $rute->id_user) }}">{{ user($rute->id_user)->name }}</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">Edit Rute</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         <form action="{{ route('admin.rute.update', $id_rute) }}" method="post">
            @csrf
            <input type="hidden" name="id_user" value="{{ $rute->id_user }}">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="start">Keberangkatan</label>
                     <select class="form-control" id="start" name="start">
                        <option hidden>- Pilih Keberangkatan -</option>
                        @foreach ($lokasis as $lokasi)
                        <option value="{{ $lokasi->id }}" @if ($lokasi->id == $rute->start) selected @endif>{{ $lokasi->nama }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="end">Tujuan</label>
                     <select class="form-control" id="end" name="end">
                        <option hidden>- Pilih Tujuan -</option>
                        @foreach ($lokasis as $lokasi)
                        <option value="{{ $lokasi->id }}" @if ($lokasi->id == $rute->end) selected @endif>{{ $lokasi->nama }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary"
                     style="width: 100%; margin-top: 20px; margin-bottom: 20px;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style="margin-top: -6px;">
                        <path
                           d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                     </svg>
                     Update Rute
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection