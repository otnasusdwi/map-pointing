@extends('../layouts.app')
@section('content')
<div class="container" style="margin-top: 30px;">
   <div class="row">
      <div class="col-md-12 text-left" style="margin-bottom: 20px;">
         <div class="card" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
               <h5><strong>Selamat datang {{ auth()->user()->name }}</strong> di aplikasi mapsku.</h5>
               <h6 class="card-title">Tetap fokus & hati-hati dalam berkendara. Silahkan klik tombol List Rute dibawah
                  untuk memulai pengisian data koordinat rute.</h6>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <a href="{{ route('driver.rute') }}" class="btn btn-lg btn-primary" style="width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
               class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16" style="margin-top: -5px;">
               <path
                  d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z" />
            </svg>
            List Rute {{ auth()->user()->name }}</a>
      </div>
   </div>
</div>
@endsection