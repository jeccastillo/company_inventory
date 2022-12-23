<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = []; // to avoid data breach. [] <- means all columns

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');//belongsTo(relatedModel::class,thisTableField,relatedTableID)
    }//end of function

    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');//belongsTo(relatedModel::class,purchaseTableField,relatedTableID)
    }// end of function

    public function product(){
        return $this->belongsTo(Products::class,'product_id','id');//belongsTo(relatedModel::class,purchaseTableField,relatedTableID)
    }// end of function
}
