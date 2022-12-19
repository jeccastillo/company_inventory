<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function UsersAll(){

        $users = User::latest()->get();

        return view('backend.users.users_all', compact('users'));
    }//end of function

    public function UserAdd(){
    
        
         return view('backend.users.user_add');
    }
    

    public function UserStore(Request $request){
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
 
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;   
            
            User::insert([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
                'profile_image' => $data['profile_image'],
                'created_by' => Auth::user()->id,            
                'created_at' => Carbon::now()            
            ]);
         }else{
            User::insert([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,                
                'created_by' => Auth::user()->id,            
                'created_at' => Carbon::now()            
            ]);
         }
                                          
        $notification = array(
            'message' => 'Successfully Registered New User', 
            'alert-type' => 'success'
        );

        return redirect()->route('users.all')->with($notification);

    }// End Method

    public function UserDelete($id){
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Successfully Deleted User', 
            'alert-type' => 'success'
        );

        return redirect()->route('users.all')->with($notification);
    }// end Method

    public function UserEdit($id){
        $existingUser = User::findOrFail($id);

        return view('backend.users.user_edit', compact('existingUser'));
    }// end Method

    public function UserUpdate(Request $request){
       $userId = $request->id;
        
    //    echo $request->name;
    //    echo "<br>";
    //    echo $request->mobile_no;
    //    echo "<br>";
    //    echo $request->email;
    //    echo "<br>";
    //    echo $request->username;
    //    echo "<br>";
    //    echo $request->role;
    //    echo "<br>";
       if ($request->file('profile_image')) {
        $file = $request->file('profile_image');

        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);
        $data['profile_image'] = $filename;   
        
        User::findorFail($userId)->update([
            // 'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'username' => $request->username,            
            'role' => $request->role,
            // 'profile_image' => $data['profile_image'],                   
            // 'updated_at' => Carbon::now()            
        ]);
     }else{
        User::findorFail($userId)->update([
            // 'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'username' => $request->username,            
            'role' => $request->role,                               
            // 'updated_at' => Carbon::now()            
        ]);
     }
     $notification = array(
        'message' => 'Successfully Updated User', 
        'alert-type' => 'success'
    );
    echo $request->role;
    // return redirect()->route('users.all')->with($notification);
    }
}


