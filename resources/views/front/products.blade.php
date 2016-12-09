@extends('layouts.layout')

@section('content') 
    <div id='msg'></div>
   
    @include('shared.topbar')


    <section>
        <div class="container">

            <div class="row">
                <div class="col-sm-12">

                <div class="col-sm-2">
                    <div class="left-sidebar">
                        @include('shared.sidebar')
                    </div>
                </div>

        
            <div class="col-sm-8 padding-right">

                <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                                        
                        <div id="features-item-carousel" class="carousel slide" data-ride="carousel">
                                
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">

                                    @foreach ($products as $product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products" id="products_container">

                                        <div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
                                            
                                                <button>
                                                    <div>+<div>
                                                </button>

                                            <img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
                                            <h2>RM{{$product->price}}</h2>
                                            <p>{{$product->prod_name}}</p>
                                        

                                            <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                                            <a href='{{url("products/details/$product->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>


                                        </div>
                                        <img src="images/home/features.png" class="features" alt="" />

                                            <div class="clearfix"></div>
                                    </div>
                                    
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
                                                </a>

                                            </li>
                                        </ul>
                                    </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    </div>

                                </div>

                                <!-- Carousel Controls -->
                                <a class="left features-item-control" href="#features-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right features-item-control" href="#features-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                          </div>
                    </div><!--features_items-->


                
                 
            
                    <!--Modal--><!-- Compare Features Items -->
                    <div id="animatedModal">
                        <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
                        <div  id="btn-close-modal" class="close-animatedModal"> 
                            CLOSE
                        </div>
                            
                        <div class="modal-content-compare">
                            <div class="modal-inner">
                                <div class="no-products">Select some products to compare first</div>  
                                <div class="modal-products"></div>     
                            </div>
                        </div>

                    </div> <!--modal-features-items-->


                    <!-- <div id='wish_list'>
                        <p class="wish_list_heading">
                            <span id='listitem'>0</span>
                            <span id='p_label'>Product</span>
                        </p>
                        <table id='wish_list_item' border='0'></table>
                    </div> -->


<!-- test -->




<!-- test -->
            

               <!--Top Selling items-->
                   <div class="top_selling_items">
                        <h2 class="title text-center">Top Selling Items</h2>
                                        
                        <div id="top-selling-item-carousel" class="carousel slide" data-ride="carousel">
                                
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach ($products_top_sale as $product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products" id="products_container">

                                        <div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
                                            
                                                <button>
                                                    <div>+<div>
                                                </button>

                                            <img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
                                            <h2>RM{{$product->price}}</h2>
                                            <p>{{$product->prod_name}}</p>

                              
                                            <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                                            <a href='{{url("products/cart/$product->id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
                 
                                        </div>
                                        <img src="images/home/top-seller.png" class="top-seller" alt="" />

                                            <div class="clearfix"></div>
                                    </div>
                                        <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
                                                </a>

                                            </li>
                                        </ul>
                                    </div>


                                            
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                    
                                </div>

                                <!-- Carousel Controls -->
                                <a class="left top-selling-item-control" href="#top-selling-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right top-selling-item-control" href="#top-selling-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                          </div>    
                    </div><!--/top-selling_items-->

                    <div class="newest_items"><!-- newest_items -->
                        <h2 class="title text-center">Newest Items</h2>
                                        
                        <div id="newest-item-carousel" class="carousel slide" data-ride="carousel">
                                
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach ($products_new as $product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products" id="products_container">

                                        <div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
                                            
                                                <button>
                                                    <div>+<div>
                                                </button>

                                            <img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
                                            <h2>RM{{$product->price}}</h2>
                                            <p>{{$product->prod_name}}</p>

                                            <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            <a href='{{url("products/cart/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                     
                                        </div>
                                        <img src="images/home/new.png" class="new" alt="" />

                                            <div class="clearfix"></div>
                                    </div>
                                        <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
                                                </a>

                                            </li>
                                        </ul>
                                    </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>

                                <!-- Carousel Controls -->
                                <a class="left newest-item-control" href="#newest-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right newest-item-control" href="#newest-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                          </div>
                    </div><!--newest_items-->

                    <div class="used_items"><!--used_items -->
                        <h2 class="title text-center">Used Items</h2>
                                        
                        <div id="used-item-carousel" class="carousel slide" data-ride="carousel">
                                
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach ($products_used as $product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products" id="products_container">

                                        <div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
                                            
                                                <button>
                                                    <div>+<div>
                                                </button>

                                            <img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
                                            <h2>RM{{$product->price}}</h2>
                                            
                                            <p>{{$product->prod_name}}</p>

                                       
                                     
                                            <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                                            <a href='{{url("products/cart/$product->id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
         
                                        </div>
                                        <img src="images/home/pre-loved.png" class="pre-loved" alt="" />

                                            <div class="clearfix"></div>
                                    </div>
                                        <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
                                                </a>

                                            </li>
                                        </ul>
                                    </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>

                                <!-- Carousel Controls -->
                                <a class="left used-item-control" href="#used-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right used-item-control" href="#used-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                          </div>
                    </div><!--used_items-->
            
                <div class="pre-order_items"><!-- pre_order_items -->
                        <h2 class="title text-center">Pre-Order Items</h2>
                                        
                        <div id="pre-order-item-carousel" class="carousel slide" data-ride="carousel">
                                
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">

                                    @foreach ($products_pre_order as $product)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products" id="products_container">

                                        <div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
                                            
                                                <button>
                                                    <div>+<div>
                                                </button>

                                            <img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
                                            <h2>RM{{$product->price}}</h2>
                                            <p>{{$product->prod_name}}</p>

                                    
                                            <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                                            <a href='{{url("products/cart/$product->id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
             
                                        </div>
                                        <img src="images/home/pre-order.png" class="pre-order" alt="" />

                                            <div class="clearfix"></div>
                                    </div>
                                        <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li>
                                                <a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
                                                    <i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
                                                </a>

                                            </li>
                                        </ul>
                                    </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>

                                <!-- Carousel Controls -->
                                <a class="left pre-order-item-control" href="#pre_order-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right pre-order-item-control" href="#pre_order-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                          </div>
                    </div><!--pre_order_items-->
                </div>
                 
                    <div class="col-sm-2">
                        <div class="right-sidebar">
                            @include('shared.right_sidebar')
                        </div>
                    </div>

                   </div>
            </div>
        </div>
        </div>
    </section>
@endsection