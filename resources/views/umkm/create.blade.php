@extends('layouts.app')

@section('coba')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Leaflet CSS dan JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Leaflet Control Geocoder -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


<!-- component -->
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed top-0 left-0 h-screen w-64 bg-gray-700 shadow-xl">
        <div class="mb-2 p-4">
            <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-white">Tambah UMKM</h5>
        </div>
        <nav class="flex flex-col gap-1 p-2 text-white">
            <!-- Sidebar items -->
            <div x-data="{ open: false }">
                <div @click="open = !open" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg transition-all hover:bg-gray-400 focus:bg-gray-700 active:bg-gray-700">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    Profile
                </div>

                <div x-show="open" class="ml-8 mt-2">
                    <a href="{{ route('profile.edit') }}" class="block p-2 rounded-lg hover:bg-gray-700">Edit Profile</a>
                </div>
            </div>
            <a href="{{ route('umkm.index') }}" role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                <div class="grid place-items-center mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M3 5.25a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 10.75v-5.5zm11 0a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5a.75.75 0 01-.75-.75v-5.5zM3 15.75a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5A.75.75 0 013 21.25v-5.5zm11 0a.75.75 0 01.75-.75h5.5a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75h-5.5a.75.75 0 01-.75-.75v-5.5z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                Dashboard
            </a>
            <a href="{{ route('umkm.create') }}" role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v8.25h8.25a.75.75 0 010 1.5H12.75v8.25a.75.75 0 01-1.5 0v-8.25H3.75a.75.75 0 010-1.5h8.25V3a.75.75 0 01.75-.75z" clip-rule="evenodd"/>
                      </svg>
                </div>
                Tambahkan UMKM
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-400">
                    <div class="grid place-items-center mr-4">
                        <!-- Ikon Logout -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M14.75 2.25a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-3h-6v12h6v-3a.75.75 0 011.5 0v4.5a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-15a.75.75 0 01.75-.75h7.5zm4.53 7.22a.75.75 0 00-1.06-1.06l-3 3a.75.75 0 000 1.06l3 3a.75.75 0 001.06-1.06l-2.22-2.22h4.72a.75.75 0 000-1.5h-4.72l2.22-2.22z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    Log Out
                </button>
            </form>
        </nav>
    </div>
    

    <!-- Main Content -->
    <div class="flex-1 flex justify-center items-center p-10 ml-64"> <!-- Memusatkan form di tengah halaman -->
        <form action= "{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-16 rounded-lg shadow-lg w-full max-w-3xl" onsubmit="return confirmSave()">
            @csrf
        
            @if (session('success'))
                <div>{{ session('success') }}</div>
            @endif
    
            <!-- Tampilkan pesan error -->
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br><br><br><br><br>
<br><br><br><br><br>
<div class="space-y-5">
    <!-- Nama UMKM -->
    <div class="flex">
        <label for="nama_umkm" class="text-lg font-medium w-1/3">Nama UMKM:</label>
        <input type="text" id="nama_umkm" name="nama_umkm" value="{{ old('nama_umkm') }}" class="input-text flex-1 rounded border-gray-300" required />
    </div>

    <!-- Alamat UMKM -->
    <div class="flex">
        <label for="alamat" class="text-lg font-medium w-1/3">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" class="input-text flex-1 rounded border-gray-300" required />
    </div>

    <!-- Telepon UMKM -->
    <div class="flex">
        <label for="nomor_telepon" class="text-lg font-medium w-1/3">Nomor Telepon:</label>
        <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" class="input-text flex-1 rounded border-gray-300" required placeholder="Contoh: 6283108017543" />
    </div>

    <!-- Harga Minimum -->
    <div class="flex">
        <label for="harga_min" class="text-lg font-medium w-1/3">Harga Minimum:</label>
        <input type="text" id="harga_min" name="harga_min" value="{{ old('harga_min') }}" class="input-text flex-1 rounded border-gray-300" required placeholder="Contoh: 5000" />
    </div>

    <!-- Harga Maximum -->
    <div class="flex">
        <label for="harga_max" class="text-lg font-medium w-1/3">Harga Maximum:</label>
        <input type="text" id="harga_max" name="harga_max" value="{{ old('harga_max') }}" class="input-text flex-1 rounded border-gray-300" required placeholder="Contoh: 10000" />
    </div>

    <!-- Deskripsi UMKM -->
    <div class="flex">
        <label for="deskripsi" class="text-lg font-medium w-1/3">Deskripsi UMKM:</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="input-text flex-1 rounded border-gray-300" required>{{ old('deskripsi') }}</textarea>
    </div>

    <!-- Gambar UMKM -->
    <div class="flex">
        <label for="gambar_umkm" class="text-lg font-medium w-1/3">Gambar UMKM:</label>
        <input type="file" name="gambar_umkm" id="gambar_umkm" class="input-text flex-1 rounded border-gray-300" required />
    </div>

    <!-- Gambar Menu -->
    <div class="flex">
        <label for="gambar_menu" class="text-lg font-medium w-1/3">Gambar Menu:</label>
        <input type="file" name="gambar_menu" id="gambar_menu" class="input-text flex-1 rounded border-gray-300" required />
    </div>

    <!-- Gambar Produk Unggulan -->
    <div class="flex">
        <label for="gambar_unggulan" class="text-lg font-medium w-1/3">Gambar Produk Unggulan:</label>
        <input type="file" name="gambar_unggulan" id="gambar_unggulan" class="input-text flex-1 rounded border-gray-300" required />
    </div>

    <!-- Kategori UMKM -->
    <div class="flex">
        <label for="kategori" class="text-lg font-medium w-1/3">Kategori:</label>
        <select id="kategori" name="kategori" class="input-text flex-1 rounded border-gray-300" required>
            <option value="kuliner">Kuliner</option>
            <option value="fashion">Fashion</option>
            <option value="kerajinan">Kerajinan</option>
            <option value="lainnya">Lainnya</option>
        </select>
    </div>
</div>


            
                <!-- Latitude dan Longitude Hidden Fields -->
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
            
                <!-- Peta (Leaflet) -->
                <div class="flex flex-col">
                    <label for="map" class="text-lg font-medium">Pilih Lokasi UMKM:</label>
                    <div id="map" style="height: 400px; width: 100%;" class="rounded border-gray-300 mb-4"></div>
                </div>
            
                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-green-500 text-white p-2 rounded w-48">Simpan</button>
                </div>
            </div>
            
            <!-- Inisialisasi Peta -->
            <script>
                // Membuat peta
                var map = L.map('map').setView([-7.974857, 112.630798], 13); // Set default position
            
                // Menambahkan tile layer (OpenStreetMap)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            
                // Menambahkan marker yang dapat dipindahkan
                var marker = L.marker([-7.974857, 112.630798], { draggable: true }).addTo(map);
            
                // Update latitude dan longitude pada form ketika marker dipindahkan
                marker.on('moveend', function(e) {
                    var lat = marker.getLatLng().lat;
                    var lng = marker.getLatLng().lng;
            
                    // Update nilai latitude dan longitude di form
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });
            
                // Tambahkan kontrol pencarian untuk mencari lokasi berdasarkan nama
                var geocoder = L.Control.geocoder({
                    defaultMarkGeocode: false
                }).addTo(map);
            
                geocoder.on('markgeocode', function(e) {
                    var latlng = e.geocode.center;
            
                    // Set view dan pindahkan marker ke lokasi yang dicari
                    map.setView(latlng, 13);
                    marker.setLatLng(latlng);
            
                    // Update nilai latitude dan longitude di form
                    document.getElementById('latitude').value = latlng.lat;
                    document.getElementById('longitude').value = latlng.lng;
                });
            </script>
            @endsection