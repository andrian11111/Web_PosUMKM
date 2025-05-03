<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;
    protected $table = 'umkms'; 
    protected $fillable = [
        'nama_umkm',
        'alamat',
        'nomor_telepon',
        'kategori',  // Menambahkan kategori ke fillable
        'gambar',
        'deskripsi',
        'latitude', 
        'longitude', 
        'harga_min',
        'harga_max',
        'gambar_umkm',
        'gambar_menu',
        'gambar_unggulan',
    ];
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}