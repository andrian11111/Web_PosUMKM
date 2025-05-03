<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Bizzy</title>
    
    <!-- Mengimpor CSS yang sudah di-compile oleh Laravel Mix -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/@flowbite/carousel@1.0.5/dist/carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.0/dist/flowbite.min.js"></script>



</head>




<body class="bg-white"
    style=" margin: 0; padding: 0; box-sizing: border-box; overflow-x: hidden; /* Ini mencegah overflow horizontal */">

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
                <a href="#" 
                class="nav-link text-green-500 dark:hover:text-green-500 border-b-4  border-green-400 hover:border-green-500   duration-300 font-poppins" 
                id="home-link" onclick="setActiveLink(event, 'home')">Beranda</a>
             
             <a href="#about" 
                class="nav-link text-black dark:hover:text-green-500  hover:border-green-500   duration-300 font-poppins" 
                id="about-link" onclick="setActiveLink(event, 'about')">Tentang</a>

                     

                <a href="{{ route('privasi') }}"
                    class="nav-link text-black dark:text-black  dark:hover:text-green-500 transition-colors duration-300 font-poppins">Kebijakan</a>

                <a href="{{ route('panduan') }}"
                    class="nav-link text-black dark:text-black  dark:hover:text-green-500 transition-colors  duration-300 font-poppins">Panduan</a>
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
                            <a href="{{ url('/umkm') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

        </nav>
    </header>


 <!-- Konten Utama -->
<div class="container mx-auto mt-16 py-10 px-4">
    <!-- Teks Selamat Datang -->
    <h1 class="text-4xl font-semibold mb-4">Selamat datang di <span class="text-green-500">Local Bizzy!</span></h1>
    <p class="text-lg text-gray-700 font-semibold mb-6">Dapatkan infonya di sini...</p>

    <!-- Form Pencarian -->
    <div class="max-w-lg">
        <form action="{{ route('umkm.search') }}" method="GET" class="mb-6">
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                <div class="p-3 bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 18a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm0 0l5 5m-5-5h-3m3 0h3" />
                    </svg>
                </div>
                <input type="text" name="search" placeholder="Silahkan cari kuliner,kerajinan,fashion atau nama umkm"
                    class="w-full py-2 px-4 text-gray-700 focus:outline-none" />
                <button class="bg-green-500 text-white py-2 px-4 hover:bg-green-700 rounded-r-lg">Cari</button>
            </div>
        </form>
    </div>
</div>


<div class="scroll-animate" id="element1">
    <div class="max-w-6xl mx-auto mt-20">

        <div id="default-carousel" class="relative rounded-lg overflow-hidden shadow-lg" data-carousel="static"
            data-carousel-interval="3000">
            <!-- Carousel wrapper -->
            <div class="relative h-70 md:h-80" data-carousel-inner>
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/bg_index.png') }}" class="object-cover w-full h-full" alt="Slide 1">


                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/bg_index4.png') }}" class="object-cover w-full h-full" alt="Slide 2">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('images/bg_6.png') }}"
                        class="object-cover w-full h-full" alt="Slide 3">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2" data-carousel-indicators>
                <button type="button"
                    class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
                <button type="button"
                    class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
                <button type="button"
                    class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                data-carousel-prev>
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
            <button type="button"
                class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 focus:outline-none transition"
                data-carousel-next>
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
       

    </div>

        

    </div>


    
    <div class="button flex justify-center gap-8 mt-16">
        <!-- Shopee Pilih Lokal -->
        <div class="flex flex-col items-center group">
  <a href="{{ route('login') }}"
                class="inline-block transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg active:scale-95 active:shadow-xl">
                <div class="inline-block border border-green-500 bg-white p-4 rounded-full">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxplRZvWAGZU5QLH8swk-AJZq68eKctkn7YQw8hX34vIaTCISJrfluvapeHjQVhYk881I&usqp=CAU"
                        alt="Shopee Pilih Lokal" class="w-8 h-8">
                </div>
            </a>
            <a href="{{ route('login') }}"
                class="text-xs mt-2 text-center group-hover:text-green-500 transform transition-all duration-300 group-hover:scale-110 active:scale-95">
                Daftar UMKM
            </a>
        </div>

        <!-- Shopee Mall -->
        <div class="flex flex-col items-center group">
            <a href="{{ route('welcome') }}#searchResults" 
                class="inline-block transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg active:scale-95 active:shadow-xl">
                <div class="inline-block border border-green-500 bg-white p-4 rounded-full">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzDBfsc--BS587cU0xb6A6RQLEk3dh5Prwqlbe_7oyRKbjuiVAUZ5AlfNtgGYMI99TJnI&usqp=CAU"
                        alt="Shopee Mall" class="w-8 h-8">
                </div>
            </a>
            
            <a href="{{ route('welcome') }}#searchResults" 
                class="text-xs mt-2 text-center group-hover:text-green-500 transform transition-all duration-300 group-hover:scale-110 active:scale-95">
                Rekomendasi
            </a>
        </div>

        
        <div class="flex flex-col items-center group">
            <a href="{{ route('privasi') }}"
                class="inline-block transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg active:scale-95 active:shadow-xl">
                <div class="inline-block border border-green-500 bg-white p-4 rounded-full">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNKCJvOJ9LfaSYNjtus-ATjWe9DMkcafxCOBxz8uhbyHpujxhlkY_1x_YJBip21zpq9LE&usqp=CAU"
                        alt="Pulsa, Tagihan, dan Tiket" class="w-8 h-8">
                </div>
            </a>
            <a href="{{ route('privasi') }}"
                class="text-xs mt-2 text-center group-hover:text-green-500 transform transition-all duration-300 group-hover:scale-110 active:scale-95">
                Kebijakan
            </a>
        </div>
    </div>
    <!-- </div> -->
    
    <div id="searchResults" class="max-w-7xl mx-auto px-4 mt-16">
        <div class="scroll-animate" id="searchResults" class="max-w-7xl mx-auto px-4 mt-16">
            <div class="text-right">
                <a href="{{ route('welcome') }}#searchResults" 
            class="inline-block px-6 py-3 mt-4 text-green-600 bg-white border border-green-600 rounded-lg shadow-lg hover:bg-green-600 hover:text-white transition duration-300 ease-in-out">
             Lihat Semua
         </a>
            </div>
            
        <h1 class="text-4xl font-semibold mb-4 text-green-500">Rekomendasi</h1>
        @if(isset($umkms) && $umkms->count() > 0)
        <div id="carouselSection" class="swiper umkm-carousel">
                <div class="swiper-wrapper">
                    @foreach($umkms as $umkm)
                        <div class="swiper-slide">
                            <div class="bg-gray-100 rounded-lg shadow-lg p-6 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_4px_6px_rgba(0,255,0,0.7),0_1px_3px_rgba(0,255,0,0.4)]">

                                <div class="relative aspect-video overflow-hidden rounded-lg">
                                    @if ($umkm->gambar_umkm)
                                        <img 
                                            src="{{ asset(''. $umkm->gambar_umkm) }}" 
                                            alt="{{ $umkm->nama_umkm }}"
                                            class="w-full h-full object-cover"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                            <span class="text-gray-400">No image available</span>
                                        </div>
                                    @endif
                                </div>
    
                                <h3 class="text-xl font-bold text-gray-900 mt-4 truncate">
                                    {{ $umkm->nama_umkm }}
                                </h3>
    
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2 h-10">
                                    {{ $umkm->deskripsi }}
                                </p>
    
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-gray-900 font-bold text-lg">
                                        {{ $umkm->kategori }}
                                    </span>
                                    <a 
                                        href="{{ route('umkm.show', $umkm->id) }}" 
                                        class="bg-green-500 text-white py-2 px-4 rounded-full font-bold hover:bg-green-700 transition-colors duration-300"
                                    >
                                        Lihat UMKM
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    
                <!-- Navigation Buttons -->
                <div class="swiper-button-next !w-10 !h-10 !after:text-lg"></div>
                <div class="swiper-button-prev !w-10 !h-10 !after:text-lg"></div>
    
                <!-- Pagination -->
                <div class="swiper-pagination !bottom-0 !-mb-6"></div>
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                Tidak ada data UMKM yang tersedia
            </div>
        @endif
    </div>
    
<!-- About Section -->
<div id="about" class="flex items-center justify-center mb-12">
    <div class= "scroll-animate" id="searchResults" class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-8 flex items-center justify-between mt-20">
        <div>
            <h2 class="text-center text-3xl font-semibold text-gray-800">Tentang Website <span class="text-green-600">Local Bizzy</span></h2>
            <br>
            <p class="text-gray-600 text-1xl">
                <i>Aplikasi “LocalBiz” dilengkapi dengan beberapa fitur utama yang dirancang
                    untuk menemukan dan berinteraksi dengan UMKM lokal, serta mendukung digitalisasi
                    Indonesia. Aplikasi ini menghadirkan pencarian UMKM berbasis lokasi yang memungkinkan
                    pengguna dengan mudah menemukan UMKM terdekat. Dengan teknologi berbasis lokasi ini, konsumen
                    termasuk pendatang baru atau mereka yang baru pindah ke daerah tertentu, dapat mencari UMKM
                    terdekat.</i>
            </p>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div class= "scroll-animate" if="searchResults" class="bg-white py-8 border-t mt-24">
    <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-gray-800">
        <!-- Konten Footer -->
        <div class="flex flex-col space-y-4">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/1.png') }}" alt="Logo" class="w-18 h-14">
                <span class="text-green-600 font-bold text-lg">Local Bizzy</span>
            </div>
            <p>Dapatkan "info UMKM" hanya di Local Bizzy. Daftarkan "UMKM Anda" di sini!</p>
        </div>

        <div>
            <h3 class="font-semibold text-lg mb-4">Local Bizzy</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                <li><a href="#" class="hover:underline">Promosikan UMKM Anda</a></li>
                <li><a href="#" class="hover:underline">Pusat Bantuan</a></li>
            </ul>
        </div>

        <!-- Link Kebijakan -->
        <div>
            <h3 class="font-semibold text-lg mb-4">KEBIJAKAN</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                <li><a href="#" class="hover:underline">Syarat dan Ketentuan Umum</a></li>
            </ul>
        </div>

        <!-- Kontak Kami -->
        <div>
            <h3 class="font-semibold text-lg mb-4">HUBUNGI KAMI</h3>
            <ul class="space-y-2">
                <li class="flex items-center space-x-2">
                    <span>📧</span>
                    <a href="mailto:cs@malang.com" class="hover:underline">Local Bizzy.com</a>
                </li>
                <li class="flex items-center space-x-2">
                    <span>📱</span>
                    <a href="tel:+628814990427" class="hover:underline">+628814990427</a>
                </li>
                <li class="flex space-x-4 mt-4">
                    <a href="#" class="hover:text-gray-600">🌐</a>
                    <a href="#" class="hover:text-gray-600">🐦</a>
                    <a href="#" class="hover:text-gray-600">📷</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<hr class="my-8 max-w-3xl mx-auto border-t-1 border-gray-300">

<div class="max-w-7xl mx-auto text-center">
    <p class="text-sm">&copy; 2024 <a href="" class="hover:underline">Local Bizzy.com</a>. All rights reserved.</p>
</div>
<script>
    // Fungsi untuk mengatur link aktif
    function setActiveLink(event, link) {
        // Menghapus kelas hijau dan border bawah dari semua link
        document.querySelectorAll('.nav-link').forEach(function(linkElement) {
            linkElement.classList.remove('text-green-500');
            linkElement.classList.add('text-black');
            linkElement.classList.remove('border-green-500');
            linkElement.classList.remove('border-b-4');
            linkElement.classList.add('border-green-400');
        });
    
        // Menambahkan kelas hijau dan border bawah pada link yang diklik
        const clickedLink = event.target;
        clickedLink.classList.remove('text-black');
        clickedLink.classList.add('text-green-500');
        clickedLink.classList.add('border-green-500');
        clickedLink.classList.add('border-b-4');
    }
    
    // Fungsi untuk scroll ke hasil pencarian
    function scrollToResults() {
        const searchResults = document.getElementById('searchResults');
        const urlParams = new URLSearchParams(window.location.search);
        const searchQuery = urlParams.get('search');
        
        if (searchQuery && searchResults) {
            setTimeout(() => {
                const headerOffset = 100; // Sesuaikan dengan tinggi header Anda
                const elementPosition = searchResults.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
    
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                
                searchResults.classList.add('search-highlight');
                setTimeout(() => {
                    searchResults.classList.remove('search-highlight');
                }, 1000);
            }, 300); // Increased delay untuk memastikan konten sudah dimuat
        }
    }
    
    // Event listener saat DOM sudah dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi Swiper
        new Swiper('.umkm-carousel', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    
        // Attach event listener untuk form pencarian
        const searchForm = document.getElementById('searchForm');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                // Form akan di-submit secara normal
                // Scroll akan ditangani oleh scrollToResults setelah halaman dimuat ulang
            });
        }
    
        // Panggil scrollToResults setelah halaman dimuat
        scrollToResults();
    });
    
    // Event listener untuk scroll animation
    // Event listener untuk scroll animation
window.addEventListener('scroll', function() {
    var elements = document.querySelectorAll('.scroll-animate');
    elements.forEach(function(element) {
        var position = element.getBoundingClientRect();
        var offset = 100; // Offset untuk trigger animation

        // Check if element is entering viewport
        if (position.top < window.innerHeight - offset && position.bottom > 0) {
            element.classList.add('active');
        } else {
            // Remove active class when element is out of viewport
            element.classList.remove('active');
        }
    });
}, { passive: true });
    // Handle browser navigation
    window.addEventListener('popstate', scrollToResults);
    </script>
    
    
<style>
    .swiper-button-next,
    .swiper-button-prev {
        background-color: rgb(34 197 94); /* bg-green-500 */
        border-radius: 9999px;
        color: white !important;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgb(21 128 61); /* bg-green-700 */
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .swiper-pagination-bullet-active {
        background-color: rgb(34 197 94) !important; /* bg-green-500 */
    }
    /* Definisikan animasi */
    @keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Kelas untuk animasi */
.scroll-animate {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
    will-change: transform, opacity;
}


/* Kelas saat elemen masuk viewport */
.scroll-animate.active {
    opacity: 1;
    transform: translateY(0);
}
@keyframes highlightAnimation {
    0% { background-color: rgba(34, 197, 94, 0.1); } /* green-500 with low opacity */
    100% { background-color: transparent; }
}

.search-highlight {
    animation: highlightAnimation 1s ease-out;
}

/* Optional: Add some padding to account for fixed headers if you have any */
html {
    scroll-padding-top: 2rem; /* Adjust this value based on your header height */
}

</style>

       

</body>

</html>