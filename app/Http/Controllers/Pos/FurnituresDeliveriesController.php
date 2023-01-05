<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\furnituresDeliveries;
use App\Models\furnitureSuppliers;
use App\Models\furnitureProducts;
use App\Models\FurnitureCategories;
use App\Models\Supplier;
use App\Models\ProductsCap;

class FurnituresDeliveriesController extends Controller
{
    public function FurnitureDeliveriesAll(){

        $furnitureDeliveries = furnituresDeliveries::latest()->get();

        return view('backend.furnituresDeliveries.furnituresDeliveries_all', compact('furnitureDeliveries'));
    }// end of function

    public function FurnitureDeliveriesAdd(){
        $suppliers = furnitureSuppliers::all();
        $products = furnitureProducts::all();
        $categories = FurnitureCategories::all();

        return view('backend.furnituresDeliveries.furnitureDeliveries_add', compact('suppliers','products','categories'));
    }
}
