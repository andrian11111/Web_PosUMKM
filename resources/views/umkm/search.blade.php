<!-- resources/views/umkm/search.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian UMKM</title>
</head>
<body>
    <h1>Hasil Pencarian UMKM</h1>

    @if($umkms->isEmpty())
        <p>Tidak ada UMKM yang ditemukan.</p>
    @else
        <ul>
            @foreach($umkms as $umkm)
                <li>{{ $umkm->nama_umkm }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
