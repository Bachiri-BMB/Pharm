<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            //$table->string('name')->unique();
            $table->foreignId('product_id')->nullable()->constrained()->onDelete("cascade");
            $table->integer('N_Facture');           
             $table->date('date');


            

            //$table->foreignId('category_id')->nullable()->constrained()->onDelete("cascade");
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete("cascade");
            $table->string('price');
            $table->string('N_lot');
            $table->string('quantity');
            $table->date('expiry_date');

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
        Schema::dropIfExists('purchases');
    }
}
