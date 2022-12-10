<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Categories;
use App\Models\Supplier;
use App\Models\Products;
use App\Models\Unit;

class PurchasesController extends Controller
{
    public function PurchasesAll(){
        $purchaseData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();

        return view('backend.purchases.purchases_all', compact('purchaseData'));
    }// end of function

    public function PurchaseAdd(){
        $suppliers = Supplier::all();
        $units = Unit::all();
        $categories = Categories::all();
        $products = Products::all();

        return view('backend.purchases.purchase_add', compact('suppliers','units','categories','products'));
    }// end of function
}
