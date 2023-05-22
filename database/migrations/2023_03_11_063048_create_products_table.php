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
            $table->string("productName",50);
            $table->double("price");
            $table->double("cost");
            $table->integer("quantity")->nullable(false);
            $table->integer("percent");
            $table->string("coolingRange");
            $table->string("wattage");
            $table->string("windSpeed");
            $table->string("control");
            $table->string("highestNoiseLevel");
            $table->string("waterBottle");
            $table->string("utilities", 4000);
            $table->string("dimensionsAndWeight");
            $table->string("brand");
            $table->string("madeIn");
        });
        DB::statement("ALTER TABLE products ADD avatar LONGBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
