<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Unit;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;

class ProductsController extends Controller
{
    public function ProductsAll(){
        $products   = Products::latest()->get();

        return view('backend.products.product_all', compact('products'));
    }// end of function

    public function ProductAdd(){
        $categories = Categories::all();
        $units      = Unit::all();
        $suppliers  = Supplier::all();


        return view('backend.products.product_add', compact('categories','units','suppliers'));
    }// end of function

    public function ProductStore(Request $request){
        
        Products::insert([
            'name'          =>$request->name,
            'supplier_id'   =>$request->supplier_id,
            'unit_id'       =>$request->unit_id,
            'category_id'   =>$request->category_id,
            'quantity'      =>'0',
            'created_by'    =>Auth::user()->id,
            'created_at'    =>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Created Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('products.all')->with($notification);
    }// end of function

    public function ProductEdit($id){
        $suppliers  = Supplier::all();
        $units      = Unit::all();
        $categories = Categories::all();
        $product    = Products::findOrFail($id);

        return view('backend.products.product_edit', compact('suppliers','units','categories','product'));

    }// end of function

    public function ProductUpdate(Request $request){
        $product_id = $request->id;

        Products::findOrFail($product_id)->update([
            'name'      => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id'   => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('products.all')->with($notification);

    }// end of function

    public function ProductDelete($id){
        Products::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('products.all')->with($notification);

    }

}
