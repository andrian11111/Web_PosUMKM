<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_gambar_to_umkms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarToUmkmsTable extends Migration
{
    public function up()
    {
        Schema::table('umkms', function (Blueprint $table) {
            // Menambahkan kolom gambar untuk menyimpan path gambar
            $table->string('gambar')->nullable();
        });
    }

    public function down()
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}
