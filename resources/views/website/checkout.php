<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Frontpage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="webtheme/assets/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.2/sweetalert2.min.css"
        integrity="sha512-5aabpGaXyIfdaHgByM7ZCtgSoqg51OAt8XWR2FHr/wZpTCea7ByokXbMX2WSvosioKvCfAGDQLlGDzuU6Nm37Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="webtheme/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div id="vue-container">
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="#!">Start Bootstrap</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Welcome {{ user.name }}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->           
            <!-- Features section-->
            <section class="py-5 border-bottom" id="features">
                <div class="container px-5 my-5">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>                                                                                                                   
                        </thead>
                        <tbody>                     
                            <tr v-for="item in user.cart">
                                <td>{{item.product.product_model}}</td>
                                <td>{{item.product.description}}</td>
                                <td>{{item.product.price}}</td>
                                <td><button @click="removeFromCart(item.product.id)">Remove</button></td>
                            </tr>                        
                        </tbody>
                    </table>
                </div>
                <div class="container px-5 my-5">
                    <a class="btn btn-primary" href="/payment">
                        Pay Now
                    </a>
                </div>
            </section>
            <!-- Pricing section-->
           
            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
            </footer>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->        
        <script src="webtheme/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                
            
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
            integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>


        <script>
            new Vue({
                el: '#vue-container',
                //data contains variables...
                data: {
                    user: {},
                    cart: [],                  
                    request: {
                        product_id: undefined,                        
                    },
                },
                
                // on mount
                mounted() {
                    
                    axios.get(api_url + 'customer')
                    .then((data) => {                        
                        this.user = data.data;
                       
                    })
                                    
                },
            
                methods: {
                    removeFromCart: function(id){                        
                        this.request.product_id = id;
                        axios.post(api_url + 'remove-from-cart',this.request)
                        .then((data) => {                        
                            Swal.fire({
                                title: "Success",
                                text: "Item removed from cart",
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });

                        })
                    },
                   checkout: function(){
                    axios.post(api_url + 'submit-cart-items',this.request)
                        .then((data) => {                        
                            console.log(data.data);
                        })
                   }
                }
            
            })
            </script>
    </body>
</html>
