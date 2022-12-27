@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Product Page </h4><br><br>

                        <form method="post" action="{{ route('productCap.store') }}" id="myForm">
                            @csrf
                            
                                
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-1 form-label">Category Name </label>
                                        <div class="form-group col-sm-11">
                                            <select name="category_id" id="myForm" class="form-select select2" aria-label="Default select example">
                                                <option selected="" value="">Open this select menu</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            
                                

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-1 col-form-label">Product Model</label>
                                    <div class="form-group col-sm-11">
                                        <input name="name" class="form-control myForm" type="text" id="myForm">
                                    </div>
                                </div><!-- end row -->
                            

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Save Product">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_id: {
                    required : true,
                }, 
                name:{
                    required: true,
                }
            },
            messages :{
                category_id: {
                    required : 'Please select category',
                },
                name:{
                    required: 'Please Enter Product Name',
                }
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>




@endsection