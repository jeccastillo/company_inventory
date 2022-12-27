@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Deliveries </h4><br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="example-text-input" class="form-label">Date</label>
                                    <input class="form-control example-date-input" name="date" type="date" id="date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="example-text-input" class="form-label">Reference No</label>
                                    <input class="form-control example-date-input" name="reference" type="text"
                                        id="reference_no">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="supplier_id" class="form-label">Supplier Name </label>
                                    <select id="supplier_id" name="supplier_id" class="form-select select2 " aria-label="Default select example">
                                        <option selected="" value="">Open this select menu</option>
                                        @foreach($supplier as $supp)
                                            <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="example-text-input" class="form-label">Model</label>
                                    <input class="form-control example-date-input" name="product_model" type="text"
                                        id="product_model">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="example-text-input" class="form-label">Serial #</label>
                                    <input class="form-control example-date-input" name="serial_number" type="text"
                                        id="serial_number">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="furnitureStatus" name="furnitureStatus" class="form-select select2" aria-label="Default select example">
                                        <option selected="" value="">Open this select menu</option>
                                        <option value="0">Pristine</option>
                                        <option value="1">Defective</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="example-text-input" class="form-label" style="margin-top:43px;">
                                    </label>
                                    <i
                                        class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                        Add </i>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div><!-- end card-body -->
                </div> <!-- End class-card- -->
                <!--  ---------------------------------- -->

                <div class="card-body">
                    <form method="post" action="{{ route('appliancesDeliveries.store') }}">
                        @csrf
                        <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Product Name / Description </th>
                                    <th>Model </th>
                                    <th>Serial #</th>
                                    <th>Qty.</th>
                                    <th>Unit Price </th>
                                    <th>SRP</th>
                                    <th>Remarks</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="addRow" class="addRow">

                            </tbody>

                            <tbody>
                                <tr>
                                    <td colspan="8"></td>
                                    <td>
                                        <input type="text" name="estimated_amount" value="0" id="estimated_amount"
                                            class="form-control estimated_amount" readonly
                                            style="background-color: #ddd;">
                                    </td>
                                    <td>

                                    </td>
                                </tr>

                            </tbody>
                        </table><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton">Save</button>
                        </div>

                    </form>
                </div> <!-- End card-body -->
            </div> <!-- end col 12 -->
        </div> <!-- end row -->
    </div> <!-- end container fluid -->
</div> <!-- end page content -->





<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{ date }}">
        <input type="hidden" name="reference[]" value="@{{ reference }}">
        <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}"> 
        <input type="hidden" name="brand_id[]" value="@{{ brand_id }}"> 
        <input type="hidden" name="status[]" value="@{{ status }}"> 
    <td>
        <input type="hidden" name="category_id[]" value="@{{ category_id }}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{ product_id }}">
        @{{ product_name }}
    </td>

    <td>
        <input type="hidden" name="product_model[]" value="@{{ product_model }}">
        @{{ product_model }}
    </td>

    <td>
        <input type="hidden" name="serial[]" value="@{{ serial_number }}">
        @{{ serial_number }}
    </td>
     <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="qty[]" value=""> 
    </td>

    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_cost[]" value=""> 
    </td>

    <td>
        <input type="number" class="form-control srp text-right" name="srp[]" value=""> 
    </td>
    
    <td>
        <input type="text" class="form-control" name="remarks[]"> 
    </td>
    
     <td>
        <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
    </td>

     <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>

    </tr>

</script> <!-- end script -->


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".addeventmore", function () { //(onclic,addClass, function())
            var date = $('#date').val();
            //var purchase_no = $('#purchase_no').val();
            var reference = $('#reference_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var brand_id = $('#brand_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            var product_model = $('#product_model').val();
            var serial_number = $('#serial_number').val();
            var status = $('#status').val();

            if (date == '') {
                $.notify("Date is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                }); //(message, {position, className:type})
                return false;
            }
            if (reference == '') {
                $.notify("Reference No. is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }

            if (supplier_id == '') {
                $.notify("Supplier is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (category_id == '') {
                $.notify("Category is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (brand_id == '') {
                $.notify("Brand Name is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (product_id == '') {
                $.notify("Product Name / Description is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (product_model == '') {
                $.notify("Product Model is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }
            if (status == '') {
                $.notify("Product Status is Required", {
                    globalPosition: 'top right',
                    className: 'error'
                });
                return false;
            }


            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date: date, //key : value
                //purchase_no:purchase_no, //key : value
                reference: reference,
                supplier_id: supplier_id, //key : value
                category_id: category_id, //key : value
                product_model: product_model,
                brand_id: brand_id,
                category_name: category_name, //key : value
                product_id: product_id,
                product_name: product_name,
                serial_number: serial_number,
                status: status
            };
            var html = template(data);
            $("#addRow").append(html);
        });

        $(document).on("click", ".removeeventmore", function (event) { //(event,classname, callback function)
            $(this).closest(".delete_add_more_item").remove(); //$(thisDocument).closest(class).remove;
            totalAmountPrice();
        });

        $(document).on('keyup click', '.unit_price,.buying_qty',
    function () { //(event,classname, callback function)
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice 

        function totalAmountPrice() {
            var sum = 0;
            $(".buying_price").each(function () {
                var value = $(this).val();
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }

    });
</script> <!-- end script -->




{{-- <script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
type: "GET",
data:{supplier_id:supplier_id},
success:function(data){
var html = '<option value="">Select Category</option>';
$.each(data,function(key,v){
html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
});
$('#category_id').html(html);
}
})
});
});

</script> --}}


{{-- <script type="text/javascript">
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
type: "GET",
data:{category_id:category_id},
success:function(data){
var html = '<option value="">Select Category</option>';
$.each(data,function(key,v){
html += '<option value=" '+v.id+' "> '+v.name+'</option>';
});
$('#product_id').html(html);
}
})
});
});

</script> --}}





@endsection