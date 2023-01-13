<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AppliancesSales; 
use App\Models\FurnitureSales;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class CustomerController extends Controller
{    
    public function customerData(){       
        $data = Auth::user();        
        $data = new UserResource($data);
        
        return response()->json($data, 200);
    }
    
   



}
 