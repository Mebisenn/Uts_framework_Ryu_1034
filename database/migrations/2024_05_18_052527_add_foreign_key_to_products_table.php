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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade') // Aksi penghapusan: CASCADE
                  ->onUpdate('no action'); // Aksi pembaruan: NO ACTION
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('modified_by')
                  ->references('email')
                  ->on('users')
                  ->onDelete('no action') // Aksi penghapusan: NO ACTION
                  ->onUpdate('no action'); // Aksi pembaruan: NO ACTION
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['modified_by']);
        });
    }
};