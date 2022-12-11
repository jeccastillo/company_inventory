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

                    <h4 class="card-title">Purchases Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product name</th> 
                            <th>Model</th>                             
                            <th>Color</th> 
                            <th>Qty</th>
                            <th>Unit Cost</th>
                            <th>SRP</th>
                            <th>Total GDP</th> 
                            

                        </thead>


                        <tbody>

                        	@foreach($workingStocks as $key => $stock)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $stock->product_id}} </td>
                            <td> {{ $stock->model }} </td>  
                            <td> {{ $stock->color}} </td>    <!--$product['eloquent function name'][fieldName from related table]   -->
                            <td> {{ $stock->qty}} </td>
                            <td> {{ $stock->unit_cost}} </td>                                                                  
                            <td> <span class="btn btn-warning">Pending</span> </td> 
                            
                            <td>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                
                                <a href="{{route('product.delete',$product->id)}} " class="btn btn-danger sm " title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                           
                            </td>

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