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
        Schema::create('furniture_working_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_model_id');
            $table->unsignedBigInteger('supplier_id');                        
            $table->unsignedBigInteger('category_id');
            //$table->unsignedBigInteger('dr_id')->nullable()->comment('deliver receipt');
            //$table->unsignedBigInteger('si_id')->nullable()->comment('sales invoice');
            //for later implementation
            // $table->unsignedBigInteger('ts_id')->nullable()->comment('transfer slip');            
            // $table->unsignedBigInteger('mrs_id')->nullable()->comment('merchandise receipt slip');
            //$table->string('description')->nullable();
            $table->integer('qty')->default('0');
            $table->double('unit_cost')->nullable();
            $table->double('srp')->nullable();                              
            $table->integer('status')->default('0')->comment('0=prestine, 1=defective');
            //$table->string('remarks')->nullable();
            $table->integer('updated_by')->nullable();  
            $table->integer('created_by')->nullable();
            $table->foreign('product_model_id')->references('id')->on('furniture_products')->onDelete('restrict');             
            $table->foreign('supplier_id')->references('id')->on('furniture_suppliers')->onDelete('restrict'); // $table->foreign('field on current table')->references('id')->on('related table')->onDelete('restrict')            
            $table->foreign('category_id')->references('id')->on('furniture_categories')->onDelete('restrict');                        
            //$table->foreign('dr_id')->references('id')->on('furnitures_deliveries')->onDelete('restrict');
            //$table->foreign('si_id')->references('id')->on('appliances_sales')->onDelete('restrict');
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
        Schema::dropIfExists('furniture_working_stocks');
    }
};
