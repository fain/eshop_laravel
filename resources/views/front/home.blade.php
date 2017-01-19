
@extends('layouts.layout')

@section('content') 
	<div id='msg'></div>
	
	@include('shared.topbar')

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
<div class="row">
	<h2 class="title text-center">Features Items</h2>

	<div class="col-sm-10">
	

		<ul class="bxslider">
			
	        @foreach ($products as $product)
			<div class="col-xs-10 col-sm-6 col-md-2">
		
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
<!--Featured product-->

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
	        @foreach ($products as $product)
			<div class="col-xs-10 col-sm-6 col-md-2">
		
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
		<img src="images/home/slides_featured/1.png" class="offer_features" alt="" />
	</div>
</div>
<!--Newest->




	<section>
	    <div class="container">


	        <div class="row">
	            <div class="col-sm-12">

	      



        <!-- left sidebar -->

        	<br/>
        	<br/>




		
	        <div class="col-sm-8 padding-right">

            


				
		         
			
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
	             
	             	
	             <!-- right sidebar -->

		           </div>
	        </div>

	    </div>
<!-- 	    </div>
 -->	    <!-- container -->
	</section>
@endsection