<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FurnitureWorkingStocks;

class FurnitureWorkingStocksController extends Controller
{
    public function FurnituresWorkingStocksAll(){
        $furnitures = FurnitureWorkingStocks::latest()->get();

        return view('backend.stocks.furnitureWorkingStocks_all', compact('furnitures'));
    }
}
