<h1>Halaman tambah gallery foto</h1>
<form action="{{ route('post.gallery') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-4">
    <label for="gambar" class="block text-sm font-medium text-gray-700">Pilih Gambar</label>
  <input type="file" name="gambar[]" id="gambar" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
</form>