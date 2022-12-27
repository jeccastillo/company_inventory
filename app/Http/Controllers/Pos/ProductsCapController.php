<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsCap;
use App\Models\Categories;
use Auth;
use Illuminate\Support\Carbon;

class ProductsCapController extends Controller
{
    public function ProductsCapAll(){
        $productsCap = ProductsCap::all();
        
        return view('backend.productsCap.productsCap_all', compact('productsCap'));
    }// end of function

    public function ProductsCapAdd(){
        $categories = Categories::all();
        return view('backend.productsCap.productsCap_add', compact('categories'));
    }//end of function

    public function ProductCapStore(Request $request){
        $category = Categories::findOrFail($request->category_id);
        $category->getProducts()->create([
            'name'          => $request->name,
            'category_id'   => $request->category_id,
            'created_by'    => Auth::user()->id,
            'created_at'    => Carbon::now(),
        ]);
        // ProductsCap::insert([
        //     'name'          => $request->name,
        //     'created_by'    => Auth::user()->id,
        //     'created_at'    => Carbon::now(),
        // ]);

        $notification = array(
            'message' => 'Product Created Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('productsCap.all')->with($notification);
    }//end of function

    public function ProductCapEdit($id){
        $productEdit = ProductsCap::findOrFail($id);

        return view('backend.productsCap.productsCap_edit', compact('productEdit'));
        
    }//end of function

    public function ProductCapUpdate(Request $request){
        ProductsCap::findOrFail($request->id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),           
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('productsCap.all')->with($notification);
    }//end of function

    public function ProductCapDelete($id){
        ProductsCap::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('productsCap.all')->with($notification);
    }
}
