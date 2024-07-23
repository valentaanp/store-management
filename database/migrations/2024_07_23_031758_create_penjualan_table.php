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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('IdPenjualan', 11);
            $table->bigInteger('JumlahPenjualan');
            $table->decimal('HargaJual', 10, 2);
            $table->bigInteger('IdBarang')->unsigned();
            $table->bigInteger('IdPengguna')->unsigned();
            $table->bigInteger('IdPelanggan')->unsigned();

            $table->foreign('IdBarang')->references('IdBarang')->on('barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('IdPengguna')->references('IdPengguna')->on('pengguna')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('IdPelanggan')->references('IdPelanggan')->on('pelanggan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
