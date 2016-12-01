@extends('layouts.layout')

@section('content') 
		<div id='msg'></div>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">

				<div class="col-sm-12">

					<!-- Carousel Slider -->
					<!-- <div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>ALL ABOUT THE LOOK!</span></h1>
									<h2>Fashion Monday</h2>
									<p>It's the little thing that matter.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>NEW ARRIVALS!</span></h1>
									<h2>Fashion 11% Credit Rebate</h2>
									<p>Calling All Shopaholics! Up to 90 OFF</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>SPECIAL OFFERS!</span></h1>
									<h2>Tech 11 Celebration!</h2>
									<p>Let's gear up with the latest tech around.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div> --><!-- Carousel Slider -->

					<!-- BlueImp Gallery -->
					<div class="container">
					    <!-- The container for the list of example images -->
					    
						    <div id="links">

						    	<div class="col-md-8">
							        <a data-gallery="" title="Baby Fair End of Year 2016" href="images/home/discount1_big.jpg">
							            <img src="images/home/discount1_small.png">
							        </a>
							        
							        <a data-gallery="" title="Baby Fair End of Year 2016" href="images/home/discount1_big.jpg">
							            <img src="images/home/discount2_small.png">
							        </a>
							    </div>

						        <div class="col-md-4">
							        <a data-gallery="" title="Free Shipping End of Year 2016" href="images/home/discount3_big.png">
							            <img src="images/home/discount3_small.png">
							        </a>
							        <br>
							        <a data-gallery="" title="Free Shipping End of Year 2016" href="images/home/discount1_big.jpg">
							            <img src="images/home/discount4_small.png">
							        </a>
							    </div>
						      
						    </div>
					    <br>
					</div>
					<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
					<div id="blueimp-gallery" class="blueimp-gallery">
					    <!-- The container for the modal slides -->
					    <div class="slides"></div>
					    <!-- Controls for the borderless lightbox -->
					    <h3 class="title"></h3>
					    <a class="prev">‹</a>
					    <a class="next">›</a>
					    <a class="close">×</a>
					    <a class="play-pause"></a>
					    <ol class="indicator"></ol>
					    <!-- The modal dialog, which will be used to wrap the lightbox content -->
					    <div class="modal fade">
					        <div class="modal-dialog">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" aria-hidden="true">×</button>
					                    <h4 class="modal-title"></h4>
					                </div>
					                <div class="modal-body next"></div>
					                <div class="modal-footer">
					                    <button type="button" class="btn btn-default pull-left prev">
					                        <i class="glyphicon glyphicon-chevron-left"></i>
					                        Previous
					                    </button>
					                    <button type="button" class="btn btn-primary next">
					                        Next
					                        <i class="glyphicon glyphicon-chevron-right"></i>
					                    </button>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<!-- Blueimp gallery -->

				</div>

			</div>
		</div>
	</section><!--/slider-->

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
					@foreach($products as $product)

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
		                                    <p>{{$product->stock_quantity}}</p>


		                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
		                                    <a href='{{url("products/cart/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
		                             
										</div>

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
				</div><!-- features_items -->



					<!-- Compare Features Items -->
					<a style="margin-top:0;" id="compare" href="#animatedModal" disabled class="compare-products">Compare Products</a>
					<ul style="margin-bottom:0;" class="pagination pull-right">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">»</a></li>
	                </ul> 
		         
			
					<!--Modal-->
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


 					<div id='wish_list'>
						<p class="wish_list_heading">
							<span id='listitem'>0</span>
							<span id='p_label'>Product</span>
						</p>
						<table id='wish_list_item' border='0'></table>
					</div>


<!-- test -->




<!-- test -->
 			<div class="features_items"><!--features_items-->
	                    <h2 class="title text-center">Features Items</h2>
	                    
					@foreach($products as $product)


	                    <div class="col-sm-4">
	                        <div class="product-image-wrapper">
	                            <div class="single-products">
	                                <div class="productinfo text-center">
	                                    <img src="{{asset('images/shop/product9.jpg')}}" alt="" />
	                                    <h2>RM{{$product->price}}</h2>
	                                    <p>{{$product->name}}</p>
	                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                                    <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
	                                </div>
	                                
	                                <div class="product-overlay">
	                                    <div class="overlay-content">
	                                        <h2>RM{{$product->price}}</h2>
	                                        <p>{{$product->name}}</p>
	                                        <form method="POST" action="{{url('cart')}}">
	                                            {{ csrf_field() }}
	                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                            <input type="hidden" name="product_id" value="{{$product->id}}">                                            
	                                            <button type="submit" class="btn btn-default add-to-cart">
	                                                <i class="fa fa-shopping-cart"></i>
	                                                Add to cart
	                                            </button>
	                                        </form>
	                                        <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
	                                    </div>
	                                </div>

	                            </div>

	                            <div class="choose">
	                                <ul class="nav nav-pills nav-justified">
	                                    <li><a href='{{url("products/wishlists/$product->id")}}'><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
	                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
	                                </ul>
	                            </div>

	                        </div>
	                    </div>
	                    @endforeach

	                    <ul class="pagination">
	                        <li class="active"><a href="">1</a></li>
	                        <li><a href="">2</a></li>
	                        <li><a href="">3</a></li>
	                        <li><a href="">»</a></li>
	                    </ul>

	                </div><!--features_items-->

			   <!--Top Selling items-->
	               <div class="top_selling_items">
						<h2 class="title text-center">Top Selling Items</h2>
										
						<div id="top-selling-item-carousel" class="carousel slide" data-ride="carousel">
								
							<!-- Wrapper for carousel items -->
							<div class="carousel-inner">
								<div class="item active">

									@foreach ($products as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/top_selling1.jpg')}}" alt="" />
													<h2>RM{{$product->price}}</h2>
	                                    			<p>{{$product->name}}</p>

	                                    			<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                                    			<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>

												</div>
												<img src="images/home/sale.png" class="sale" alt="" />
											</div>
											<div class="choose">
				                                <ul class="nav nav-pills nav-justified">
				                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
				                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
				                                </ul>
				                            </div>
				                            
										</div>
									</div>
									@endforeach
								</div>

									<div class="item">
										@foreach ($products as $product)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="{{asset('images/home/top_selling1.jpg')}}" alt="" />
														<h2>RM{{$product->price}}</h2>
		                                    			<p>{{$product->name}}</p>

		                                    			<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
		                                    			<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>

													</div>
													<img src="images/home/sale.png" class="sale" alt="" />
												</div>

												 <div class="choose">
					                                <ul class="nav nav-pills nav-justified">
					                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
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

									@foreach ($products as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/newest1.jpg')}}" alt="" />
													<h2>RM{{$product->price}}</h2>
	                                    			<p>{{$product->name}}</p>

	                                    			<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                                    			<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>

												</div>
												<img src="images/home/new.png" class="new" alt="" />
											</div>
											<div class="choose">
				                                <ul class="nav nav-pills nav-justified">
				                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
				                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
				                                </ul>
				                            </div>
				                            
										</div>
									</div>
									@endforeach
								</div>

									<div class="item">
										@foreach ($products as $product)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="{{asset('images/home/newest1.jpg')}}" alt="" />
														<h2>RM{{$product->price}}</h2>
		                                    			<p>{{$product->name}}</p>

		                                    			<a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
		                                    			<a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>

													</div>
													<img src="images/home/new.png" class="new" alt="" />
												</div>

												 <div class="choose">
					                                <ul class="nav nav-pills nav-justified">
					                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
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