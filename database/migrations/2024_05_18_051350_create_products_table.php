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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom 'id' dengan AUTO_INCREMENT dan PRIMARY KEY
            $table->string('name')->notNull();
            $table->text('description');
            $table->integer('price')->notNull(); // Menghapus AUTO_INCREMENT dari kolom 'price'
            $table->string('image');
            $table->unsignedInteger('category_id')->notNull();
            $table->date('expired_at')->notNull();
            $table->string('modified_by', 255)->notNull()->comment('email user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
