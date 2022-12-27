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
        Schema::create('appliances_deliveries', function (Blueprint $table) {
            $table->id();                        
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('brand_id');            
            $table->string('product_model');
            $table->string('serial_number')->nullable();
            $table->integer('qty')->default('1');
            $table->double('unit_cost',15,2);
            $table->double('srp',15,2);
            $table->string('reference')->nullable();  
            $table->integer('status')->default('0');          
            $table->date('date_in')->nullable();            
            $table->string('remarks')->nullable();
            $table->integer('updated_by')->nullable();  
            $table->integer('created_by')->nullable(); 
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict'); // $table->foreign('field on current table')->references('id')->on('related table')->onDelete('restrict')
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('products_caps')->onDelete('restrict');              
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
        Schema::dropIfExists('appliances_deliveries');
    }
};
