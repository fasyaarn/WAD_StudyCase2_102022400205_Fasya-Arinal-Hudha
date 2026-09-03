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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sampel')->unique();
            $table->string('nama_sampel');
            $table->enum('jenis_sampel', ['Air Bersih', 'Air Limbah', 'Udara', 'Emisi Gas', 'Tanah']);
            $table->unsignedInteger('jumlah_titik');
            $table->unsignedBigInteger('biaya_per_titik');
            $table->enum('status_uji', ['Pending', 'In Analysis', 'Completed']);
            $table->text('Catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
