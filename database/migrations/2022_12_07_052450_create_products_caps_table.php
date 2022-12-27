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
        Schema::create('products_caps', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->string('brand')->nullable();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=prestine','1=defective');                                    
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('products_caps');
    }
};
