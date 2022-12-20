@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Purchase Page </h4><br><br>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="purchaseDate" class="form-label">Date</label>
                                    <input class="form-control example-date-input" type="date" value="" name="date"
                                        id="purchaseDate">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="purchaseDate" class="form-label">Purchase No.</label>
                                    <input class="form-control example-date-input" type="text" value="" name="purchase_number"
                                        id="purchaseNumber">
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4 ">
                                <div class="md-3">
                                    <label class="form-label">Supplier Name</label>
                                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                                        <option selected="" value="">select supplier</option>
                                        @foreach($suppliers as $key => $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="md-3">
                                    <label class="form-label">Category Name</label>
                                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                                        <option selected="" value="">select category</option>
                                        @foreach($categories as $key => $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="md-3">
                                    <label class="form-label">Product Name</label>
                                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                                        <option selected="" value="">select product</option>
                                        @foreach($products as $key => $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="purchaseDate" class="form-label" style="margin-top:43px;"></label>
                                    <input type="submit" class="btn btn-dark btn-rounded waves-effect waves-light" value="Add More">
                                </div>
                            </div>

                        </div> <!--end row-->
                    </div> <!--end card body-->
         <!-------------------------------------------------------------------------> 
         
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Pcs</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">

                            </tbody>
                            <tbody>
                                <td colspan="5"></td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" style="background-color: #ddd;" readonly>
                                    <td></td>
                                </td>
                            </tbody>
                        </table><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton">Save Purchase</button>
                        </div>
                    </form>
                </div><!--end card body-->

                </div><!--end card -->
            </div> <!-- end col -->
        </div> <!--end row-->



    </div>
</div>


    




@endsection