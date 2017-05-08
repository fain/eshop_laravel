@extends('layouts.layout')
@section('content')
<section>

<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<script src="{{asset('js/sweetalert.min.js')}}"></script>
@include('sweet::alert')

@include('shared.topbar')

@if (session()->has('success_move_cart_message'))
    <script>
    swal({   
        title: "Successfully moved!",
        text: "Product has been moved to your cart!",         
        // type: "success",
        imageUrl: 'images/error/add-cart.png',
        timer: 2000
      }); 
    </script>
@endif

<div class="row">

	<!-- wishlist -->
	<div class="wishlist_items">

        <h2 class="title text-center">My Wishlist</h2>
    
 
    @foreach($product_wishlists as $product_wishlist)
    @endforeach

    @if  ($product_wishlist->products_id)
    	<i class="fa fa-info-circle"></i> <small style="color:black; text-align:left;">Wishlist are saved for up to 90 days from the date they were added to your Wishlist.
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <a href="#" data-toggle="tooltip" data-placement="left" data-html="true" 
                                                title="<p><b>West Malaysia</b>
                                                    <p>RM 7.00 for up to 5 kg
                                                    <p>RM 1.00 for each additional 1 kg                             
                                                    <hr>
                                                    <b>Sabah</b>
                                                    <p>RM 12.00 for up to 1 kg 
                                                    <p>RM 11.00 for each additional 1 kg
                                                    <hr>
                                                    <p><b>Sarawak</b>
                                                    <p>RM 12.00 for up to 1 kg 
                                                    <p>RM 11.00 for each additional 1 kg" >
                                             <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                        </a>
                                    Shipping Fee
    </small>

    @if (session()->has('success_remove_wishlist_message'))
    <div class="alert alert-success alert-dismissible" style="font-weight:bold">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('success_remove_wishlist_message') }}
    </div>
    @endif

    <div class="table-responsive">
			<table class="table table-striped-wishlist">
			    <thead> 
					<tr>
			            <th scope class="" style="text-align:center;">Product</th>
			            <th scope class="" style="text-align:center;">Price</th>
                        <th style="text-align:center;">Shipping Fee/Seller</th>
			            <th scope class="" style="text-align:center;">Shipping Method</th>
                        <th scope class="" style="text-align:center;">Satisfaction Rating</th>
                        <th scope class="" style="text-align:center;"></th>
			        </tr>
			    </thead>
			    <tbody>
				    <?php 
	                    $total_discount=0;
	                ?>  
			    	@foreach($product_wishlists as $product_wishlist)
			        <tr>
 						<td class="" width="45%">
                            <a href="/removeWishlist/{{$product_wishlist->id_wi}}" data-toggle="tooltip" data-placement="top" data-html="true" 
                            title="Remove" class="btn btn-sm" onclick="return confirm('Are you sure to delete product wishlist {{$product_wishlist->prod_name}} ?')" >

                            <i class="fa fa-remove"></i></a>


                            <table style="float: right"><img src="../../{{$product_wishlist->path}}{{$product_wishlist->name}}" class="product-wishlist"/></table> 
                            {{$product_wishlist->prod_name}}<p>
                        
                            @php
                            switch ($product_wishlist->stock_quantity) 
                            {
                                case "NULL":

                                    $product_wishlist->stock_quantity = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Out of stock";
                                    break;

                                case "0":

                                    $product_wishlist->stock_quantity = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Out of stock";
                                    break;

                                case "":

                                    $product_wishlist->stock_quantity = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Out of stock";
                                    break;

                                default:
                                
                                    $product_wishlist->stock_quantity= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$product_wishlist->stock_quantity." left ";
                            }
                            @endphp

                         <small style="color: red">{{$product_wishlist->stock_quantity}}</small>

                        </td>  						
 						<td class="" style="text-align:center" width="15%">
 							<p style="color:red">
                                <strike>
                                    RM {{number_format($product_wishlist->price,2)}}
                                </strike> 
                                
                                @php
                                switch ($product_wishlist->discount_sel) 
                                {
                                    case "NULL":

                                        $product_wishlist->discount_sel = "(N/P)";
                                        break;

                                    case "0%":

                                        $product_wishlist->discount_sel = "(N/P)";
                                        break;

                                    case "":

                                        $product_wishlist->discount_sel = "(N/P)";
                                        break;

                                    default:

                                        $product_wishlist->discount_sel= "save ".$product_wishlist->discount_sel;
                                }
                                @endphp

                                {{$product_wishlist->discount_sel}}
                                </p>

                            <input type="hidden" value="{{ $product_wishlist->price }}" class="price" style="text-decoration: line-through">
                            
                            <h6 style="color:red">
                                <input type="hidden" value="{{ $product_wishlist->discount_val }}" class="discount_val">                                
                        	</h6>

                        	<?php  
 	                            $total_discount = $product_wishlist->price - $product_wishlist->discount_val;
                            ?>
                        	<strong>
                                RM {{number_format($total_discount,2)}}
                            </strong>

                        </td>		
						<td class="" style="text-align:center;" width="15%">

                            <input type="hidden" value="{{ $product_wishlist->ship_rate }}" class="ship_rate">

                            @php
                            switch ($product_wishlist->ship_rate) 
                            {
                                case "0.00":

                                    $product_wishlist->ship_rate = "FREE";
                                    break;

                                default:
                                    $product_wishlist->ship_rate = "RM ".$product_wishlist->ship_rate;
                            }
                            @endphp

                         	{{$product_wishlist->ship_rate}} 
                            <br>
                        	<u><a href=#> {{$product_wishlist->store_name}}</a></u>
                     	</td>
                     	<td class="" style="text-align:center;" width="12%">
                     		{{$product_wishlist->shipping_method}}
                     	</td>
                        <td class="" style="text-align:center;" width="12%">
                            {{$product_wishlist->shipping_method}}
                        </td>
		   				<td class="" style="text-align:center" width="5%">
					       <a href="/switchToCart/{{$product_wishlist->products_id}}" data-toggle="tooltip" data-placement="top" data-html="true" 
                            title="Move to cart"><i class="fa fa-cart-arrow-down fa-1x" style="margin-top:15px; margin-left:0px;"></i></a>
                       	</td>          
			      	</tr>
                @endforeach

			    </tbody>
			</table> 

           <!--  <div style="float:right; font-family:'Roboto',sans-serif">
                <form action="/emptyWishlist" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-lg" style="font-family:'roboto', sans-serif; font-size:14px"><i class="fa fa-trash-o"></i> Empty Wishlist</button>
                </form>
            </div> -->

             <div style="float:right">
               
                    <a href="/emptyCart" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to empty your list of cart?')" >
                    <i class="fa fa-trash-o"></i> Empty Cart</a>
                
                <!--     <form action="/emptyCart" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Empty Cart">
                    </form> -->

                </div>


		</div>
 	@else


        <strong><h3>You have no products in your wishlist</h3></strong>
        
        <div style="float:right">
            <a href="{{url('')}}" class="btn btn-primary btn-sm">
            <i class="fa fa-mail-reply"></i> Continue Shopping</a>
        </div>

    @endif

     </div>
     <!--wishlist-->


</div>
</section>
@endsection