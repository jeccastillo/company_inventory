@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Purchases</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    {{-- <a href="{{route('purchase.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Purchase </a> <br>  <br>                --}}

                    <h4 class="card-title">Appliances Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                            <th>Remarks</th>
                            

                        </thead>


                        <tbody>

                        	@foreach($appliances as $key => $stock)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $stock->supplier}} </td>                              
                            <td> {{ $stock->product_brand}} </td>    <!--$product['eloquent function name'][fieldName from related table]   -->
                            <td> {{ $stock->product_description}} </td>
                            <td> {{ $stock->product_model}} </td>
                            <td> {{ $stock->serial_number}} </td>
                            <td> {{ $stock->qty}} </td>
                            <td> {{ $stock->unit_cost}} </td>
                            <td> {{ $stock->srp}} </td>
                            <td> {{ $stock->date_in}} </td>
                            <td> {{ $stock->date_out}} </td>
                            <td> {{ $stock->reference_in}} </td>
                            <td> {{ $stock->reference_out}} </td>
                            <td> {{ $stock->remarks}} </td>
                            
                            
                            {{-- <td>
                                <a href="" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                
                                <a href="" class="btn btn-danger sm " title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                           
                            </td> --}}

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection