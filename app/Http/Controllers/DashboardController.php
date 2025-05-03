<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id; // Mendapatkan ID pengguna yang sedang login
        $umkms = UMKM::where('user_id', $userId)->get(); // Menampilkan hanya UMKM milik pengguna yang login
        return view('umkm.index', compact('umkms')); // Mengirim data UMKM ke view
    }
}