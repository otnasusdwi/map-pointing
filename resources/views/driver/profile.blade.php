@extends('../layouts.app')
@section('content')
<div class="container" style="margin-top: 30px;">
   <div class="row">
      <div class="col-md-12 text-left" style="margin-bottom: 20px;">
         <div class="card" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
               <h5><strong>Profile</strong></h5>
               <hr>
               <h5><strong>Nama : {{ auth()->user()->name }}</strong></h5>
               <h6 class="card-title">Driver Cargo</h6>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <a href="{{ route('logout') }}" class="btn btn-lg btn-primary" style="width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16"  style="margin-top: -6px;">
               <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
            Keluar
         </a>
      </div>
   </div>
</div>
@endsection