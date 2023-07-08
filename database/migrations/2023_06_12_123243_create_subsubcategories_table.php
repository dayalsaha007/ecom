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
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->id();
            $table->integer('c_id');
            $table->integer('sc_id');
            $table->string('ssc_name_eng');
            $table->string('ssc_name_hin');
            $table->string('ssc_slug_eng');
            $table->string('ssc_slug_hin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubcategories');
    }
};
