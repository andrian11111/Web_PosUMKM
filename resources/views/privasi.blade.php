<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Halaman Kebijakan Privasi situs web kami. Menyediakan informasi mengenai pengumpulan dan penggunaan data pengguna.">
    <title>Kebijakan Privasi - Local Bizzy</title>
    <!-- Link ke CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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
                    class="nav-link text-black dark:hover:text-green-500  duration-300 font-poppins"
                    id="home-link" onclick="setActiveLink()">Beranda</a>

                    <a href="{{ route('welcome') }}#about"
                    class="nav-link text-black dark:hover:text-green-500  hover:border-green-500   duration-300 font-poppins" 
                    id="about-link" onclick="setActiveLink(event, 'about')">Tentang</a>
                     

                <a href="{{ route('privasi') }}"
                    class="nav-link text-green-500 dark:hover:text-green-500 border-b-4  border-green-400 hover:border-green-500   duration-300 font-poppins">Kebijakan</a>

                <a href="{{ route('panduan') }}"
                    class="nav-link text-black dark:text-black  dark:hover:text-green-500 transition-colors duration-300 font-poppins">Panduan</a>
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


    <main class="max-w-4xl mx-auto p-8 space-y-6 bg-white shadow-lg rounded-lg mt-8 mb-16">
        <section>
            <h1 class="text-black text-3xl font-semibold text-center">🛡️Kebijakan Privasi</h1>
            <h2 class="text-2xl font-semibold text-green-700">Pengenalan</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Kami sangat menghargai privasi Anda. Halaman Kebijakan Privasi ini menjelaskan bagaimana kami
                mengumpulkan,
                menggunakan, dan melindungi informasi pribadi Anda ketika Anda mengunjungi situs web kami.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Informasi yang Kami Kumpulkan</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Kami dapat mengumpulkan informasi berikut:
            </p>
            <ul class="list-disc pl-6 mt-2 text-lg leading-relaxed">
                <li><strong>Informasi pribadi:</strong> Nama, alamat email, nomor telepon, dan informasi lain yang Anda
                    berikan kepada kami.</li>
                <li><strong>Data penggunaan:</strong> Informasi terkait penggunaan situs web kami, seperti halaman yang
                    Anda kunjungi, waktu kunjungan, dan interaksi lainnya.</li>
                <li><strong>Data perangkat:</strong> Jenis perangkat, sistem operasi, dan informasi terkait perangkat
                    yang digunakan untuk mengakses situs kami.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Bagaimana Kami Menggunakan Informasi Anda</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Informasi yang kami kumpulkan digunakan untuk tujuan berikut:
            </p>
            <ul class="list-disc pl-6 mt-2 text-lg leading-relaxed">
                <li>Memproses pesanan atau permintaan yang Anda buat.</li>
                <li>Menyesuaikan pengalaman pengguna dan memberikan layanan yang lebih baik.</li>
                <li>Untuk tujuan pemasaran dan komunikasi, seperti mengirimkan pembaruan, penawaran, dan informasi
                    lainnya yang relevan dengan Anda.</li>
                <li>Untuk meningkatkan kualitas dan kinerja situs kami.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Keamanan Data</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Kami berkomitmen untuk melindungi informasi pribadi Anda. Kami menggunakan langkah-langkah keamanan yang
                wajar
                untuk melindungi data Anda dari akses yang tidak sah, pengungkapan, atau penyalahgunaan.
            </p>
            <p class="mt-2 text-lg leading-relaxed">
                Namun, perlu dicatat bahwa tidak ada metode transmisi data melalui internet atau metode penyimpanan
                elektronik
                yang sepenuhnya aman. Meskipun kami berusaha sebaik mungkin untuk melindungi informasi Anda, kami tidak
                dapat
                menjamin keamanan mutlak.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Pengungkapan kepada Pihak Ketiga</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Kami tidak akan menjual, menyewakan, atau membagikan informasi pribadi Anda dengan pihak ketiga tanpa
                izin Anda,
                kecuali jika diwajibkan oleh hukum atau untuk melindungi hak-hak kami. Kami dapat berbagi informasi
                dengan
                penyedia layanan pihak ketiga yang membantu kami dalam menjalankan situs web kami.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Cookie</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Situs web kami menggunakan cookie untuk meningkatkan pengalaman Anda. Cookie adalah file kecil yang
                disimpan di
                perangkat Anda dan digunakan untuk melacak preferensi Anda serta informasi penggunaan lainnya.
            </p>
            <p class="mt-2 text-lg leading-relaxed">
                Anda dapat mengatur browser Anda untuk menolak cookie, tetapi hal ini dapat mempengaruhi beberapa fitur
                situs kami.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Hak Anda</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Anda memiliki hak untuk mengakses, memperbarui, atau menghapus informasi pribadi yang kami simpan. Jika
                Anda ingin
                menggunakan hak ini atau memiliki pertanyaan lebih lanjut mengenai data pribadi Anda, silakan hubungi
                kami melalui
                informasi kontak yang tertera di bawah.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Perubahan Kebijakan Privasi</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Setiap perubahan akan diposting di
                halaman ini
                dengan tanggal pembaruan yang baru. Kami menyarankan Anda untuk memeriksa kebijakan ini secara berkala
                agar tetap
                mengetahui informasi terbaru mengenai privasi Anda.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-green-700">Kontak Kami</h2>
            <p class="mt-2 text-lg leading-relaxed">
                Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini, silakan hubungi kami
                melalui email di
                <a href="mailto:email@domain.com" class="text-green-600 hover:text-green-800">email@domain.com</a>.
            </p>
        </section>
    </main>

    <div class="max-w-3xl mx-auto p-4 text-right">
    <a href="{{ route('welcome') }}" class="inline-block px-6 py-3 mt-4 text-white bg-green-600 rounded-lg shadow-lg hover:bg-green-700 transition duration-300 ease-in-out">
        Kembali
    </a>
</div>


    <hr class="my-4 max-w-3xl mx-auto border-t-1 border-gray-300">

    <footer class="text-black p-4 text-center">
        <p>&copy; 2024 Local Bizzy Semua hak dilindungi.</p>
    </footer>

</body>


<script>
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
     clickedLink.classList.add('border-b-4'); // Menambahkan border bawah saat aktif
 }
 
 
 
 </script>

</html>