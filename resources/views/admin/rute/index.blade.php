@extends('../layouts.admin')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">Rute Driver</li>
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
         <h6><u>Pilih Driver</u></h6>
         <br>
         <div class="row">
            <div class="col-md-12">
               @foreach ($drivers as $key => $driver)
               <a href="{{ route('admin.rute.list', $driver->id) }}" class="btn btn-lg btn-primary"
                  style="width: 100%; margin-bottom: 20px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-person-plus-fill" viewBox="0 0 16 16" style="margin-top: -5px;">
                     <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                     <path fill-rule="evenodd"
                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                  {{ $driver->name }}
               </a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection