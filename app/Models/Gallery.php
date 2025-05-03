<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['umkm_id', 'gambar'];

    // Relasi ke Umkm
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
