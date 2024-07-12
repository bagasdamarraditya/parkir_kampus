<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('pemilik');
            $table->string('nopol');
            $table->integer('thn_beli');
            $table->text('deskripsi');
            $table->unsignedBigInteger('jenis_kendaraan_id');
            $table->integer('kapasitas_kursi');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropForeign(['jenis_kendaraan_id']);
        });

        Schema::dropIfExists('kendaraans');
    }
}
