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
        Schema::create('appliances_sales', function (Blueprint $table) {
            $table->id();       
            $table->date('date_out')->nullable();                 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('product_id');            
            $table->string('product_model');
            $table->string('serial_number')->nullable();
            $table->integer('qty')->default('1');
            $table->double('unit_cost',15,2)->nullable();                        
            $table->string('reference_out')->nullable(); 
            $table->double('amount_paid',15,2)->nullable();
            $table->integer('mode_of_payment')->nullable()->comment('1=cash 0=credit');                         
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
        Schema::dropIfExists('appliances_sales');
    }
};
