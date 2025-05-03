<?php
namespace App\Http\Controllers;

use App\Models\UMKM;  // Pastikan model UMKM sudah di-import
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
{
    // Mengambil semua data UMKM dari database
    $umkms = UMKM::all();
    
    // Pastikan data UMKM sudah ada
    dd($umkms);  // Debugging, tampilkan data di browser

    // Mengirim data UMKM ke view
    return view('welcome', compact('umkms'));   
}

}
