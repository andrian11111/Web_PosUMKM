<?php

use App\Models\UMKM;
use Illuminate\Support\Facades\Route;

Route::get('/umkm/search', function (Request $request) {
    $query = $request->query('query');
    $umkms = UMKM::where('nama_umkm', 'like', '%' . $query . '%')->get();
    return response()->json($umkms);
});
