 <div class="vertical-menu" style="width: 250px">

     <div data-simplebar class="h-100">

         <!-- User details -->


         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ url('/dashboard') }}" class="waves-effect">
                         <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <!-- ____________TO IMPLEMENT ___________________________-->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('users.all') }}>All Users</a></li>
                    </ul>
                </li><!-- end Manage Users -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Categories</span>
                    </a>
                    {{-- <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('categories.all') }}>All Categories</a></li>
                    </ul> --}}
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{route('appliancesCategories.all')}}>Appliances</a></li>
                    </ul>
                    {{-- <ul class="sub-menu" aria-expanded="false">
                        <li><a href='' >Furnitures</a></li>
                    </ul> --}}
                </li><!-- end Manage Categories -->
                
                
                <!-- ____________TO IMPLEMENT ___________________________-->
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Suppliers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href={{ route('supplier.all') }}>All Suppliers</a></li>
                     </ul>
                 </li>
                 <!-- end Manage Suppliers -->

                 {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('customers.all') }}>All Customers</a></li>
                    </ul>
                </li> --}}
                <!-- end Manage Customers -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Brands</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('brands.all') }}>All Brands</a></li>
                    </ul>
                </li>
                <!-- end Manage Brands -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('appliancesProducts.all') }}>Appliances</a></li>
                    </ul>
                </li><!-- end Manage Products -->
                
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Units</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('units.all') }}>All Units</a></li>
                    </ul>
                </li> --}}
                <!-- end Manage Units -->

               

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('products.all') }}>All Products</a></li>
                    </ul>
                </li> --}}
                <!-- end Manage Products -->

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Purchases</span>
                    </a>
                    
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href={{ route('purchases.all') }}>All Purchases</a></li>
                        </ul>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href={{ route('purchases.pending') }}>Approval Purchases</a></li>
                        </ul>                    
                </li> --}}
                 <!-- ____________TO IMPLEMENT ___________________________-->
                 {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Stock Transfers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('purchases.all') }}>All Purchases</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Deliveries</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('purchases.all') }}>All Purchases</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Inbound Stocks</span>
                    </a>                       
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('appliancesDeliveries.all')}}">Appliances Deliveries</a></li>
                    </ul> 
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('furnitureDeliveries.all')}}">Furniture Deliveries</a></li>
                    </ul>                 
                </li><!-- end list -->
                <!-- to implement -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Outbound Stocks</span>
                    </a>                       
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('appliancesSales.all')}}">Appliances Sales</a></li>
                    </ul>                  
                </li><!-- end list -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Manage Working Stocks</span>
                    </a>

                    {{-- <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('stocks.all') }}>All Stocks</a></li>
                    </ul> --}}
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('stockAppliances.all') }}>Appliances</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('furnitures.all') }}>Furnitures</a></li>
                    </ul>
                </li> 
                <!-- ____________TO IMPLEMENT ___________________________-->
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Test Category</span>
                    </a>                       
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('testCategory.all')}}">testCategory all</a></li>
                    </ul>                  
                </li><!-- end list --> --}}
                 

                 <li class="menu-title">Pages</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-account-circle-line"></i>
                         <span>Authentication</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="auth-login.html">Login</a></li>
                         <li><a href="auth-register.html">Register</a></li>
                         <li><a href="auth-recoverpw.html">Recover Password</a></li>
                         <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                     </ul>
                 </li>
                 

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-profile-line"></i>
                         <span>Utility</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="pages-starter.html">Starter Page</a></li>
                         <li><a href="pages-timeline.html">Timeline</a></li>
                         <li><a href="pages-directory.html">Directory</a></li>
                         <li><a href="pages-invoice.html">Invoice</a></li>
                         <li><a href="pages-404.html">Error 404</a></li>
                         <li><a href="pages-500.html">Error 500</a></li>
                     </ul>
                 </li>






             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>