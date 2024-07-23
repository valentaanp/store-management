<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('IdBarang', 11);
            $table->string('NamaBarang', 100);
            $table->string('Keterangan', 100);
            $table->string('Satuan', 50);
            $table->bigInteger('IdPengguna')->unsigned();

            $table->foreign('IdPengguna')->references('IdPengguna')->on('pengguna')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
