<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\furnitureProducts;
use App\MOdels\furnitureSuppliers;
use App\MOdels\FurnitureCategories;

class furnitureProductsController extends Controller
{
    public function FurnitureProductsAll(){
        $furnitures = furnitureProducts::latest()->get();

        return view('backend.furnitureProducts.furnitureProducts_all', compact('furnitures'));
        
    }//end FurnitureProductsAll

    public function FurnitureProductsAdd(){
        $suppliers  = furnitureSuppliers::all();
        $categories = FurnitureCategories::all();
        return view('backend.furnitureProducts.furnitureProducts_add', compact('suppliers','categories'));
    }// end FurnitureProductsAdd

    public function FurnitureProductsStore(Request $request){
        $duplicate = furnitureProducts::where('product_model',$request->name)->exists();
        
        if($duplicate){
            $notification = array(
                'message'       => 'Existing Product!', 
                'alert-type'    => 'error',
            );

            return back()->with($notification);
        }else{
            try{
                furnitureProducts::insert([
                    'supplier_id'   => $request->supplier_id,
                    'category_id'   => $request->category_id,
                    'product_model' => $request->name,
                    'description'   => $request->description,
                    'created_by'    => Auth::user()->id,
                    'created_at'    => Carbon::now(),
                ]);
    
                $notification = array(
                    'message' => 'New Product Created successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->route('furnitureProducts.all')->with($notification);
    
            }catch(\Exception $e){
                //dd($e);
                $notification = array(
                    'message' => 'Something went wrong!', 
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }

        }// end if else       
    }//end of FurnitureProductsStore
}
