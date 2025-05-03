<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Sticky Navbar</title>

    <!-- CSS and JS Links -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>

<body class="bg-white overflow-x-hidden">

    <!-- Navbar -->
    <header
        class="bg-blur-600 text-white sticky top-0 z-50 shadow-lg p-1 rounded-b-[30px] backdrop-blur-md bg-opacity-40">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#"
                class="flex items-center space-x-2 text-2xl font-bold text-indigo-800 dark:text-green-600 transition-colors duration-300">
                <!-- Icon on the left -->
                <img src="{{ asset('images/1.png') }}" alt="file" class="w-14 h-12">
                <span>Local Bizzy</span>
            </a>

            <div class="hidden md:flex space-x-6">
                <a href="{{ route('welcome') }}"
                    class="nav-link text-black dark:hover:text-green-500   hover:border-green-500   duration-300 font-poppins"
                    id="home-link" onclick="setActiveLink()">Beranda</a>

              <a href="{{ route('welcome') }}#about"
                    class="nav-link text-black  dark:hover:text-green-500  duration-300 font-poppinss"
                    
                    id="about-link" onclick="setActiveLink('about')">Tentang</a>
                     

                <a href="{{ route('privasi') }}"
                    class="nav-link text-black dark:text-black  dark:hover:text-green-500 transition-colors duration-300 font-poppins">Kebijakan</a>

                <a href="{{ route('panduan') }}"
                    class="nav-link text-black dark:hover:text-green-500    duration-300 font-poppins">Panduan</a>
            </div>



            <div class="hidden md:flex items-center space-x-4">
                @if (Route::has('register'))
                    @guest
                        <a href="{{ route('register') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors duration-300">Sign
                            Up</a>
                        <a href="{{ route('login') }}"
                            class="inline-block border border-green-500 text-black px-4 py-2 rounded-lg hover:bg-green-600 hover:text-black transition-colors duration-300">
                            Masuk
                        </a>
                    @endguest

                    @auth
                        @if (Route::has('login'))
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

        </nav>
    </header>


    <!-- Main Content -->
    <div class="container mx-auto mt-16 py-10 px-4">
        <h1 class="text-4xl font-semibold mb-6">Detail UMKM <span class="text-green-500">Local Bizzy!</span></h1>
        <p class="text-lg text-black-200 font-semibold">Dapatkan infonya di sini...</p>
    </div>

    <div class="max-w-7xl mx-auto p-6  font-sans">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-4">
                <div class="lg:col-span-2 w-full h-80 relative">
                    @if ($umkm->gambar_umkm)
                        <img src="{{ asset('' . $umkm->gambar_umkm) }}" alt="{{ $umkm->nama_umkm }}" class="w-full h-full object-cover rounded-lg shadow-lg">
                    @else
                        <p>No image available</p>
                    @endif
                </div>

                <div class="grid grid-cols-1 gap-4">
                    @if ($umkm->gambar_menu)
                        <img src="{{ asset('' . $umkm->gambar_menu) }}" alt="Image 2" class="w-full h-40 object-cover rounded-lg shadow-md">
                    @endif

                    @if ($umkm->gambar_unggulan)
                        <img src="{{ asset('' . $umkm->gambar_unggulan) }}" alt="Image 3" class="w-full h-40 object-cover rounded-lg shadow-md">
                    @endif
                </div>
            </div>

            <div class="p-6 space-y-8">
                <h2 class="text-4xl font-semibold text-gray-800 mb-4">{{ $umkm->nama_umkm }}</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">{{ $umkm->deskripsi }}</p>

                <div class="flex items-center justify-between mb-6">
                    <span class="text-2xl font-semibold text-green-600">{{ $umkm->kategori }}</span>
                </div>

                <div class="space-y-4">
                    <h3 class="text-2xl font-semibold text-gray-800">Informasi UMKM</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li class="text-xl">Alamat: <span class="font-medium text-gray-700">{{ $umkm->alamat }}</span></li>
                        <li class="text-xl">No Telepon: <span class="font-medium text-gray-700">{{ $umkm->no_telepon }}</span></li>
                        <li class="text-xl">Harga Min: <span class="font-medium text-gray-700">Rp {{ number_format($umkm->harga_min, 0, ',', '.') }}</span></li>
                        <li class="text-xl">Harga Max: <span class="font-medium text-gray-700">Rp {{ number_format($umkm->harga_max, 0, ',', '.') }}</span></li>
                    </ul>
                </div>
                
                @if($umkm->harga_min && $umkm->harga_max)
                <p class="text-gray-600 mb-4">
                    <strong>Harga:</strong> Rp {{ number_format($umkm->harga_min, 0, ',', '.') }} - Rp {{ number_format($umkm->harga_max, 0, ',', '.') }}
                </p>
                @endif

                
                   
                <a href="https://wa.me/{{ ltrim($umkm->nomor_telepon, '+') }}" target="_blank" 
                    class="inline-flex items-center justify-center bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 32 32" fill="none">
                        <circle cx="16" cy="16" r="14" fill="#25D366"/>
                        <path fill="#fff" d="M16 0C7.164 0 0 7.163 0 16c0 2.837.74 5.642 2.144 8.093L.165 31.01l7.063-1.849C9.871 30.747 12.928 32 16 32c8.836 0 16-7.164 16-16S24.836 0 16 0zM16 29.278c-2.82 0-5.575-.797-7.956-2.3l-.576-.354-4.193 1.097 1.118-4.064-.372-.603c-1.312-2.124-2.017-4.56-2.017-7.054C2 8.133 8.134 2 16 2s14 6.134 14 14c0 7.865-6.134 14-14 14z"></path>
                        <path fill="#fff" d="M22.54 16.88l-5.27-1.75a2.39 2.39 0 0 0-2.29.47l-1.91 1.44a16.88 16.88 0 0 1-8.55-8.55l1.44-1.91a2.39 2.39 0 0 0 .47-2.29L7.12 1.46a2.4 2.4 0 0 0-2.64-1.38A19.38 19.38 0 0 0 0 4.28 19.39 19.39 0 0 0 19.72 24a19.38 19.38 0 0 0 4.2-4.48 2.4 2.4 0 0 0-1.38-2.64z"></path>
                    </svg>
                    Hubungi via WhatsApp
                </a>
                </p>
                <div id="map" class="w-full mt-6 p-4 h-64 rounded-lg overflow-hidden"></div>

                <div class="flex justify-start px-6 pb-6">
                    <a href="{{ route('welcome') }}" 
                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300 text-lg shadow-lg">
                        Kembali
                </a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([{{ $umkm->latitude }}, {{ $umkm->longitude }}], 13);

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tambahkan marker
        L.marker([{{ $umkm->latitude }}, {{ $umkm->longitude }}]).addTo(map)
            .bindPopup('Lokasi UMKM: {{ $umkm->nama_umkm }}')
            .openPopup();
    </script>
</body>
</html>