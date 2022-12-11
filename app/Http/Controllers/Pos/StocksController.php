<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class StocksController extends Controller
{
    public function StocksAll(){

        $workingStocks = Stock::all();
        return view('backend.stocks.stocks_all',compact('workingStocks'));
    }
}
