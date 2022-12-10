<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;
use Image;

class CustomerController extends Controller
{
    public function CustomersAll(){
        try {
            // Validate the value...
            $customers = Customer::latest()->get();

            return view('backend.customer.customer_all', compact('customers'));
        } catch (Throwable $e) {
            report($e);
            
            return false;
        }
        
    }// end of function

    public function CustomersAdd(){
        
        return view('backend.customer.customer_add');
    }

    public function CustomerStore(Request $request){
        $image = $request->file('customer_image');
        $name_gen= hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // jpg/png

        Image::make($image)->resize(100,100)->save('upload/customer'.$name_gen);

        $save_url = 'upload/customer'.$name_gen;

        Customer::insert([
            'name'=>$request->name,     // databaseName=>userData
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'address'=>$request->address,
            'customer_image'=>$save_url,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customers.all')->with($notification);
    }// end of function

    public function CustomerDelete($id){
        
        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customers.all')->with($notification);
    }// end of function

    public function CustomerEdit($id){
        $customerToEdit = Customer::findOrFail($id);
        
        
        
        return view('backend.customer.customer_edit', compact('customerToEdit'));
    }//end of function

    public function CustomerUpdate(Request $request){
        $customer_id = $request->id;

        if($request->file('customer_image')){
            //image file handling
            $image = $request->file('customer_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();// get image extension

            //image intervention
            Image::make($image)->resize(100,100)->save('upload/customer/'.$name_gen);
            

            $save_url= 'upload/customer/'.$name_gen;

            //query
            Customer::findOrFail($customer_id)->update([

                'name'=>$request->name,     // databaseName=>userData
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,
                'customer_image'=>$save_url,
                'updated_by'=>Auth::user()->id,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('customers.all')->with($notification);
        }else{
            Customer::findOrFail($customer_id)->update([

                'name'=>$request->name,     // databaseName=>userData
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,                
                'updated_by'=>Auth::user()->id,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('customers.all')->with($notification);
        }//end else

    }//end of function
}
