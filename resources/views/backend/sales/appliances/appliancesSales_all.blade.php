@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Appliances Sales Page</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{route('appliancesSales.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Sales </a> <br>  <br>               

                    <h4 class="card-title">Appliances Sales Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>      
                            <th>Ref No.</th>
                            <th>Product Name / Desc</th>                                                      
                            <th>Supplier</th> 
                            <th>Category</th>
                            <th>Brand</th>                            
                            <th>Model</th>
                            <th>Serial #</th>
                            <th>Qty</th>
                            <th>Unit Cost</th> 
                            <th>Remarks</th>                           
                            <th>Payment</th>                                                                                                             
                            <th>Action</th>                                                                
                        
                            

                        </thead>


                        <tbody>

                        	@foreach($appliancesSales as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->date_out }} </td> 
                            <td> {{ $item->reference_out}} </td> 
                            <td> {{ $item['product']['name']}} </td>            
                            <td> {{ $item['supplier']['name']}} </td>    <!--$product['eloquent function name'][fieldName from related table]   -->
                            <td> {{ $item['category']['name']}} </td>
                            <td> {{ $item['brand']['name']}} </td>                            
                            
                            <td> {{ $item->product_model}} </td>  
                            <td> {{ $item->serial_number}} </td>  
                            <td> {{ $item->qty}} </td>                                    
                            <td> {{ $item->unit_cost}}</td>
                            <td> {{ $item->remarks}} </td>
                            
                                
                            <td>
                                @if($item->mode_of_payment == '0')
                                <span class="btn btn-info">Credit</span>
                                @elseif($item->status == '1')
                                <span class="btn btn-success">Cash</span>
                                @endif
                            </td> 
                            
                            <td> 
                                @if(Auth::user()->id == 1) <!-- 1=admin 0=user -->                                                                                           
                                    <a href="{{route('appliancesDeliveries.delete',$item->id)}}" class="btn btn-danger sm " title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>                                                               
                                @endif
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
                <script>
                    function myFunction() {
                      alert("Prestine");
                    }
                </script>

@endsection