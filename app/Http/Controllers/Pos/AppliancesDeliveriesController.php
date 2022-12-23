<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliancesDeliveries;
use App\Models\Supplier;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Products;
use Auth;
use Illuminate\Support\Carbon;

class AppliancesDeliveriesController extends Controller
{
    public function AppliancesDeliveriesAll(){
        $appliancesDeliveries = AppliancesDeliveries::latest()->get();

        return view('backend.appliancesDeliveries.AppliancesDeliveries_all', compact('appliancesDeliveries'));
    }// end of function

    public function AppliancesDeliveriesAdd(){

        $brands     = Brands::all();
        $supplier   = Supplier::all();        
        $categories = Categories::all();
        $products   = Products::all();

        return view('backend.appliancesDeliveries.appliancesDeliveries_add', compact('supplier','categories','products', 'brands'));
    }// end of function

    public function AppliancesDeliveriesStore(Request $request){

        if($request->category_id == null){
            $notification = array(
                'message' => 'No data added', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }else{
            $count_category = count($request->category_id); // counts the instance of rows in table

            for($i = 0; $i < $count_category; $i++){
                
                $qty = $request->qty[$i];
                if($qty > 1){                    
                    for($j = 0;$j<$qty;$j++){
                        $deliveries = new AppliancesDeliveries();
                        $deliveries->date_in        = $request->date[$i];
                        $deliveries->reference      = $request->reference[$i];
                        $deliveries->supplier_id    = $request->supplier_id[$i];
                        $deliveries->brand_id       = $request->brand_id[$i];
                        $deliveries->category_id    = $request->category_id[$i];
                        $deliveries->product_id     = $request->product_id[$i];
                        $deliveries->product_model  = $request->product_model[$i];
                        $deliveries->serial_number  = $request->serial[$i];
                        $deliveries->qty            = '1';
                        $deliveries->unit_cost      = $request->unit_cost[$i];
                        $deliveries->srp            = $request->unit_cost[$i];
                        $deliveries->remarks        = $request->remarks[$i];
                        //$deliveries->buying_price = $request->buying_price[$i];
                        $deliveries->created_by     = Auth::user()->id;
                        $deliveries->status         = '0';
                        $deliveries->save();                                  
                    }                                                         
                }else{
                    
                    $deliveries = new AppliancesDeliveries();
                        $deliveries->date_in           = $request->date[$i];
                        $deliveries->reference      = $request->reference[$i];
                        $deliveries->supplier_id    = $request->supplier_id[$i];
                        $deliveries->brand_id       = $request->brand_id[$i];
                        $deliveries->category_id    = $request->category_id[$i];
                        $deliveries->product_id     = $request->product_id[$i];
                        $deliveries->product_model  = $request->product_model[$i];
                        $deliveries->serial_number  = $request->serial[$i];
                        $deliveries->qty            = $request->qty[$i];
                        $deliveries->unit_cost      = $request->unit_cost[$i];
                        $deliveries->srp            = $request->unit_cost[$i];
                        $deliveries->remarks        = $request->remarks[$i];
                        //$deliveries->buying_price   = $request->buying_price[$i];
                        $deliveries->created_by     = Auth::user()->id;
                        $deliveries->status         = '0';
                        $deliveries->save();
                
                    
                }    
                
        
                                            
            }//end for loop
            $notification = array(
                    'message' => 'Data saved successfully', 
                    'alert-type' => 'success'
                );
            return redirect()->route('appliancesDeliveries.all')->with($notification);
        } // end else

    }
    
}
