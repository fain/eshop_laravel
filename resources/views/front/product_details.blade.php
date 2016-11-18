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
								
									<table class="table table-borderless">
									    <tbody>
									        <tr>
									            <th scope class="">Availability</th>
									            <td class="">{{$product->stock_quantity}}</td>
									        </tr>
									        <tr>
												<th scope class="">Condition</th>
									            <td class="">{{$product->type}}</td>          
									      	</tr>
									      	<tr>
												<th scope class="">Brand</th>
									            <td class="">{{$product->name}}</td>          
									      	</tr>
									      	<tr>
												<th scope class="">Shipping

									            <td class="">West Malaysia RM{{$product->wm_rm}}</td>  
	   								            <td class="">Sabah RM{{$product->sbh_rm}}</td>          
									            <td class="">Sarawak RM{{$product->srk_rm}}</td>          
	        									
									      	</tr>
									    </tbody>
									</table>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Product Details</a></li>
								<li><a href="#reviewscomments" data-toggle="tab">Reviews/Comments</a></li>
								<li><a href="#qa" data-toggle="tab">Product Q & A</a></li>
								<li><a href="#sellreturnexchange" data-toggle="tab">Sell/Return/Exchange</a></li>
							</ul>
						</div>

						<div class="panel-body">
		                    <div class="tab-content">
		                        <div class="tab-pane fade in active" id="details">
								<div class="col-lg-12">
									<table class="table table-no-hover">
										<h4>Basic Information of a Product</h4>
									    <tbody>
									        <tr>
									            <th scope class="">Product Status/Sales Type</th>
									            <td class="">{{$product->stock_quantity}}</td>
									            <th scope class="">Product No.</th>
									            <td class="">{{$product->prod_code}}</td> 
									        </tr>
									         <tr>
												<th scope class="">Brand</th>
									            <td class="">{{$product->name}}</td>    
												<th scope class="">Country of Origin</th>
									            <td class="">{{$product->name}}</td>          
									      	</tr>
									        <tr>
												<th scope class="">Weight(kg)</th>
									            <td colspan=3 class="">{{$product->weight}} kg</td>         
									      	</tr>
									      	<tr>
												<th scope class="">Shipping Method</th>
									            <td colspan=3class="">{{$product->shipping_method}}</td>          
									      	</tr>
									      		<tr>
												<th scope class="">GST Applicable</th>
									            <td colspan=3class="">{{$product->name}}</td>          
									      	</tr>
									      		<tr>
												<th scope class="">Tax Invoice</th>
									            <td colspan=3 class="">{{$product->name}}</td>          
									      	</tr>
									      		<tr>
												<th scope class="">After Sale Service</th>
									            <td colspan=3 class="">{{$product->after_sale_serv}}</td>          
									      	</tr>
									    </tbody>
									</table> 

								</div>

		                        </div>
		                        <div class="tab-pane fade" id="reviewscomments">review comment</div>
		                        <div class="tab-pane fade" id="qa">q and a</div>
		                        <div class="tab-pane fade" id="sellreturnexchange">sell</div>
		                    </div>
		                </div>
					</div><!--/category-tab-->
				<ul>
					<li>Angkasa E-Shop receives report on products to protect buyers’ right. For further information please contact us. Reportgo</li>
					<li>For order related and other issues, kindly click on E-mail Enquiry here.  E-mailEnquiry</li>
				</ul>
			</div>
	</div>
</div>


</section>
@endsection