<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan category_id ke tabel products
            $table->foreignId('category_id')
                ->nullable() // boleh kosong
                ->after('user_id') // posisi setelah user_id
                ->constrained('categories') // relasi ke tabel categories
                ->cascadeOnDelete(); // jika category dihapus
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menghapus foreign key category_id saat rollback
            $table->dropConstrainedForeignId('category_id');
        });
    }
};