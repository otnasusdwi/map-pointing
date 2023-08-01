@extends('../layouts.admin')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('admin.driver') }}">Driver</a></li>
         <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         <form action="{{ route('admin.driver.update') }}" method="post">
            <input type="hidden" name="id" value="{{ $driver->id }}">
            @csrf
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="name">Nama Driver</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Nama Driver" value="{{ $driver->name }}" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email" id="email" placeholder="driver@gmail.com" value="{{ $driver->email }}" required>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="password">Password Baru</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder=""  value="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary" style="width: 100%; margin-top: 20px; margin-bottom: 20px;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style="margin-top: -6px;">
                        <path
                           d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                     </svg>
                     Update Driver
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection