@extends('layouts.layout')

@section('content') 
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
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
					</div>
					
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
	                    
	                    @foreach ($products as $product)
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
	                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
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