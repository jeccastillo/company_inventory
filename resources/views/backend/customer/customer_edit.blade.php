@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Customer Page </h4><br><br>

                        <form method="post" action="{{ route('customer.update') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <input name="id" type="hidden" value="{{$customerToEdit->id}}">
                            <!-- end hidden id -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" id="supplierName" value="{{$customerToEdit->name}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile
                                    No.</label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" class="form-control" type="number" id="mobileNum" value="{{$customerToEdit->mobile_no}}">
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email</label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email" id="emailAdd" value="{{$customerToEdit->email}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                                <div class="form-group col-sm-10">
                                    <input name="address" class="form-control" type="text" id="supplierAdd" value="{{$customerToEdit->address}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image</label>
                                <div class="form-group col-sm-10">
                                    <input name="customer_image" class="form-control" type="file" id="image" >
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg"
                                        src="{{url($customerToEdit->customer_image) }}"
                                        alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->




                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Save Info">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                },
                email: {
                    required: true,
                },
                address: {
                    required: true,
                },
                
            },
            messages: {
                name: {
                    required: 'Please Enter Name',
                },
                mobileNo: {
                    required: 'Please Enter Mobile Number',
                },
                email: {
                    required: 'Please Enter Email',
                },
                address: {
                    required: 'Please Enter Address',
                },
                
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script> <!-- end script -->

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script> <!-- end script -->




@endsection