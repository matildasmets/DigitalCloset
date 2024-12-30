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
        Schema::create('clothing', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name'); // Name of photo
            $table->string('photo'); // Path to photo
            $table->enum('type', ['top', 'pants', 'shoes', 'jacket', 'accessory']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing');
    }
};
