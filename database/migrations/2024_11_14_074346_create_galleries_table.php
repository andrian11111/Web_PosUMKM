<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            // Menyebutkan kolom foreign key secara eksplisit
            $table->unsignedBigInteger('umkm_id'); // umkm_id yang mengarah ke kolom id di tabel umkms
            $table->foreign('umkm_id')->references('id')->on('umkms')->onDelete('cascade');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
