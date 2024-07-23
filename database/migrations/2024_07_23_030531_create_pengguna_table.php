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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('IdPengguna', 11);
            $table->string('NamaPengguna', 50);
            $table->string('Password', 50);
            $table->string('NamaDepan', 50);
            $table->string('NamaBelakang', 50);
            $table->string('NoHp', 15);
            $table->text('Alamat');
            $table->bigInteger('IdAkses')->unsigned();
            
            $table->foreign('IdAkses')->references('IdAkses')->on('hakakses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
