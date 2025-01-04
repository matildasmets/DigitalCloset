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
        Schema::create('outfits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->enum('type', ['casual', 'formal', 'party', 'work', 'sport', 'other']);
            $table->string('top');
            $table->string('pants');
            $table->string('shoes');
            $table->string('jacket')->nullable();
            $table->string('accessories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outfits');
    }
};
