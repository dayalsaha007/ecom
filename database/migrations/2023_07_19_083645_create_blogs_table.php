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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bc_id');
            $table->string('post_title_eng');
            $table->string('post_title_hin');
            $table->string('post_slug_eng');
            $table->string('post_slug_hin');
            $table->string('post_image');
            $table->string('post_details_eng');
            $table->string('post_details_hin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
