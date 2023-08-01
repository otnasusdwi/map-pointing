@extends('../layouts.app')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('driver.rute') }}">Rute Driver</a></li>
         <li class="breadcrumb-item"><a href="{{ route('driver.rute') }}">{{ lokasi($rute->start)->nama }} -
            {{ lokasi($rute->end)->nama }}</a></li>
         <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         <form action="{{ route('driver.rute.store') }}" method="post">
            @csrf
            <input type="hidden" name="id_rute" value="{{ $id_rute }}">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b>Langitude</b></label>
                     <input class="form-control" type="text" name="lang" id="lang" value="">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b>Longitude</b></label>
                     <input class="form-control" type="text" name="long" id="long" value="">
                  </div>
               </div>
            </div>

            <div class="row" style="margin-top: 20px;">
               <div class="col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">SUBMIT</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   if (geo_position_js.init()) {
      geo_position_js.getCurrentPosition(success_callback, error_callback, {
         enableHighAccuracy: true
      });
   } else {
      alert("Functionality not available");
   }

   function success_callback(p) {
      alert('lat=' + p.coords.latitude.toFixed(7) + ';lon=' + p.coords.longitude.toFixed(7));
      $('#lang').val(p.coords.latitude.toFixed(7));
      $('#long').val(p.coords.longitude.toFixed(7));
   }

   function error_callback(p) {
      alert('error=' + p.message);
   }
</script>
@endsection