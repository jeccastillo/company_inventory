@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Furniture Deliveries Page</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   

                    <h4 class="card-title">Furniture Deliveries Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Ref No.</th>                                                          
                            <th>Supplier</th>                             
                            <th>Model</th>                            
                            <th>Qty</th>
                            <th>Unit Cost</th>                            
                            <th>GDP/SRP</th>
                            <th>TOTAL GDP</th>
                            <th>STATUS</th>                                                                                                                                              
                        </thead>


                        <tbody>

                        	@foreach($furnitures as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> 
                                <ol>
                                    @forelse($item->getDr as $dr)                                    
                                            <li>{{$dr['date_in']}}</li> 
                                    @empty
                                        <p>no data</p>                                           
                                    @endforelse   
                                </ol>  
                            </td>
                            <td> 
                                <ol>
                                    @foreach($item->getDr as $dr)                                    
                                            <li>{{$dr['reference_name']}}</li>                                            
                                    @endforeach   
                                </ol> 
                            </td>                              
                            <td> {{ $item['getSupplier']['name']}} </td>    <!--$product['eloquent function name'][fieldName from related table]   -->                                                   
                            <td> {{ $item['getProduct']['product_model']}} </td>                                                           
                            <td> {{ $item->qty}} </td>                                    
                            <td> {{ $item->unit_cost}}</td>   
                            <td> {{ $item->srp}}</td> 
                            <td> {{ $item->qty * $item->srp}}</td>
                            <td>
                                @if($item->status == '0')
                                    <span class="btn btn-success" title="Prestine" ><i class="fas fa-check-circle" title="Prestine" onClick="myFunction()"></i></span> 
                                @elseif($item->status == '1')
                                <span class="btn btn-success">Approved</span>
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