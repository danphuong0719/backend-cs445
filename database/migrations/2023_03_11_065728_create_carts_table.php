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
        Schema::create('carts', function (Blueprint $table) {
            $table->integer("user_id");
            $table->integer("product_id");
            $table->string("description")->nullable(true);
            $table->double("price");
            $table->boolean('is_possible_to_order');
            $table->integer("count");
            $table->double("product_total");
            $table->primary(['user_id','product_id']);
        });
        DB::statement("ALTER TABLE carts ADD avatar LONGBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
