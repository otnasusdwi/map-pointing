@extends('../layouts.app')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('driver.rute') }}">Rute Driver</a></li>
         <li class="breadcrumb-item active" aria-current="page">{{ lokasi($rute->start)->nama }} -
            {{ lokasi($rute->end)->nama }}</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         <di class="row">
            @if ($message = Session::get('success'))
            <div class="col-md-12">
               <div class="alert alert-success alert-block" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
                  {{-- <strong>Berhasil Ditambahkan</strong> --}}
               </div>
            </div>
            @endif
            <div class="col-md-12" style="margin-bottom: 10px;">
               <div class="text-left">
                  <h6>
                     <u>Rute : {{ lokasi($rute->start)->nama }} ke {{ lokasi($rute->end)->nama }}</u>
                  </h6>
               </div>
            </div>
            <div class="col-md-12 text-left">
               <a href="{{ route('driver.rute.create', $id_rute) }}" class="btn btn-lg btn-primary"
                  style="width: 100%;">

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16" style="margin-top: -5px;">
                     <path
                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                  </svg>
                  Tambah Titik Koordinat</a>
            </div>
         </di>
      </div>
   </div>
   <div class="row" style="margin-top: 10px;">
      @forelse ($langlong as $key => $item)
      <div class="col-md-4">
         <div class="card" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
               <h5><b>Titik ke-{{ $item->titik }}</b></h5>
               <h6 class="card-title">Lang : {{ round($item->lang, 7) }}</h6>
               <h6 class="card-title">Long : {{ round($item->long, 7) }}</h6>
            </div>
         </div>
      </div>
      @empty
      <div class="col-md-4">
         <div class="card" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
               <h6 class="text-center">Belum ada titik Koordinat</h6>
            </div>
         </div>
      </div>
      @endforelse
   </div>
</div>
@endsection