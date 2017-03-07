@extends('layouts.layout')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="wishlist_items"><!-- wishlist -->

                <h2 class="title text-center">My Wishlists</h2>
            
    			<div class="table-responsive">
						<table class="table table-striped-wishlist">
						    <thead> 
								<tr>
						            <th scope class="" style="text-align:center;">Product</th>
						            <th scope class="" style="text-align:center;">Price</th>
						            <th scope class="" style="text-align:center;">Shipping Fee/Seller</th>
						            <th scope class="" style="text-align:center;">Shipping Method</th>
						            <th scope class="" style="text-align:center;">Availability</th>
									<th scope class="" style="text-align:center;">Manage</th>
						        </tr>
						    </thead>
						    <tbody>
						      	@foreach($user_wish_list as $user_wishlist)
						        <tr>
<!-- 						        	<td>{{ $user_wishlist->pw_id }}</td>
 -->						            <td class="" ><table style="float: right"><img src="../../{{$user_wishlist->path}}{{$user_wishlist->name}}" class="product-wishlist"/></table> {{$user_wishlist->prod_name}}</td>          
						            <td class="" width="10%" style="text-align:center;">RM <strong>{{$user_wishlist->price}}</strong></td>  
						            <td class="" style="text-align:center;">{{$user_wishlist->ship_rate}} <p><u><a href=#><i class="fa fa-building"></i> {{$user_wishlist->store_name}}</a></u></p></td>
						            <td class="" style="text-align:center;">{{$user_wishlist->shipping_method}}</td>    
   						            <td class="" style="text-align:center;">{{$user_wishlist->stock_quantity}} <img src="../../images/wishlist/in_stock.png"></td>          
								   	<td class="" style="text-align:center;">

								   		<a href="{{ url("/products/wishlists/{id}/delete_product_wishlist/".$user_wishlist->pw_id) }}" class="btn btn-danger btn-sm" name="delete_product_wishlist" onclick="return confirm('Are you sure to delete this Product?')">
								   		<i class="fa fa-remove"></i> Remove</a>


								   		<a href="{{url('cart')}}" class="btn btn-success btn-sm"><i class="fa fa-shopping-bag"></i> To Cart</a>
								   </td>          

								@endforeach
						      	</tr>

						    </tbody>
						</table> 

						<a href="{{url('')}}" class="btn btn-primary btn-lg" style="font-family:'roboto', sans-serif; font-size:14px"><i class="fa fa-reply"></i> Continue Shopping</a> &nbsp;

			            <div style="float:right; font-family:'Roboto',sans-serif">
			                <form action="/emptyWishlist" method="POST">
			                    {!! csrf_field() !!}
			                    <input type="hidden" name="_method" value="DELETE">
			                    <button type="submit" class="btn btn-danger btn-lg" style="font-family:'roboto', sans-serif; font-size:14px"><i class="fa fa-trash-o"></i> Empty Wishlist</button>
			                </form>
			            </div>

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
						
						    </tbody>
						</table> 
					</div>
	         </div> -->
<!-- wishlist 2 -->


		</div>
	</div>
</section>
@endsection