@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Appliances Sold</p>
                                <h4 class="mb-2">500</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Furniture Sales</p>
                                <h4 class="mb-2">400</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Defective Appliances</p>
                                <h4 class="mb-2">15</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Defective Furnitures</p>
                                <h4 class="mb-2">25</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">


            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="card-title mb-4">Appliances Best Sellers</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product Model </th>
                                            <th>Supplier</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Description </th>
                                            <th style="width: 120px;">Qty Sold</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">MF-5000V</h6>                                                
                                            </td>
                                            <td>SUNTOUCH</td>
                                            <td>
                                                TELEVISION
                                            </td>
                                            <td>
                                                XTREME
                                            </td>
                                            <td>
                                                TELEVISION
                                            </td>
                                            <td>25</td>
                                        </tr> <!-- end tr-->
                                       
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">JSD-801</h6>                                                
                                            </td>
                                            <td>EXATECH</td>
                                            <td>
                                                WASHING MACHINE
                                            </td>
                                            <td>
                                                FUJIDENZO
                                            </td>
                                            <td>
                                                WASHING MACHINE
                                            </td>
                                            <td>24</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">SB-280AG</h6>                                                
                                            </td>
                                            <td>STANDARD</td>
                                            
                                            <td>
                                                GAS RANGE
                                            </td>
                                            <td>
                                                STANDARD
                                            </td>
                                            <td>
                                                GAS RANGE
                                            </td>
                                            <td>22</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">XH-RCDRUM5BLUE</h6>  
                                                                                              
                                            </td>
                                            <td>SUNTOUCH</td>
                                            <td>
                                                RICE COOKER
                                            </td>
                                            <td>
                                                XTREME
                                            </td>
                                            <td>
                                                RICE COOKER
                                            </td>
                                            <td>20</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">MF-5000V</h6>                                                
                                            </td>
                                            <td>Web Developer</td>
                                            <td>
                                                SUNTOUCH
                                            </td>
                                            <td>
                                                XTREME
                                            </td>
                                            <td>
                                                TELEVISION
                                            </td>
                                            <td>18</td>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">OSF-16 (EG1)</h6>  
                                                                                              
                                            </td>
                                            <td>OROFAN</td>
                                            
                                            <td>
                                                OROFAN 
                                            </td>
                                            <td>
                                                OROFAN
                                            </td>
                                            <td>
                                                ELECTRIC FAN
                                            </td>
                                            <td>15</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">WAM-632IGT</h6>                                                                                                
                                            </td>
                                            <td>SUNTOUCH</td>
                                            
                                            
                                            <td>
                                                AIRCON
                                            </td>
                                            <td>
                                                FUJIDENZO
                                            </td>
                                            <td>
                                                AIRCON
                                            </td>
                                            <td>14</td>
                                        </tr>
                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div><!-- end of table -->
                            
                            <h4 class="card-title mb-4">Furnitures Best Sellers</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <tr>
                                                <th>Product Model </th>
                                                <th>Supplier</th>
                                                <th>Category</th>                                                
                                                <th>Description </th>
                                                <th style="width: 120px;">Qty Sold</th>
                                            </tr>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">UF 4X36X75</h6>                                                                                                                                                
                                            </td>
                                            <td>POLY FOAM</td>
                                            <td>
                                                FOAM
                                            </td>                                            
                                            <td>
                                                FOAM
                                            </td>
                                            <td>30</td>
                                        </tr> <!-- end tr-->
                                       
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">UF 4X48X75</h6>
                                                                                                
                                            </td>
                                            <td>POLY FOAM</td>
                                            <td>
                                                FOAM
                                            </td>                                            
                                            <td>
                                                FOAM
                                            </td>
                                            
                                            <td>25</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">COMPUTER TABLE</h6>
                                                                                                
                                            </td>
                                            <td>MEGABOOM</td>
                                            <td>
                                                CENTER TABLE
                                            </td>
                                            <td>
                                                CENTER TABLE
                                            </td>
                                            
                                            <td>23</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">STARTER 4S</h6>
                                                                                                
                                            </td>
                                            <td>MEGABOOM</td>
                                            <td>
                                                DINNING SET
                                            </td>
                                            <td>
                                                DINNING SET
                                            </td>
                                            
                                            <td>24</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">STOOL L 24'</h6>
                                                                                                
                                            </td>
                                            <td>PJC</td>
                                            <td>
                                                STOOL
                                            </td>
                                            <td>
                                                STOOL
                                            </td>
                                            
                                            <td>22</td>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">RUBY PILLOWS</h6>
                                                                                                
                                            </td>
                                            <td>PJC</td>
                                            <td>
                                                PILLOWS
                                            </td>
                                            <td>
                                                PILLOWS
                                            </td>
                                            
                                            <td>21</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">JAMAICA 311 SS</h6> 
                                                                                                
                                            </td>
                                            <td>PJC</td>
                                            <td>
                                                SOFA SET
                                            </td>
                                            <td>
                                                SOFA SET
                                            </td>
                                            
                                            <td>10</td>
                                        </tr>
                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>

    </div>

    @endsection