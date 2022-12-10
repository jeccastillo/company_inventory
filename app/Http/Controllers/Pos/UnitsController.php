<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;


class UnitsController extends Controller
{
    public function UnitsAll(){
        $units = Unit::latest()->get();

        return view('backend.units.units_all', compact('units'));
    }// end of function

    public function UnitAdd(){

        return view('backend.units.unit_add');
    }

    public function UnitStore(Request $request){

        Unit::insert([
            'name'=>$request->name,
            'created_by'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Created Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('units.all')->with($notification);
    }//end of function

    public function UnitEdit($id){

        $unitToEdit = Unit::findOrFail($id);

        return view('backend.units.unit_edit', compact('unitToEdit'));
    }// end of function

    public function UnitUpdate(Request $request){
        
        $unitName = Unit::findOrFail($request->id)->update([
            'name'=>$request->name,
            'updated_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('units.all')->with($notification);

    }//end of function

    public function UnitDelete($id){
        try{
            Unit::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Unit Deleted Successfully', 
                'alert-type' => 'success'
            );
        }catch(QueryException $e){
            $notification = array(
                'message' => 'Deletion Failed', 
                'alert-type' => 'error'
            );
        }
        

        return redirect()->route('units.all')->with($notification);
    }
}
