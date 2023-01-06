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
use App\Models\FurnitureWorkingStocks;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;

class FurnituresDeliveriesController extends Controller
{
    public function FurnitureDeliveriesAll(){
        
        $furnitureDeliveries = furnituresDeliveries::latest()->get();                             
        return view('backend.furnituresDeliveries.furnituresDeliveries_all', compact('furnitureDeliveries'));
    }// end of FurnitureDeliveriesAll

    public function FurnitureDeliveriesAdd(){
        $suppliers = furnitureSuppliers::all();
        $products = furnitureProducts::all();
        $categories = FurnitureCategories::all();

        return view('backend.furnituresDeliveries.furnitureDeliveries_add', compact('suppliers','products','categories'));
    } //end FurnitureDeliveriesAdd

    public function FurnitureDeliveriesStore(Request $request){
        
        
        
        
        DB::beginTransaction();
        try{
            if($request->category_id == null){
                $notification = array(
                    'message' => 'No data Added', 
                    'alert-type' => 'error'
                );
    
                return redirect()->back()->with($notification);
            }else{
                $count_category = count($request->category_id);
                $addQty = false;
                for($a = 0; $a < $count_category; $a++){
                    $checkName = FurnitureWorkingStocks::where('product_model_id',$request->product_model_id[$a])->exists();
                    if($checkName > 0){
                        $addQty = true;
                        break;
                    }                                
                }
                if($addQty){
                    for($i = 0; $i < $count_category; $i++){ 
                        
                        $deliveries = new furnituresDeliveries();
                        
                        $deliveries->date_in            = $request->date_in[$i];
                        $deliveries->category_id        = $request->category_id[$i];
                        $deliveries->supplier_id        = $request->supplier_id[$i];
                        $deliveries->product_model_id   = $request->product_model_id[$i];
                        $deliveries->qty                = $request->qty[$i];
                        $deliveries->unit_cost          = $request->unit_cost[$i];
                        $deliveries->srp                = $request->srp[$i];
                        $deliveries->reference_name     = $request->reference_name[$i];
                        $deliveries->status             = $request->status[$i];
                        $deliveries->remarks            = $request->remarks[$i];
                        $deliveries->created_by         = Auth::user()->id;
                        $deliveries->created_at         = Carbon::now();
                        $deliveries->save();

                        $id = $request->product_model_id[$i]; 
                        //$dr_id = furnituresDeliveries::orderBy('id','DESC')->first();
                        $product =  FurnitureWorkingStocks::where('product_model_id', $id)->first();

                        FurnitureWorkingStocks::findOrFail($id)->update([
                            'qty' => $product->qty + $request->qty[$i],
                            'updated_by' => Auth::user()->id,
                            'updated_at' => Carbon::now(),
                        ]);
                                     
                        // $furniture->qty                 = $furniture->qty + $request->qty[$i]; 
                        // $furniture->updated_by          = Auth::user()->id;
                        // $furniture->updated_at          = Carbon::now();                                               
                        // $furniture->save();
                    }
                }else{
                    for($i = 0; $i < $count_category; $i++){
                        $deliveries = new furnituresDeliveries();
    
                        $deliveries->date_in            = $request->date_in[$i];
                        $deliveries->category_id        = $request->category_id[$i];
                        $deliveries->supplier_id        = $request->supplier_id[$i];
                        $deliveries->product_model_id   = $request->product_model_id[$i];
                        $deliveries->qty                = $request->qty[$i];
                        $deliveries->unit_cost          = $request->unit_cost[$i];
                        $deliveries->srp                = $request->srp[$i];
                        $deliveries->reference_name     = $request->reference_name[$i];
                        $deliveries->status             = $request->status[$i];
                        $deliveries->remarks            = $request->remarks[$i];
                        $deliveries->created_by         = Auth::user()->id;
                        $deliveries->created_at         = Carbon::now();
                        $deliveries->save();

                        //$dr_id = furnituresDeliveries::orderBy('id','DESC')->first();
                        $furniture = new FurnitureWorkingStocks();

                        $furniture->product_model_id    = $request->product_model_id[$i];
                        $furniture->supplier_id         = $request->supplier_id[$i];
                        $furniture->category_id         = $request->category_id[$i];                        
                        $furniture->qty                 = $request->qty[$i];
                        $furniture->unit_cost           = $request->unit_cost[$i];
                        $furniture->srp                 = $request->srp[$i];                       
                        $furniture->created_by          = Auth::user()->id;
                        $furniture->created_at          = Carbon::now();
                        $furniture->save();
                    }
                }// end if else addQty              
            }// end if else $request->category_id
        }catch(\Exception $e){
            //dd($e);
            $notification = array(
                'message' => 'Something Went Wrong!', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        
        DB::commit();
        $notification = array(
            'message' => 'Data saved successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('furnitureDeliveries.all')->with($notification);    
    }// end FurnitureDeliveriesStore
}
