<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Menambahkan kolom untuk gambar
            $table->string('gambar_umkm')->nullable(); // Menyimpan path gambar UMKM
            $table->string('gambar_menu')->nullable();  // Menyimpan path gambar Menu
            $table->string('gambar_unggulan')->nullable(); // Menyimpan path gambar Produk Unggulan
        });
    }
    
    public function down()
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Menghapus kolom jika migrasi dibatalkan
            $table->dropColumn('gambar_umkm');
            $table->dropColumn('gambar_menu');
            $table->dropColumn('gambar_unggulan');
        });
    }
    
};
