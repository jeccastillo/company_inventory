<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Appliances;

class StocksController extends Controller
{
    public function StocksAll(){

        $workingStocks = Stock::all();
        return view('backend.stocks.stocks_all',compact('workingStocks'));
    }

    public function StockAppliancesAll(){
        $appliances = Appliances::all();

        return view('backend.stocks.stockAppliances_all', compact('appliances'));
    }
}
