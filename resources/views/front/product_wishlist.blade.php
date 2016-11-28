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

						        <tr>
						            <td class=""><img src="{{asset('images/shop/product9.jpg')}}" alt="" />Code: {{$product->prod_code}} <br> {{$product->name}}</td>          
						            <td class="">date</td>
						            <td class="">{{$product->stock_quantity}}</td>          
						            <td class="">RM {{$product->price}}</td>    
   						            <td class=""><a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></td>          
     								
						      	</tr>
						    </tbody>
						</table> 
					</div>


	         </div><!--wishlist-->



		</div>
	</div>
</section>
@endsection