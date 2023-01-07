<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\FurnitureSales;
use App\Models\furnitureSuppliers;
use App\Models\furnitureProducts;
use App\Models\FurnitureCategories;

class FurnitureSalesController extends Controller
{
    public function FurnitureSalesAll(){
        
        $furnitureSales = FurnitureSales::latest()->get();

        return view('backend.sales.furnitures.furnitureSales_all', compact('furnitureSales'));

    }// end FurnitureSalesAll

    public function FurnitureSalesAdd(){
        $suppliers = furnitureSuppliers::all();
        $products = furnitureProducts::all();
        $categories = FurnitureCategories::all(); 

        return view('backend.sales.furnitures.furnitureSales_add', compact('suppliers','products','categories'));
    }// end FurnitureSalesAdd
}
