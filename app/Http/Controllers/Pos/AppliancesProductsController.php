<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Appliances;
use App\Models\AppliancesCategories;
use App\Models\Supplier;


class AppliancesProductsController extends Controller
{
    public function AppliancesProductsAll(){
        $appliances = Appliances::latest()->get();

        return view('backend.appliancesProducts.appliancesProducts_all', compact('appliances'));
    }//end function 

    public function AppliancesProductsAdd(){
        $appliancesCategories = AppliancesCategories::all();
        $suppliers = Supplier::all();

        return view('backend.appliancesProducts.appliancesProducts_add', compact('appliancesCategories', 'suppliers'));
    }
      

    public function AppliancesSave(Request $request){

        
        $supplier = Supplier::findOrFail($request->supplier_id);
        $category = AppliancesCategories::findOrFail($request->category_id);
        

         $product = new Appliances;
         $product->product_model = $request->name;
         $product->supplier_id = $request->supplier_id;
         $product->description = $request->description;
         $category->getProducts()->save($product);


        //  $category->getProducts->create([
        //      'name' => $request->name,
        //  ])
        
        $notification = array(
            'message' => 'Data saved successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('appliancesProducts.all')->with($notification);
    }
    
}
