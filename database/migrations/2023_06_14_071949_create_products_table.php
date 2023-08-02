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
            $table->id();
            $table->integer('b_id');
            $table->integer('c_id');
            $table->integer('sc_id')->nullable();
            $table->integer('ssc_id')->nullable();
            $table->string('p_name_eng');
            $table->string('p_name_hin');
            $table->string('p_slug_eng');
            $table->string('p_slug_hin');
            $table->string('p_code');
            $table->string('p_qty');
            $table->string('p_tags_eng')->nullable();
            $table->string('p_tags_hin')->nullable();
            $table->string('p_size_eng')->nullable();
            $table->string('p_size_hin')->nullable();
            $table->string('p_color_eng')->nullable();
            $table->string('p_color_hin')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_eng');
            $table->string('short_descp_hin');
            $table->string('long_descp_eng');
            $table->string('long_descp_hin');
            $table->string('p_image')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
