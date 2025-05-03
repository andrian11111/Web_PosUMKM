<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">
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
                    class="nav-link text-green-500 dark:hover:text-green-500 border-b-4  border-green-400 hover:border-green-500   duration-300 font-poppins">Panduan</a>
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


    <div class="bg-gray-50 container mx-auto px-26 py-16 rounded-lg">
        <div class="flex items-center justify-between ">
            <div class="w-1/2 pl-12"> <!-- Mengubah pr-8 menjadi pl-12 -->
                <h1 class="text-3xl font-bold text-black-600 mb-4">Panduan Web <span class="text-green-500"><i>Local
                            Bizzy</i></span></h1>
                <p class="text-1xl">Aplikasi “LocalBiz” dilengkapi dengan beberapa fitur utama yang dirancang untuk
                    menemukan dan
                    berinteraksi dengan UMKM lokal, serta mendukung digitalisasi Indonesia. Aplikasi ini menghadirkan
                    pencarian UMKM
                    berbasis lokasi yang memungkinkan pengguna dengan mudah menemukan UMKM terdekat. Dengan teknologi
                    berbasis lokasi
                    ini, konsumen termasuk pendatang bar u atau mereka yang baru pindah ke daerah tertentu, dapat
                    mencari
                    UMKM yang terdekat.</p>
            </div>
            <div class="w-1/3 flex justify-start">
                <img src="{{ asset('images/2.png') }}" class="w-1/2" alt="Gambar 1">
            </div>
        </div>
    </div>
    <hr class="border-t-1 border-black-200 my-4" style="border-radius: 1px;">


    <!-- Hero Section -->


    <!-- <section class="bg-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold text-black-600 mb-4">Panduan Web <span class="text-green-500"><i>Local Bizzy</i></span></h1>
            <div class="relative w-full mx-auto max-w-4xl overflow-hidden rounded-lg shadow-lg">
                <div class="flex animate-slide">
                    <img src="https://via.placeholder.com/800x400/00A86B/FFFFFF" class="w-full" alt="Gambar 1">
                    <img src="https://via.placeholder.com/800x400/2E8B57/FFFFFF" class="w-full" alt="Gambar 2">
                    <img src="https://via.placeholder.com/800x400/66CDAA/FFFFFF" class="w-full" alt="Gambar 3">
                </div>
            </div>
            <p class="text-gray-700 text-lg max-w-2xl mx-auto mt-4">
                Temukan fitur terbaik dan mulai mengelola data Anda dengan mudah dan cepat.
            </p>
            <button
                class="mt-8 px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300">
                Mulai Sekarang
            </button>
        </div>
    </section> -->

    <!-- Fitur Aplikasi -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Fitur Utama Pengunjung</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-green-50 p-6 rounded-lg shadow-md hover:shadow-green-500 transition duration-300">
                    <h3 class="text-xl font-semibold text-green-600 mb-4">Manajemen Data</h3>
                    <p class="text-gray-600">Kelola data Anda dengan mudah dan cepat menggunakan sistem kami yang
                        efisien.</p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg shadow-md hover:shadow-green-500  transition duration-300">
                    <h3 class="text-xl font-semibold text-green-600 mb-4">Analisis Statistik</h3>
                    <p class="text-gray-600">Dapatkan laporan statistik yang akurat untuk analisis bisnis yang lebih
                        baik.</p>
                </div>
                <div class="bg-green-50 p-6 rounded-lg shadow-md hover:shadow-green-500 transition duration-300">
                    <h3 class="text-xl font-semibold text-green-600 mb-4">Notifikasi Real-Time</h3>
                    <p class="text-gray-600">Terima notifikasi langsung tentang pembaruan dan aktivitas terbaru.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Pengguna -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Apa Kata Pengguna Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="text-gray-600 mb-4">"Aplikasi ini sangat membantu dalam mengelola data saya.
                        Fitur-fiturnya sangat lengkap dan mudah digunakan."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-600 text-white flex justify-center items-center">
                            <span>A</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Andi</h4>
                            <span class="text-sm text-gray-500">Pengusaha</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="text-gray-600 mb-4">"UI yang sederhana namun sangat fungsional. Sangat
                        direkomendasikan
                        untuk manajemen bisnis kecil."</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-600 text-white flex justify-center items-center">
                            <span>B</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Budi</h4>
                            <span class="text-sm text-gray-500">Pengelola Toko</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="text-gray-600 mb-4">"Layanan dukungan yang responsif dan membantu saya saat ada
                        masalah.
                        Sangat memuaskan!"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-green-600 text-white flex justify-center items-center">
                            <span>C</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold">Citra</h4>
                            <span class="text-sm text-gray-500">Freelancer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="">
        <hr class="my-8 max-w-3xl mx-auto border-t-1 border-gray-300">

        <div class="max-w-7xl mx-auto text-center mb-6">
            <p class="text-sm">&copy; 2024 <a href="" class="hover:underline">Local Bizzy.com</a>.
                All
                rights
                reserved.</p>
        </div>
    </footer>

    <!-- Animasi Carousel -->
    <!-- <style>
        .animate-slide {
            animation: slide 15s infinite alternate;
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            33% {
                transform: translateX(-100%);
            }

            66% {
                transform: translateX(-200%);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style> -->
</body>

</html>