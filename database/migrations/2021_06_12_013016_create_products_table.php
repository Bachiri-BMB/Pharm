<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->integer('nmbr_min_stock')->default(0);
          //  $table->foreignId('purchase_id')->nullable()->constrained()->onDelete("cascade");
            $table->string('name')->unique();
           $table->foreignId('category_id')->nullable()->constrained()->onDelete("cascade");
           // $table->integer('price');
           // $table->integer('discount');
           $table->string('image')->nullable();

            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
