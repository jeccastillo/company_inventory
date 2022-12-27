<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliancesDeliveries;
use App\Models\Supplier;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Appliances;
use App\Models\ProductsCap;
use Auth;
use Illuminate\Support\Carbon;

class AppliancesDeliveriesController extends Controller
{
    public function AppliancesDeliveriesAll(){
        $appliancesDeliveries = AppliancesDeliveries::latest()->get();

        return view('backend.appliancesDeliveries.AppliancesDeliveries_all', compact('appliancesDeliveries'));
    }// end of function

    public function AppliancesDeliveriesAdd(){

        $brands         = Brands::all();
        $supplier       = Supplier::all();        
        $categories     = Categories::all();
        //$products     = Products::all();
        $productsCap    = ProductsCap::all();

        return view('backend.appliancesDeliveries.appliancesDeliveries_add', compact('supplier','categories','productsCap', 'brands'));
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
                        $deliveries->srp            = $request->srp[$i];
                        $deliveries->remarks        = $request->remarks[$i];
                        //$deliveries->buying_price = $request->buying_price[$i];
                        $deliveries->created_by     = Auth::user()->id;
                        $deliveries->status         = $request->status[$i];
                        $deliveries->save();  
                        
                        $appliances = new Appliances();
                        $appliances->appliances_deliveries_id = $deliveries->id;
                        $appliances->date_in        = $request->date[$i];
                        $appliances->reference_in   = $request->reference[$i];
                        $appliances->supplier_id    = $request->supplier_id[$i];
                        $appliances->brand_id       = $request->brand_id[$i];
                        $appliances->category_id    = $request->category_id[$i];
                        $appliances->product_id     = $request->product_id[$i];
                        $appliances->product_model  = $request->product_model[$i];
                        $appliances->serial_number  = $request->serial[$i];
                        $appliances->qty            = '1';
                        $appliances->unit_cost      = $request->unit_cost[$i];
                        $appliances->srp            = $request->srp[$i];
                        $appliances->remarks        = $request->remarks[$i];
                        //$deliveries->buying_price   = $request->buying_price[$i];
                        $appliances->created_by     = Auth::user()->id;
                        $appliances->status         = $request->status[$i];
                        $appliances->save();
                    }                                                         
                }else{
                    
                    $deliveries = new AppliancesDeliveries();
                    $deliveries->date_in        = $request->date[$i];
                    $deliveries->reference      = $request->reference[$i];
                    $deliveries->supplier_id    = $request->supplier_id[$i];
                    $deliveries->brand_id       = $request->brand_id[$i];
                    $deliveries->category_id    = $request->category_id[$i];
                    $deliveries->product_id     = $request->product_id[$i];
                    $deliveries->product_model  = $request->product_model[$i];
                    $deliveries->serial_number  = $request->serial[$i];
                    $deliveries->qty            = $request->qty[$i];
                    $deliveries->unit_cost      = $request->unit_cost[$i];
                    $deliveries->srp            = $request->srp[$i];
                    $deliveries->remarks        = $request->remarks[$i];
                    //$deliveries->buying_price   = $request->buying_price[$i];
                    $deliveries->created_by     = Auth::user()->id;
                    $deliveries->status         = $request->status[$i];
                    $deliveries->save();
                
                    $appliances = new Appliances();
                    $appliances->appliances_deliveries_id = $deliveries->id;
                    $appliances->date_in        = $request->date[$i];
                    $appliances->reference_in   = $request->reference[$i];
                    $appliances->supplier_id    = $request->supplier_id[$i];
                    $appliances->brand_id       = $request->brand_id[$i];
                    $appliances->category_id    = $request->category_id[$i];
                    $appliances->product_id     = $request->product_id[$i];
                    $appliances->product_model  = $request->product_model[$i];
                    $appliances->serial_number  = $request->serial[$i];
                    $appliances->qty            = $request->qty[$i];
                    $appliances->unit_cost      = $request->unit_cost[$i];
                    $appliances->srp            = $request->srp[$i];
                    $appliances->status         = $request->status[$i];
                    $appliances->remarks        = $request->remarks[$i];
                    //$deliveries->buying_price   = $request->buying_price[$i];
                    $appliances->created_by     = Auth::user()->id;                    
                    $appliances->save();
                    
                }    
                
        
                                            
            }//end for loop
            $notification = array(
                    'message' => 'Data saved successfully', 
                    'alert-type' => 'success'
                );
            return redirect()->route('appliancesDeliveries.all')->with($notification);
        } // end else

    }//end of function

    public function AppliancesDeliveriesDelete($id){

        $itemToDelete2  = AppliancesDeliveries::findOrFail($id);
        $delivery_id = $itemToDelete2->id;
        $itemToDelete1  = Appliances::where('appliances_deliveries_id','=',$delivery_id)->delete();
        $itemToDelete2->delete();
        
        $notification = array(
            'message' => 'Data Deleted successfully', 
            'alert-type' => 'success'
        );
    return redirect()->route('appliancesDeliveries.all')->with($notification);

    }
    
}
