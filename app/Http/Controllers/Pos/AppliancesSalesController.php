<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliancesSales;
use App\Models\Categories;
use App\Models\Supplier;
use App\Models\Brands;
use App\Models\ProductsCap;
use App\Models\Appliances;
use Auth;
use Illuminate\Support\Carbon;

class AppliancesSalesController extends Controller
{
    public function AppliancesSalesAll(){
        $appliancesSales = AppliancesSales::latest()->get();

        return view('backend.sales.appliances.appliancesSales_all', compact('appliancesSales'));

    }//end of function

    public function AppliancesSalesAdd(){
        $categories = Categories::all();
        $suppliers = Supplier::all();
        $brands = Brands::all();
        $productsCap = ProductsCap::all();
        $existingAppliances = Appliances::all();
        $existingProducts = Appliances::select('product_id','serial_number')->groupBy('product_id')->get();
        // $existingProducts = Appliances::select('product_id')->groupBy('product_id')->get();
        // foreach($existingProducts as $productId){
        //     $group[] = Apppliances::where('product_id',$product->product_id)->get();            
        // }

        return view('backend.sales.appliances.appliancesSales_add', compact('categories','suppliers','brands','productsCap','existingAppliances','existingProducts'));

    }
}
