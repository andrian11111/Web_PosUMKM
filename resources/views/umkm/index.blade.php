@extends('layouts.app')

@section('coba')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="//unpkg.com/alpinejs" defer></script>

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
    <<div class="container mx-auto p-4 ml-64">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">UMKM Anda</h1>
    
            <!-- Cek apakah ada UMKM yang dimiliki oleh pengguna -->
            @if($umkms->isEmpty())
                <p class="mt-4 text-gray-600">Anda belum menambahkan UMKM.</p>
            @else
                <table class="min-w-full mt-4 bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px- 4 py-2">ID</th>
                            <th class="border px-4 py-2">Nama UMKM</th>
                            <th class="border px-4 py-2">Deskripsi</th>
                            <th class="border px-4 py-2">Alamat</th>
                            <th class="border px-4 py-2">Nomor Telepon</th>
                            <th class="border px-4 py-2">Kategori</th>
                            <th class="border px-4 py-2">Gambar</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop untuk menampilkan UMKM -->
                     <!-- Loop untuk menampilkan UMKM -->
                     @foreach($umkms as $umkm)
    <tr class="hover:bg-gray-100">
        <td class="border px-4 py-2">{{ $umkm->id }}</td>
        <td class="border px-4 py-2">{{ $umkm->nama_umkm }}</td>
        <td class="border px-4 py-2">{{ $umkm->deskripsi }}</td>
        <td class="border px-4 py-2">{{ $umkm->alamat }}</td>
        <td class="border px-4 py-2">{{ $umkm->nomor_telepon }}</td>
        <td class="border px-4 py-2">{{ $umkm->kategori }}</td>
        <td class="border px-4 py-2">
    <!-- Menampilkan gambar UMKM -->
    @if ($umkm->gambar_umkm)
        <img src="{{ asset('' . $umkm->gambar_umkm) }}" alt="Gambar UMKM" width="100" class="mb-2">
    @else
        <p>No image available</p>
    @endif

    <!-- Menampilkan gambar Menu -->
    @if ($umkm->gambar_menu)
        <img src="{{ asset('' . $umkm->gambar_menu) }}" alt="Gambar Menu" width="100" class="mb-2">
    @else
        <p>No image available</p>
    @endif

    <!-- Menampilkan gambar Produk Unggulan -->
    @if ($umkm->gambar_unggulan)
        <img src="{{ asset('' . $umkm->gambar_unggulan) }}" alt="Gambar Produk Unggulan" width="100" class="mb-2">
    @else
        <p>No image available</p>
    @endif
</td>

        <td class="border px-4 py-2">
            <!-- Tombol untuk Edit dan Hapus -->
            <a href="{{ route('umkm.edit', $umkm->id) }}" class="bg-yellow-500 hover:bg-yellow-900 text-white px-2 py-1 rounded">Edit</a>
            <form action="{{ route('umkm.destroy', $umkm->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $umkm->id }}">
                @csrf
                @method('DELETE')
                <button type="button" 
                        onclick="confirmDelete({{ $umkm->id }})"
                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-900">
                    Hapus
                </button>
            </form>
            <script>
                function confirmDelete(id) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Item ini tidak bisa dikembalikan setelah dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Trigger form submission after confirmation
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                }
                @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonColor: '#3085d6'
                });
                @endif
            </script>
        </td>
    </tr>
@endforeach


                    </tbody>
                </table>
            @endif
    
            <!-- Tombol untuk menambah UMKM baru -->
            <a href="{{ route('umkm.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-900 text-white px-4 py-2 rounded">Tambah UMKM</a>
        </div>
    </div>
    @endsection