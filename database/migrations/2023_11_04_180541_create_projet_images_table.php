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
        Schema::create('projet_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("site_id")->nullable();  
            $table->string("type")->nullable();   
            $table->string("image_name")->nullable();
            $table->string("public_path")->nullable();
            $table->string("storage_path")->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_images');
    }
};
