<?php
namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id; // Mendapatkan ID pengguna yang sedang login
        $umkms = UMKM::where('user_id', $userId)->get(); // Menampilkan hanya UMKM milik pengguna yang login
        return view('umkm.index', compact('umkms')); // Mengirim data UMKM ke view
        
    }
public function create()
{
    return view('umkm.create');
}
public function store(Request $request)
{
    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'nama_umkm' => 'required',
        'alamat' => 'required',
        'nomor_telepon' => 'nullable|numeric',
        'kategori' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'harga_min' => 'nullable|numeric|min:0',
        'harga_max' => 'nullable|numeric|min:0|gte:harga_min',
        'gambar_umkm' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Validasi untuk gambar UMKM
        'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Validasi untuk gambar menu
        'gambar_unggulan' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Validasi untuk gambar produk unggulan
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
    ]);

    // Buat instance baru dari UMKM
    $umkm = new UMKM();
    $umkm->nama_umkm = $validatedData['nama_umkm'];
    $umkm->alamat = $validatedData['alamat'];
    $umkm->nomor_telepon = $validatedData['nomor_telepon'];
    $umkm->kategori = $validatedData['kategori'];
    $umkm->deskripsi = $validatedData['deskripsi'];
    $umkm->harga_min = $validatedData['harga_min'] ?? null;
    $umkm->harga_max = $validatedData['harga_max'] ?? null;

    // Menambahkan user_id berdasarkan pengguna yang sedang login
    $umkm->user_id = auth()->user()->id;

    // Menyimpan gambar UMKM
   // Menyimpan gambar UMKM
if ($request->hasFile('gambar_umkm')) {
    $imageUmkm = $request->file('gambar_umkm');
    $imageNameUmkm = time() . '-' . uniqid() . '.' . $imageUmkm->getClientOriginalExtension();
    $imageUmkm->move(public_path('uploads/images/umkm'), $imageNameUmkm);  // Menyimpan gambar ke folder public/uploads/images/umkm
    $umkm->gambar_umkm = 'uploads/images/umkm/' . $imageNameUmkm;  // Simpan path gambar
}

// Menyimpan gambar Menu
if ($request->hasFile('gambar_menu')) {
    $imageMenu = $request->file('gambar_menu');
    $imageNameMenu = time() . '-' . uniqid() . '.' . $imageMenu->getClientOriginalExtension();
    $imageMenu->move(public_path('uploads/images/menu'), $imageNameMenu);  // Menyimpan gambar ke folder public/uploads/images/menu
    $umkm->gambar_menu = 'uploads/images/menu/' . $imageNameMenu;  // Simpan path gambar
}

// Menyimpan gambar Produk Unggulan
if ($request->hasFile('gambar_unggulan')) {
    $imageUnggulan = $request->file('gambar_unggulan');
    $imageNameUnggulan = time() . '-' . uniqid() . '.' . $imageUnggulan->getClientOriginalExtension();
    $imageUnggulan->move(public_path('uploads/images/unggulan'), $imageNameUnggulan);  // Menyimpan gambar ke folder public/uploads/images/unggulan
    $umkm->gambar_unggulan = 'uploads/images/unggulan/' . $imageNameUnggulan;  // Simpan path gambar
}


    // Menyimpan latitude dan longitude jika ada
    if ($request->has('latitude') && $request->has('longitude')) {
        $umkm->latitude = $validatedData['latitude'];
        $umkm->longitude = $validatedData['longitude'];
    }

    // Simpan data UMKM ke database
    $umkm->save();

    // Redirect dengan pesan sukses
    return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
}

    
    //menampilkan sesuai id

    public function show($id)
    {
        $umkm = Umkm::findOrFail($id); // Pastikan menemukan UMKM berdasarkan ID

        // Mengirim data umkm ke view
        return view('detail', compact('umkm'));
    }
    public function destroy($id)
    {
        $umkm = UMKM::findOrFail($id); // Mencari UMKM berdasarkan ID

        // Hapus gambar jika ada
        if ($umkm->gambar) {
            Storage::delete('public/umkm_images/' . $umkm->gambar);
        }

        $umkm->delete(); // Menghapus UMKM

        // Redirect ke halaman daftar UMKM setelah berhasil dihapus
        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus');
    }
    //membuat tambah gallery
    public function addgallery()
    {
        return view('umkm.addgallery');
    }

    //edit data umkm
    public function edit($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('umkm.edit', compact('umkm'));

    }
    //menghapus_umkm_admin
    public function destroy_admin($id)
{
    $umkm = UMKM::findOrFail($id); // Mencari UMKM berdasarkan ID

    // Hapus gambar jika ada
    if ($umkm->gambar_umkm) {
        Storage::delete('public/umkm_images/' . $umkm->gambar_umkm);
    }
    if ($umkm->gambar_menu) {
        Storage::delete('public/umkm_images/' . $umkm->gambar_menu);
    }
    if ($umkm->gambar_unggulan) {
        Storage::delete('public/umkm_images/' . $umkm->gambar_unggulan);
    }

    $umkm->delete(); // Menghapus UMKM

    // Ambil data UMKM yang tersisa
    $umkms = UMKM::all(); 

    // Redirect ke halaman daftar UMKM setelah berhasil dihapus
    return view('dashboard', compact('umkms'))->with('success', 'UMKM berhasil dihapus');
}

    //mencari umkm di welcome
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Pencarian berdasarkan nama atau kategori
        $umkms = UMKM::where('nama_umkm', 'like', '%' . $query . '%')
                      ->orWhere('kategori', 'like', '%' . $query . '%')
                      ->get();

        return view('welcome', compact('umkms'));
    }


    public function panduan()
    {
        // Mengembalikan tampilan 'panduan'
        return view('panduan');
    }

    public function privasi()
    {
        
        return view('privasi');
    }
//post edit umkm
public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_umkm' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'nomor_telepon' => 'required|string|max:15',
        'kategori' => 'required|string',
        'deskripsi' => 'nullable|string',
        'harga_min' => 'nullable|numeric',
        'harga_max' => 'nullable|numeric',
        'gambar_umkm' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gambar_unggulan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mencari UMKM berdasarkan ID
    $umkm = UMKM::findOrFail($id);

    // Update data UMKM
    $umkm->nama_umkm = $request->input('nama_umkm');
    $umkm->alamat = $request->input('alamat');
    $umkm->nomor_telepon = $request->input('nomor_telepon');
    $umkm->kategori = $request->input('kategori');
    $umkm->deskripsi = $request->input('deskripsi');
    $umkm->harga_min = $request->input('harga_min');
    $umkm->harga_max = $request->input('harga_max');

     // Menyimpan gambar UMKM
if ($request->hasFile('gambar_umkm')) {
    $imageUmkm = $request->file('gambar_umkm');
    $imageNameUmkm = time() . '-' . uniqid() . '.' . $imageUmkm->getClientOriginalExtension();
    $imageUmkm->move(public_path('uploads/images/umkm'), $imageNameUmkm);  // Menyimpan gambar ke folder public/uploads/images/umkm
    $umkm->gambar_umkm = 'uploads/images/umkm/' . $imageNameUmkm;  // Simpan path gambar
}

// Menyimpan gambar Menu
if ($request->hasFile('gambar_menu')) {
    $imageMenu = $request->file('gambar_menu');
    $imageNameMenu = time() . '-' . uniqid() . '.' . $imageMenu->getClientOriginalExtension();
    $imageMenu->move(public_path('uploads/images/menu'), $imageNameMenu);  // Menyimpan gambar ke folder public/uploads/images/menu
    $umkm->gambar_menu = 'uploads/images/menu/' . $imageNameMenu;  // Simpan path gambar
}

// Menyimpan gambar Produk Unggulan
if ($request->hasFile('gambar_unggulan')) {
    $imageUnggulan = $request->file('gambar_unggulan');
    $imageNameUnggulan = time() . '-' . uniqid() . '.' . $imageUnggulan->getClientOriginalExtension();
    $imageUnggulan->move(public_path('uploads/images/unggulan'), $imageNameUnggulan);  // Menyimpan gambar ke folder public/uploads/images/unggulan
    $umkm->gambar_unggulan = 'uploads/images/unggulan/' . $imageNameUnggulan;  // Simpan path gambar
}



    // Simpan data UMKM ke database
    $umkm->save();
    // Redirect ke halaman daftar UMKM dengan pesan sukses
    return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diperbarui!');
}

    
    
}
