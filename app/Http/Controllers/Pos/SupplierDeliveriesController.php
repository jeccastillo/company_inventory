<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierDeliveries;

class SupplierDeliveriesController extends Controller
{
    public function SupplierDeliveriesAll(){
        $deliveries = SupplierDeliveries::all();

        return view('backend.supplierDeliveries.supplierDeliveries_all', compact('deliveries'));
    }
}
