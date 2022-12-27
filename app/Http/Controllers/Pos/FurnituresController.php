<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Furnitures;

class FurnituresController extends Controller
{
    public function FurnituresAll(){
        $furnitures = Furnitures::latest()->get();

        return view('backend.stocks.furnitures_all', compact('furnitures'));
    }
}
