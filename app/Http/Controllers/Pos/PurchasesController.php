<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Categories;
use App\Models\Supplier;
use App\Models\Products;
use App\Models\Unit;
use Auth;

class PurchasesController extends Controller
{
    public function PurchasesAll(){
        $purchaseData = Purchase::select('category_id')->groupBy('product_id')->get();

        //$purchaseData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();

        return view('backend.purchases.purchases_all', compact('purchaseData'));
    }// end of function

    public function PurchaseAdd(){
        $supplier = Supplier::all();
        $units = Unit::all();
        $categories = Categories::all();
        $products = Products::all();

        return view('backend.purchases.purchase_add', compact('supplier','units','categories','products'));
    }// end of function

    public function PurchaseStore(Request $request){

        if($request->category_id == null){
            $notification = array(
                'message' => 'No data added', 
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }else{
            $count_category = count($request->category_id); // counts the instance of rows in table

            for($i = 0; $i < $count_category; $i++){
                
                $qty = $request->buying_qty[$i];
                if($qty > 1){                    
                    for($j = 0;$j<$qty;$j++){
                        $purchase = new Purchase();
                        $purchase->date = $request->date[$i];
                        $purchase->purchase_number = $request->purchase_no[$i];
                        $purchase->supplier_id = $request->supplier_id[$i];
                        $purchase->category_id = $request->category_id[$i];
                        $purchase->product_id = $request->product_id[$i];
                        $purchase->buying_qty = '1';
                        $purchase->unit_price = $request->unit_price[$i];
                        $purchase->description = $request->description[$i];
                        $purchase->buying_price = $request->buying_price[$i];
                        $purchase->created_by = Auth::user()->id;
                        $purchase->status = '0';
                        $purchase->save();                                  
                    }                                                         
                }else{
                    
                    $purchase = new Purchase();
                    $purchase->date = $request->date[$i];
                    $purchase->purchase_number = $request->purchase_no[$i];
                    $purchase->supplier_id = $request->supplier_id[$i];
                    $purchase->category_id = $request->category_id[$i];
                    $purchase->product_id = $request->product_id[$i];
                    $purchase->buying_qty = $request->buying_qty[$i];
                    $purchase->unit_price = $request->unit_price[$i];
                    $purchase->description = $request->description[$i];
                    $purchase->buying_price = $request->buying_price[$i];
                    $purchase->created_by = Auth::user()->id;
                    $purchase->status = '0';
                    $purchase->save();
                
                    
                }    
                
        
                                            
            }//end for loop
            $notification = array(
                    'message' => 'Data saved successfully', 
                    'alert-type' => 'success'
                );
            return redirect()->route('purchases.all')->with($notification);
        } // end else

        
    }// end of function

    public function PurchaseDelete($id){
        Purchase::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Data deleted successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('purchases.all')->with($notification);
    } // end of function

    public function PurchasePending(){
        $pendingPurchases = Purchase::orderBy('date','desc')
                            ->orderBy('id','desc')
                            ->where('status','0')
                            ->get();

        return view('backend.purchases.purchases_pending', compact('pendingPurchases'));

    }// end of function

    public function PurchaseApprove($id){

        $approvedPurchase = Purchase::findOrFail($id);
        $product = Products::where('id', $approvedPurchase->product_id)->first();
        $purchaseQty = ((float)($approvedPurchase->buying_qty))+((float)($product->quantity));

        $product->quantity = $purchaseQty;

        if($product->save()){
            $approvedPurchase->update([
                'status' => '1'
            ]);

            $notification = array(
                'message' => 'Purchase Approved successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('purchases.all')->with($notification);
        }

        


        
    }
}
