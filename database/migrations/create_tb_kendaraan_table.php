// database/migrations/2024_01_01_000001_create_tb_kendaraan_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['mobil', 'motor', 'pickup', 'van']);
            $table->string('merk');
            $table->string('plat_nomor')->unique();
            $table->year('tahun');
            $table->string('warna');
            $table->decimal('harga_per_hari', 10, 2);
            $table->enum('status', ['tersedia', 'disewa', 'maintenance'])->default('tersedia');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('is_trusted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_kendaraan');
    }
};