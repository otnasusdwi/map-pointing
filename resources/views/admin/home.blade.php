@extends('../layouts.admin')
@section('content')
<div class="container" style="margin-top: 30px;">
   <div class="row">
      <div class="col-md-12 text-left" style="margin-bottom: 20px;">
         <div class="card" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-body">
               <h5><strong>Selamat datang {{ auth()->user()->name }}</strong> di aplikasi mapsku.</h5>
               <h6 class="card-title">Tetap fokus & hati-hati dalam berkendara. Silahkan pilih menu dibawah untuk manajemen rute.</h6>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection