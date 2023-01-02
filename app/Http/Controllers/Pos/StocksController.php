<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Appliances;
use App\Models\AppliancesWorkingStocks;

class StocksController extends Controller
{
    public function StocksAll(){

        $workingStocks = Stock::all();
        return view('backend.stocks.stocks_all',compact('workingStocks'));
    }

    public function AppliancesWorkingStocks(){
        $appliancesWorkingStocks = AppliancesWorkingStocks::all();

        return view('backend.stocks.appliancesWorkingStocks_all', compact('appliancesWorkingStocks'));
    }
}
