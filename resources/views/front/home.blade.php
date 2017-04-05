
@extends('layouts.layout')
@section('content') 

<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')

@include('shared.topbar')
@include('shared.lightbox')


 <div class="row">
 	
   

	<div class="col-sm-12">
	<!-- VERTICAL TAB -->
	<div class="col-sm-4 bhoechie-tab-container">
		<div class="col-sm-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-left">
                  <i class="fa fa-tv fa-12x" aria-hidden="true"></i> Electronics
                </a>
                <a href="#" class="list-group-item text-left">
                 <i class="fa fa-black-tie fa-12x" aria-hidden="true"></i> Men
                </a>
                <a href="#" class="list-group-item text-left">
                  <i class="fa fa-female fa-12x" aria-hidden="true"></i> Woman
                </a>
                <a href="#" class="list-group-item text-left">
                   <i class="fa fa-mobile-phone fa-15x" aria-hidden="true"></i> Mobiles 
                </a>
                <a href="#" class="list-group-item text-left">
                   <i class="fa fa-desktop fa-12x" aria-hidden="true"></i> Computers
                </a>
              </div>
            </div>

            <div class="col-sm-1 bhoechie-tab">
                <div class="bhoechie-tab-content active">
			          <a href="#">
			          		<img src="images/home/sale_electronics.png">
			          </a>
                </div>
                <div class="bhoechie-tab-content">
                    <a href="#"><img src="images/home/sale_men.jpg"></a>
                </div>
    
                <div class="bhoechie-tab-content">
                    <a href="#"><img src="images/home/sale_woman.jpg"></a>
                </div>
                <div class="bhoechie-tab-content">
                    <a href="#"><img src="images/home/sale_mobiles.jpg"></a>
                </div>
                <div class="bhoechie-tab-content">
                    <a href="#"><img src="images/home/sale_computers.jpg"></a>
                </div>
            </div>
    </div> 
	<!-- VERTICAL TAB -->
 	

	<!--slideshow-->
	<div class="col-sm-5-home">
		<div id="slideshow_offer">
		   <div>
		     <img src="images/home/slides/1.png"  alt="" />
		   </div>
		   <div>
		     <img src="images/home/slides/2.png"  alt="" />
		   </div>
		   <div>
		     <img src="images/home/slides/3.png"  alt="" />
		   </div>
		   <div>
		     <img src="images/home/slides/4.png"  alt="" />
		   </div>
		   <div>
		     <img src="images/home/slides/5.png"  alt="" />
		   </div>
		</div>
	</div>
	<!-- slideshow -->

	<!-- MAIN OFFER BY MONTH -->
	 <div class="col-sm-3-home">
			<img src="images/home/offer_jan.png" class="offer_homepage" alt="" />
	</div> 


<!--Featured product-->
@if (session()->has('success_message'))
	<script>
 	swal({   
	    title: "Successfully added!",
	    text: "Your product has been added to your cart!",         
	    type: "success",
	    timer: 2000
	  }); 
	</script>
@endif

@if (session()->has('info_message'))
	<script>
		swal({   
		    title: "Sorry..",
		    text: "Product is already in your cart!",         
		    type: "error",
		    timer: 2000
		 });
	</script>
@endif


<div class="row">
	
	<h2 class="title text-center">E-shop's Products</h2>

	<div id="ajaxResponse" style="font-size: 16; font-weight:bold"></div>

	<h2 class="title text-center">Featured Items</h2>

	<div class="col-sm-10">

		<ul class="bxslider">
			<!-- all new -->
	        @foreach ($products as $product)
			<div class="col-xs-10 col-sm-6 col-md-2">
		
				<div class="product-image-wrapper">
					<div class="single-products" id="products_container">
					

						<div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">

							<button>
								<div>+<div>
							</button>

							<img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
							<h4>RM{{number_format($product->price,2)}}</h4>
                            <a href="{{ url('products', [$product->products_id])}}"><p>{{$product->prod_name}}</p></a>
						
							                            
	                    	<a href="/addCart/{{$product->products_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
							
							<a href='{{url("products/details/$product->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

							@if(Auth::check()) 

                            <a href="/products/details/{{ Auth::user()->id }}/{{$product->products_id}}" class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

                            @endif
                          

						</div>
						<img src="images/home/features.png" class="features" alt="" />

						<div class="clearfix"></div>
					</div>
			
					<div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li>
                            	<a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->products_id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
									<i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
								</a> 

          					</li>
                        </ul>
                	</div>
	

				</div>
			</div>
			@endforeach

			<script type="text/javascript">
			$(document).ready(function(){
				$('.bxslider').bxSlider({
				  minSlides: 5,
				  maxSlides: 10,
				  slideWidth: 915,
				  slideHeight: 358,
				  slideMargin: 10

				});
			});
			</script>
		
		</ul>

	</div>

	<div class="col-xs-2 col-sm-6 col-md-2">
		<img src="images/home/slides_featured/1.png" class="offer_features" alt="" />
	</div>
</div>
<!--Featured product

<!--Top Selling-->
<h2 class="title text-center">Top Selling Items</h2>
	
<div class="row">
	<div class="col-xs-2 col-sm-6 col-md-2">
		<img src="images/home/slides_top_selling/1.png" class="offer_features" alt="" />
	</div>
	<div class="col-sm-10"> 
		<div class="flexslider">


	      <ul class="slides">

			<!-- products_top_sale -->
			@foreach ($products as $product)
			<div class="col-xs-10 col-sm-6 col-md-2">
				<div class="product-image-wrapper">
					<div class="single-products" id="products_container">

					<div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
						
							<button>
								<div>+<div>
							</button>

						<img src="../{{$product->path}}{{$product->name}}" class="product-image"/>
						<h4>RM{{number_format($product->price,2)}}</h4>
	                    <p>{{$product->prod_name}}</p>

	      
	                    <a href="/addCart/{{$product->products_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                        <a href='{{url("products/details/$product->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
						@if(Auth::check()) 

                        <a href="/products/details/{{ Auth::user()->id }}/{{$product->products_id}}" class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

                        @endif

					</div>
					<img src="images/home/top-seller.png" class="top-seller" alt="" />

						<div class="clearfix"></div>
				</div>
					<div class="choose">
	                <ul class="nav nav-pills nav-justified">
	                    <li>
	                    	<a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->products_id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
								<i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
							</a>

	  					</li>
	                </ul>
	        		</div>
				</div>
			</div>
			@endforeach

	    	<script type="text/javascript">
			$(document).ready(function(){
				$('.slides').bxSlider({
				  minSlides: 5,
				  maxSlides: 10,
				  slideWidth: 915,
				  slideHeight: 358,
				  slideMargin: 10

				});
			});
			</script>
	    </ul>
	  </div>
   </div>
</div> 
<!--Top Selling-->


<!--Newest-->
<div class="row">
	<h2 class="title text-center">Newest Items</h2>

	<div class="col-sm-10">
	

		<ul class="bxslider_newest">

			<!-- products_new -->
	        @foreach ($products_new as $product_new)
			<div class="col-xs-10 col-sm-6 col-md-2">
		
				<div class="product-image-wrapper">
					<div class="single-products" id="products_container">

						<div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
						
							<button>
								<div>+<div>
							</button>

							<img src="../{{$product_new->path}}{{$product_new->name}}" class="product-image"/>
							<h4>RM{{number_format($product_new->price,2)}}</h4>
                            <p>{{$product_new->prod_name}}</p>
						

                            <a href="/addCart/{{$product_new->products_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
                            <a href='{{url("products/details/$product_new->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
							@if(Auth::check()) 

	                        <a href="/products/details/{{ Auth::user()->id }}/{{$product_new->products_id}}" class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

	                        @endif

						</div>
						<img src="images/home/new.png" class="new" alt="" />

						<div class="clearfix"></div>
					</div>
			
					<div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li>
                            	<a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->products_id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
									<i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
								</a> 
								

          					</li>
                        </ul>
                	</div>
	

				</div>
			</div>
			@endforeach

			<script type="text/javascript">
			$(document).ready(function(){
				$('.bxslider_newest').bxSlider({
				  minSlides: 5,
				  maxSlides: 10,
				  slideWidth: 915,
				  slideHeight: 358,
				  slideMargin: 10

				});
			});
			</script>
		
		</ul>

	</div>

	<div class="col-xs-2 col-sm-6 col-md-2">
		<img src="images/home/slides_newest/1.png" class="offer_features" alt="" />
	</div>
</div>
<!--Newest->

<!--Star Brands-->
<h2 class="title text-center">Star Brands</h2>
	
<section id="labels">
  <div class="row">
	<div class="col-sm-12">

        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
                <h3>
					<img src="images/home/brands/apple.png" class="brands_circle" alt="" />
                    <br>
				   {{$twentypercent_off->name}}
                </h3>
            </div>
            <div class="discount alizarin">
                20%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
                    Shop 20% off and snag hot styles for less!*. 
                </strong> 
				Shop the latest HANDBAGS at LOW PRICES! 
            </div>
            <div class="ends">
                <small>
                    * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-1" class="open-code">Get a code</a>
                <div id="code-1" class="collapse code">
                    LV5MAY14
                </div>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h3>
        			<img src="images/home/brands/xiaomi.png" class="brands_square" alt="" />
                                        <br>
					{{$thirtypercent_off->name}}
                </h3>
            </div>
            <div class="discount emerald">
                30%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
				Shop 30% off and snag hot styles for less!*.
                </strong> 
				Shop the latest SNEAKERS at LOW PRICES! 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-2" class="open-code">Get a code</a>
                <div id="code-2" class="collapse code">
                    MNO123ST
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h3>
        	        <img src="images/home/brands/oppo.png" class="brands_bar" alt="" />
                    <br>
                    {{$fiftypercent_off->name}}
                </h3>
            </div>
            <div class="discount peter-river">
            50%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
				Shop 50% off and snag hot styles for less!*.
                </strong> 
				Shop the latest DRESSES at LOW PRICES! 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-3" class="open-code">Get a code</a>
                <div id="code-3" class="collapse code">
                    OLV4SY3R
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h3>
       	        	<img src="images/home/brands/samsung.png" class="brands_oval" alt="" />
                    <br>
                    {{$seventypercent_off->name}}
                </h3>
            </div>
            <div class="discount amethyst">
                70%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
				Shop 70% off and snag hot styles for less!*.
                </strong> 
				Shop ELECTRONICS at LOW PRICES! 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-4" class="open-code">Get a code</a>
                <div id="code-4" class="collapse code">
                    ZUY4OPLQ
                </div>
            </div>
          </div>
        </div>
	</div>
  </div>
</section>  
<!--Star Brands-->

<!-- Preloved Items -->
 	<style>
	.jssora08l, .jssora08r {
	    display: block;
	    position: absolute;
	    /* size of arrow element */
	    width: 10px;
	    height: 10px;
	    cursor: pointer;
	    background: url('../images/home/slides_preloved/prev_next.png') no-repeat;
	    overflow: hidden;
	    opacity: .4;
	    margin: 10px 10px 20px 20px;
	    filter: alpha(opacity=40);
	}
	.jssora08l { background-position: -5px -35px; }
	.jssora08r { background-position: -65px -35px; }
	.jssora08l:hover { background-position: -5px -35px; opacity: .8; filter:alpha(opacity=80); }
	.jssora08r:hover { background-position: -65px -35px; opacity: .8; filter:alpha(opacity=80); }
	.jssora08l.jssora08ldn { background-position: -5px -35px; opacity: .3; filter:alpha(opacity=30); }
	.jssora08r.jssora08rdn { background-position: -65px -35px; opacity: .3; filter:alpha(opacity=30); }
	.jssora08l.jssora08lds { background-position: -5px -35px; opacity: .3; pointer-events: none; }
	.jssora08r.jssora08rds { background-position: -65px -35px; opacity: .3; pointer-events: none; }
	</style>

<div class="row">
	<div class="col-sm-12">
		<br>
	<h2 class="title text-center">Pre-Loved Items</h2>
	<br>

		<div id="jssor_1" style="pull-right;margin:0 auto;top:0px;left:0px;width:600px;height:265px;overflow:hidden;visibility:hidden;">
	    
		    <!-- Loading Screen -->
		    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
		        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		        <div style="position:absolute;display:block;background:url('images/home/slides_preloved/loading_prev_next.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
		    </div>

	    	<div data-u="slides" style="cursor:default;position:relative;top:40px;left:19px;width:250px;height:330px;overflow:hidden;">
        		<!-- products_used -->
        		@foreach ($products_used as $product_used)
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products" id="products_container">

							<div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
							<!-- <input type="hidden" value="{{$product->id}}" id="prod_id"> -->
								<button>
									<div>+<div>
								</button>

								<img src="../{{$product_used->path}}{{$product_used->name}}" class="product-image"/>
								<h4>RM{{number_format($product_used->price,2)}}</h4>
				                <p>{{$product_used->prod_name}}</p>
							

				                <a href="/addCart/{{$product_used->products_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
				                <a href='{{url("products/details/$product_used->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
								@if(Auth::check()) 

		                        <a href="/products/details/{{ Auth::user()->id }}/{{$product_used->products_id}}" class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

		                        @endif

							</div>
							<img src="images/home/pre-loved.png" class="new" alt="" />

							<div class="clearfix"></div>
						</div>

						<div class="choose">
				            <ul class="nav nav-pills nav-justified">
				                <li>
				                	<a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->products_id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
										<i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
									</a> 
								</li>
				            </ul>
				    	</div>
					</div>
				</div>
				@endforeach
			</div>

		    <!-- Arrow Navigator -->
		    <span data-u="arrowleft" class="jssora08l" style="top:30px; left:100px; width:45px; height:45px;"></span>
		    <span data-u="arrowright" class="jssora08r" style="top: 260px; bottom:0px; right:420px; width:45px; left; 85px; height:45px;"></span>
			
		
			<div>
		     <img src="images/home/slides_preloved/1.jpg" class="discount_preloved" alt="" />
		   </div><br>
		</div>
	</div>
</div>
<!-- Preloved Items -->
 
<!-- Preorder Items -->
<br><br><h2 class="title text-center">PRE-ORDER ITEMS</h2>
<div class="row">
<div class="col-sm-12" style="border: 2px solid #F7F7F5; width: 1290px; height:340px; right: 0px; left:15px; top:5px">
	
<div id="wrapper" style="width: 1256px; height:380px;">

<figure>
    <div class="mis-stage">
        <!-- The element to select and apply miSlider to - the class is optional -->
        <ol class="mis-slider">
            <!-- The slider element - the class is optional - Set width of slide using CSS on this element -->
          	
          	<!-- products_pre_order -->
            @foreach ($products_pre_order as $product_pre_order)
            <li class="mis-slide">
             <a class="mis-container">

             	<figure>
					<div class="product-image-wrapper">
						<div class="single-products" id="products_container" style:"height: 290px">

							<div class="product" data-id="{{$product->id}}" data-name="{{$product->prod_name}}" data-code="{{$product->prod_code}}" data-price="{{$product->price}}"  data-shortdetails="{{$product->short_details}}" data-brand="{{$product->p_brand}}">
							
								<button>
									<a>+</a>
								</button>

                    		<!-- Slide content - whatever you want -->
							<img src="../{{$product_pre_order->path}}{{$product_pre_order->name}}" class="product-image"/>
							<h4>RM{{number_format($product_pre_order->price,2)}}</h4>
				       		 <br><br>
				       		 <br><figcaption>{{$product_pre_order->prod_name}}</figcaption>

				       		 	<a href="/addCart/{{$product_pre_order->products_id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Cart</a>
				                <a href='{{url("products/details/$product_pre_order->products_id")}}' class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>
								@if(Auth::check()) 

		                        <a href="/products/details/{{ Auth::user()->id }}/{{$product_pre_order->products_id}}" class="btn btn-default view-details"><i class="fa fa-info"></i> Details</a>

		                        @endif

							</div>
							<img src="images/home/pre-order.png" class="pre-order" alt="" />
							
							<div class="choose">
								<ul>
									<li><a class='wishlist' product_name='{{$product->prod_name}}' product_id='{{$product->products_id}}' product_price='{{$product->price}}' product_stock='{{$product->stock_quantity}}'>
										<i class="fa fa-heart" aria-hidden="true"></i>Add to Wishlist
										</a>
									</li>
								</ul>
							</div>

							<div class="clearfix"></div>
						</div>

					</div>

                    </figure>
                </a>
            </li>
            @endforeach

        </ol>
    </div>
</figure>
</div>

	</div>
</div> 
<!-- Preorder Items -->

<!-- Brands by Category -->
<br>
<h2 class="title text-center">Brands by Category</h2>
<div class="row">
	<div class="col-sm-12" style="border: 2px solid #F7F7F5; width: 1290px; height:210px; right: 0px; left:15px; top:5px">
		<div id="mi-slider" class="mi-slider">
			<ul>
				@foreach($brands_by_electronics as $brand_by_electronic)
				<li>
					<a href="#">
						<img src="../{{$brand_by_electronic->path}}{{$brand_by_electronic->brand_name}}"/>
					</a>
				</li>
				@endforeach
			</ul>
			<ul>
				@foreach($brands_by_womens as $brand_by_women)
				<li>
					<img src="../{{$brand_by_women->path}}{{$brand_by_women->brand_name}}"/>
				@endforeach	</ul>
			<ul>
				@foreach($brands_by_mens as $brand_by_men)
				<li>
					<img src="../{{$brand_by_men->path}}{{$brand_by_men->brand_name}}"/>
				@endforeach
			</ul>
			<nav>
				@foreach($brands_main_categories as $brand_main_category)
				<a href="#">{{$brand_main_category->main_cat}}</a>
				@endforeach
			</nav>
		 </div>
	</div>
</div>
<!-- Brands by Category -->

	<!-- Compare Features Items -->
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


	
	@include('shared.footerbar')
</section>
@endsection

@section('js_section')
<SCRIPT TYPE="text/javascript">


</SCRIPT>