<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furnitures extends Model
{
    use HasFactory;
    protected $guarded = []; // to avoid data breach. [] <- means all columns   

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id'); // belongsTo(RelatedModel::class,'your_field','field on related model')
    }
        
    public function product(){
        return $this->belongsTo(ProductsCap::class,'product_id','id');
    }
}
