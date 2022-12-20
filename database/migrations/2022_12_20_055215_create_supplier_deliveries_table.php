<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_deliveries', function (Blueprint $table) {
            $table->id();                        
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('product_brand');
            $table->string('product_description');
            $table->string('product_model');
            $table->string('serial_number')->nullable();
            $table->integer('qty')->default('1');
            $table->double('unit_cost',15,2);
            $table->double('srp',15,2);
            $table->string('reference')->nullable();            
            $table->date('date_in')->nullable();            
            $table->string('remarks')->nullable();
            $table->integer('updated_by')->nullable();  
            $table->integer('created_by')->nullable(); 
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');              
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
        Schema::dropIfExists('supplier_deliveries');
    }
};
