@extends('layouts.layout')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					@include('shared.sidebar')
				</div>
			</div>

			<div class="col-sm-9 padding-right">
			<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('images/product-details/1.jpg')}}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
	                 
									                    

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$product->description}}</h2>
								<p>Product ID: {{$product->prod_code}}</p>
								<img src="{{asset('images/product-details/rating.png')}}" alt="" />
								<span>
									<span>RM{{$product->price}}<h5>(GST Included)</h5></span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="{{ old('quantity') }}">
									
									<a href='{{url("products/cart/$product->id")}}'<button type="button" class="btn btn-default cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button></a>
								</span>
								
								
								<p><b>Availability: </b>{{$product->stock_quantity}}</p>
								<p><b>Condition: </b>{{$product->type}}</p>
								<p><b>Brand: </b>{{$product->name}}</p>
									<div class="shipping-information">
										<tr><td><b>Shipping: </b> West Malaysia	  {{$product->wm_rm}}</td></tr>
										<tr><td>Sabah</td></tr>											
									</div>
								</div><!--/product-information-->
						</div>
						
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Product Details</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Reviews/Comments</a></li>
							<li><a href="#tag" data-toggle="tab">Product Q & A</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Sell/Return/Exchange</a></li>
						</ul>
					</div>
			
				</div><!--/category-tab-->

			</div>
	</div>
</div>
</section>
@endsection