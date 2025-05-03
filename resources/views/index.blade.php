<!-- Loop untuk menampilkan setiap UMKM sebagai card -->
@if($umkms->count() > 0)
    @foreach($umkms as $umkm)
        <div class="bg-white rounded-lg p-8 transform transition-all hover:-translate-y-2 duration-300 hover:shadow-[0_4px_6px_rgba(0,255,0,0.7),0_1px_3px_rgba(0,255,0,0.4)]">
            <div class="relative overflow-hidden">
                @if($umkm->gambar)  
                    <img class="object-cover w-full h-48 rounded-[15px]" 
                         src="{{ asset('uploads' . $umkm->gambar) }}" 
                         alt="{{ $umkm->nama_umkm }}">
                @else
                    <img class="object-cover w-full h-48 rounded-[15px]"
                         src="https://via.placeholder.com/400x300" 
                         alt="No Image Available">
                @endif
            </div>
            <h3 class="text-xl font-bold text-gray-900 mt-4">{{ $umkm->nama_umkm }}</h3>
            <p class="text-gray-500 text-sm mt-2">{{ $umkm->deskripsi }}</p>
            <div class="flex items-center justify-between mt-4">
                <span class="text-gray-900 font-bold text-lg">{{ $umkm->kategori }}</span>
                <button class="bg-green-500 text-white py-2 px-4 rounded-full font-bold hover:bg-green-700">
                    Lihat UMKM
                </button>
            </div>
        </div>
    @endforeach
@else
    <p>Tidak ada data UMKM yang tersedia.</p>
@endif
