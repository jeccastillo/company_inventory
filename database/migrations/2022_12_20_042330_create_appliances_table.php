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
        Schema::create('appliances', function (Blueprint $table) {
            $table->id();                        
            $table->string('category');
            $table->string('supplier');
            $table->string('product_brand');
            $table->string('product_description');
            $table->string('product_model');
            $table->string('serial_number')->nullable();
            $table->integer('qty')->default('0');
            $table->double('unit_cost',15,2);
            $table->double('srp',15,2);
            $table->string('reference_in')->nullable();
            $table->string('reference_out')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_out')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('updated_by')->nullable();  
            $table->integer('created_by')->nullable();   
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
        Schema::dropIfExists('appliances');
    }
};
