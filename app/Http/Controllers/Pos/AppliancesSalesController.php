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
use App\Models\AppliancesWorkingStocks;
use App\Models\AppliancesCategories;
use Auth;
use Illuminate\Support\Carbon;

class AppliancesSalesController extends Controller
{
    public function AppliancesSalesAll(){
        $appliancesWorkingStock = AppliancesSales::latest()->get();

        return view('backend.sales.appliances.appliancesSales_all', compact('appliancesWorkingStock'));

    }//end of function

    public function AppliancesSalesAdd(){
        $categories = AppliancesCategories::all();
        $suppliers = Supplier::all();
        $brands = Brands::all();
        // $productsCap = ProductsCap::all();
        $existingAppliances = Appliances::all();
        $existingProducts = AppliancesWorkingStocks::select('product_model_id','serial_id','id')->groupBy('product_model_id')->get();
        // $existingProducts = Appliances::select('product_id')->groupBy('product_id')->get();
        // foreach($existingProducts as $productId){
        //     $group[] = Apppliances::where('product_id',$product->product_id)->get();            
        // }

        return view('backend.sales.appliances.appliancesSales_add', compact('categories','suppliers','brands','existingAppliances','existingProducts'));

    }// end of function

    public function AppliancesSalesStore(Request $request){
        echo 'TAPUSIN MO TO BUKAS~~';
    }


}
