<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliancesDeliveries extends Model
{
    use HasFactory;

    protected $guarded = []; // to avoid data breach. [] <- means all columns

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id'); // belongsTo(RelatedModel::class,'your_field','field on related model')
    }

    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brands::class,'brand_id','id');
    }
    
    public function product(){
        return $this->belongsTo(ProductsCap::class,'product_id','id');
    }
}
