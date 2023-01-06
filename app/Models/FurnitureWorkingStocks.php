<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnitureWorkingStocks extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function getDr(){
        return $this->hasMany(furnituresDeliveries::class, 'product_model_id', 'id');
    }
}
