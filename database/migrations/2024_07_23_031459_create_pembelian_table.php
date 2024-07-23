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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->bigIncrements('IdPembelian', 11);
            $table->bigInteger('JumlahPembelian');
            $table->decimal('HargaBeli', 10, 2);
            $table->bigInteger('IdBarang')->unsigned();
            $table->bigInteger('IdPengguna')->unsigned();
            $table->bigInteger('IdSupplier')->unsigned();
            
            $table->foreign('IdBarang')->references('IdBarang')->on('barang')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('IdPengguna')->references('IdPengguna')->on('pengguna')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('IdSupplier')->references('IdSupplier')->on('supplier')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
