<?php 
function lokasi($id)
{
   $lokasi = App\Models\Lokasi::FindorFail($id);
   return $lokasi;
}

function user($id)
{
   $user = App\User::FindorFail($id);
   return $user;
}