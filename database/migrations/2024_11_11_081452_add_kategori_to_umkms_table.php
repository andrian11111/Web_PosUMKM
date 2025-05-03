<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_kategori_to_umkms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriToUmkmsTable extends Migration
{
    public function up()
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Tambahkan kolom kategori dengan nilai yang terbatas
            $table->enum('kategori', ['kuliner', 'fashion', 'kerajinan', 'lainnya'])->default('lainnya');
        });
    }

    public function down()
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
}
