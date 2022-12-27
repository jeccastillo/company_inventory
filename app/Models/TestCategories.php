<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCategories extends Model
{
    use HasFactory;
    protected $guarded = []; // to avoid data breach. [] <- means all columns


    public function getProduct(){
        return $this->hasMany(TestProducts::class,'category_id', 'id'); //(relatedModel::class,'related id on related model', 'your id')
    }
}
