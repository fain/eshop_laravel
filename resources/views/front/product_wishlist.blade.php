@extends('layouts.layout')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="wishlist_items"><!-- wishlist -->
                <h2 class="title text-center">My Wishlists</h2>

	            
    			<div class="table-responsive">
						<table class="table table-striped">
						<!-- 	 <div class="dropdown"  align="right">
							    <button id="topic" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Topic
							    <span class="caret"></span></button>
								<ul class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="topic">
							      <li><a href="#">Product</a></li>
							      <li><a href="#">Shipping</a></li>
								      <li><a href="#">Return/Cancellation</a></li>
							      <li><a href="#">Exchange</a></li>
							      <li><a href="#">Other Topics</a></li>
							    </ul>
							</div>
 -->						

						    <thead> 
						    	<p>
								<tr>
									
						            <th scope class="">Product</th>
						            <th scope class="">Date</th>
						            <th scope class="">Availability</th>
									<th scope class="">Price</th>
									<th scope class=""></th>
									
						        </tr>
						    </thead>
						    <tbody id="qanda">
						    	@foreach ($products as $product)
						        <tr>
						            <td class=""><img src="{{asset('images/shop/product9.jpg')}}" alt="" />Code: {{$product->prod_code}} <br> {{$product->name}}</td>          
						            <td class="">date</td>
						            <td class="">{{$product->stock_quantity}}</td>          
						            <td class="">RM {{$product->price}}</td>    
   						            <td class=""><a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></td>          
     							@endforeach
						      	</tr>
						    </tbody>
						</table> 
					</div>


	         </div><!--wishlist-->


<!-- wishlist 2 -->
<!-- <div class="table-responsive" id="wishlist_item">
						<table class="table table-striped">
						    <thead> 
						    	<p class="wish_list_heading">
								<tr>
									
						            <th scope class="">Product</th>
						            <th scope class="">Availability</th>
									<th scope class="">Price</th>
									<th scope class=""></th>
									
						        </tr>
						    </thead>
						    <tbody>
						      	@foreach($products as $product)
						      	<tr class='wishlist-item' id='list_id_"+$product_id+"'>
						      		<td class='w-pname'>"+$product_name+"</td>
						      		<td class='w-stock'>"+$product_stock+ ' ' + "</td>
						      		<td class='w-price'>RM"+$product_price+"</td>
						      		<td class='w-premove' wpid='"+$product_id+"'>x</td>
						      	@endforeach	
						      	</tr>
						    </tbody>
						</table> 
					</div>
	         </div> -->
<!-- wishlist 2 -->


		</div>
	</div>
</section>
@endsection