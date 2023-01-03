@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

                        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Appliances</h4>
                </div>
            </div>
        </div>
                        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Appliances Inventory </h4>
                        <table id="datatable" class="table table-bordered dt-responsive  text-break" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Supplier</th>                             
                                    <th>Brand</th>                             
                                    <th>Description</th> 
                                    <th>Model</th>
                                    <th>Serial #</th>
                                    <th>Qty</th>
                                    <th>Unit Cost</th> 
                                    <th>SRP</th>
                                    <th>Date-in</th>
                                    <th>Date-out</th>                             
                                    <th>Ref in</th> 
                                    <th>Ref out</th> 
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    
                                </tr>
                            </thead>


                            <tbody id="example">
                                @foreach($appliancesWorkingStocks as $key => $stock)
                                    <tr>
                                        {{$stat = $stock->status;}}
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $stock['getSupplier']['name']}} </td>                              
                                        <td> {{ $stock['getBrand']['name']}} </td>    <!--$product['eloquent function name'][fieldName from related table]   -->
                                        <td> {{ $stock['getProduct']['description']}} </td>
                                        <td> {{ $stock['getProduct']['product_model']}} </td>
                                        <td title="{{$stock['getSerial']['name']}}" >{{substr($stock['getSerial']['name'],0,4)."..."}}</td>
                                        <td> {{ $stock->qty}} </td>
                                        <td> {{ $stock->unit_cost}} </td>
                                        <td> {{ $stock->srp}} </td>
                                        <td> {{ $stock->date_in}} </td>
                                        <td> {{ $stock->date_out}} </td>
                                        <td> {{ $stock['getDr']['reference'] }}</td>
                                        <td> {{ $stock->reference_out}} </td>
                                        <td title="{{$stat == 0 ? 'Prestine':'Defective'}}">
                                            @if($stat == '0')
                                                <span class="btn btn-success" title="Prestine" ><i class="fas fa-check-circle" title="Prestine" onClick="myFunction()"></i></span> 
                                            @elseif($stat == '1')
                                                <span class="btn btn-danger">X</span>
                                            @endif</td>
                                        <td> {{ $stock->remarks}} </td>                                                                                                            
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body -->
                </div> <!-- end card  -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div> <!-- end page-content -->

@endsection