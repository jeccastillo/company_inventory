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
        Schema::create('furnitures', function (Blueprint $table) {
            $table->id();                                    
            $table->unsignedBigInteger('supplier_id');            
            $table->unsignedBigInteger('product_id');
            $table->string('product_model');
            $table->string('color')->nullable();
            $table->string('job_order')->nullable();
            $table->integer('qty')->default('1');
            $table->double('unit_cost',15,2);
            $table->double('srp_gdp',15,2);
            $table->double('total_gdp',15,2)->storedAs('`qty`*`srp_gdp`'); //computed column
            $table->string('reference')->nullable();  
            $table->integer('status')->default('0')->comment('0=prestine 1=defective');          
            $table->date('date_in')->nullable();            
            $table->string('remarks')->nullable();
            $table->integer('updated_by')->nullable();  
            $table->integer('created_by')->nullable(); 
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('restrict'); // $table->foreign('field on current table')->references('id')->on('related table')->onDelete('restrict')            
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
        Schema::dropIfExists('furnitures');
    }
};
