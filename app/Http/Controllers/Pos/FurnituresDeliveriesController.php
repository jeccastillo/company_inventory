<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\furnituresDeliveries;
use App\Models\Supplier;
use App\Models\ProductsCap;

class FurnituresDeliveriesController extends Controller
{
    public function FurnitureDeliveriesAll(){
        $furnitureDeliveries = furnituresDeliveries::latest()->get();

        return view('backend.furnituresDeliveries.furnituresDeliveries_all', compact('furnitureDeliveries'));
    }// end of function

    public function FurnitureDeliveriesAdd(){
        $supplier = Supplier::all();
        $productsCap = ProductsCap::all();
        return view('backend.furnituresDeliveries.furnitureDeliveries_add', compact('supplier','productsCap'));
    }
}
