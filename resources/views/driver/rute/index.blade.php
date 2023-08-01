@extends('../layouts.app')
@section('content')
<div class="container" style="margin-top: 30px;">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">Rute Driver</li>
      </ol>
   </nav>
   <div class="card">
      <div class="card-body">
         <div class="row">

            <div class="col-md-12 text-left" style="margin-bottom: 20px;">
               <h6><u>Pilih Rute</u></h6>
            </div>
         </div>
         @forelse ($rute as $item)
         <div class="row">
            <div class="col-md-6 text-center">
               <a href="{{ route('driver.rute.list', $item->id) }}" class="btn btn-lg btn-primary" style="width: 100%; margin-bottom: 30px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="margin-top: -4px;">
                     <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                  </svg>
                  &nbsp;
                  {{ $item->nama_start }} ke {{ $item->nama_end }}</a>
            </div>
         </div>
         @empty
         <h5><b>Belum ada Rute</b></h5>
         <p>NB : Hubungi Admin</p>
         @endforelse
      </div>
   </div>
</div>
@endsection