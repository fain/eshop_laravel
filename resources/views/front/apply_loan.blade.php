@extends('layouts.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<script src="{{asset('js/sweetalert.min.js')}}"></script>


@include('sweet::alert')

 <div class="row"><!-- row-->

<div class="cart_items">
@if (session()->has('success_remove_cart_message'))
                    <script>
                    $('button#removecart').on('click', function(){
                      swal({   
                        title: "Are you sure?",
                        text: "You will not be able to recover this lorem ipsum!",
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!", 
                        closeOnConfirm: false 
                      }, 
                           function(){  
                          $("#remove_cart").submit();
 
                      });
                    })
                    </script>
                @endif

                @if (session()->has('success_remove_cart_message'))
                <div class="alert alert-success alert-dismissible" style="font-weight:bold">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session()->get('success_remove_cart_message') }}
                </div>
                @endif

 
                @if (session()->has('error_message'))
                    <div class="alert alert-danger alert-dismissible" style="font-weight:bold">
                        {{ session()->get('error_message') }}
                    </div>
                @endif



            @foreach($product_carts as $product_cart)
            @endforeach
            
  @if  ($product_cart->products_id)

                <div class="table-responsive">

                

                <table class="table table-hover-cart">
                <thead>
                   <tr>
                        <th style="text-align:center;">Product</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Discounted Price</th>
                        <th style="text-align:center;">Shipping Fee(RM)/Seller</th>
                        <th style="text-align:center;">Manage</th>
                    </tr>
                </thead>
                <tbody>
               <?php 
                    $sum_total_discount = 0; 
                    $sum_total_ship_rate = 0;
                    $sum_total_discount_val = 0;
                    $sum_total_price_quantity = 0;


                    $grand_discount_amount = 0;
                    $grand_order_amount= 0;
                    $grand_shipping_amount = 0;
                    $grand_payment_amount = 0
                ?>  
            
                @foreach($product_carts as $product_cart)
                    <tr> 
                        <td class="" width="35%">
                            <table style="float: right"><img src="../../{{$product_cart->path}}{{$product_cart->name}}" class="product-wishlist"/></table> 
                            {{$product_cart->prod_name}}
                        </td>          
                        
                        <td class="" width="5%">
                        <?php
                            $total_discount = $product_cart->price - $product_cart->discount_val;
                            $sum_total_price_quantity += $product_cart->quantity * $total_discount
                        ?>
                            <select id="quantity" data-id="{{ $product_cart->id_ci }}">
                                <option {{ $product_cart->quantity == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $product_cart->quantity == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $product_cart->quantity == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $product_cart->quantity == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $product_cart->quantity == 5 ? 'selected' : '' }}>5</option>
                            </select>                       
                        </td>  
                        
                        <td class="" style="text-align:center;" width="15%">
                            <?php
                                $sum_total_discount_val += $product_cart->discount_val
                            ?>

                            RM <strong>{{number_format($product_cart->price,2)}}</strong><br><h6 style="color:grey;">(- RM {{number_format($product_cart->discount_val,2)}})</h6>
                        </td>
                        
                        <td class="" style="text-align:center;" width="15%">
                        <?php  
                            $total_discount = $product_cart->price - $product_cart->discount_val;
                            $sum_total_discount += $total_discount
                        ?>
                        
                        <strong style="color: red; font-size: 15px">RM {{number_format($total_discount,2)}}</strong>
                        
                        </td>    

                        <td class="" style="text-align:center;" width="15%">
                        <?php
                            $sum_total_ship_rate += $product_cart->ship_rate
                        ?>



                        @php
                        switch ($product_cart->ship_rate) 
                        {
                            case "0.00":

                                $product_cart->ship_rate = "FREE";
                                break;

                            default:
                                $product_cart->ship_rate;
                        }
                        @endphp

                         {{$product_cart->ship_rate}} <p><u><a href=#><i class="fa fa-building"></i> {{$product_cart->store_name}}</a></u></p></td>
                            <td class="" style="text-align:center;">                    

                            <a href="/removeCart/{{$product_cart->id_ci}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete cart product {{$product_cart->prod_name}} ?')" >
                            <i class="fa fa-remove"></i> Remove</a>

                            <a href="{{url('cart')}}" class="btn btn-success btn-sm"><i class="fa fa-heart"></i> To Wishlist</a>
                      
                            </td>
                        
                    </tr>
                @endforeach

                    </tbody>        
                </table>

                <div style="float:right">
                    <a href="{{url('')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-mail-reply"></i> Continue Shopping</a>

                  <!--   <a href="/emptyCart" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to empty your list of cart?')" >
                    <i class="fa fa-trash-o"></i> Empty Cart</a> -->
                
                    <form action="/emptyCart" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Empty Cart">
                    </form>

                </div>
                
                <table class="table table-hover-cart"></table>

                <hr>
            </div>
            <!-- table responsive -->
        </div>

                <div class="calculation">
 
                <table class="table table-hover-calculation">
                                <td class="" style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Order Amount
                                    <br>

                                    <?php
                                        $grand_order_amount = $sum_total_discount 
                                    ?>
                                    RM<strong style="font-size: 19px"> {{number_format($grand_order_amount,2)}}</strong>
                                </td>
                            
                                <td class="plus" style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Shipping Fee
                                    <br>

                                    <?php
                                         $grand_shipping_amount = $sum_total_ship_rate 
                                    ?>
                                    RM<strong style="font-size: 19px"> {{number_format($grand_shipping_amount,2)}}</strong>
                                </td>

                                <td class="minus" style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Discount Amount
                                    <br>
                                    <?php 
                                        $grand_discount_amount += $sum_total_discount_val
                                    ?>
                                    RM<strong style="font-size: 19px"> {{number_format($grand_discount_amount,2)}}</strong>
                                </td>


                                <td class="total" style="text-align:center; font-size: 19px; background-color: rgba(19, 96, 183, 0.24);" width="25%">                               
                                    Payment Amount
                                    <br >
                                    <?php
                                        $grand_payment_amount = $sum_total_price_quantity
                                    ?>

                                    <strong style="font-size: 19px; color: white">RM {{number_format($grand_payment_amount,2)}}</strong>
                                </td>

                </table>

                <div style="float:right">
                    <a href="{{url('/apply_loan')}}" class="btn btn-info btn-sm">
                    <i class="fa fa-wpforms"></i> Apply Loan  <i class="fa fa-caret-right"></i></a>
                </div>
        </div>
        <!-- end calculation -->

 @else


        <strong style="font-size: 19px"><h3>You have no items in your shopping cart</h3></strong>
        
        <div style="float:right">
            <a href="{{url('')}}" class="btn btn-primary btn-sm">
            <i class="fa fa-mail-reply"></i> Continue Shopping</a>
        </div>

    @endif

<table id="myTable">
    <thead>
        <tr><th>Product name</th><th>Qty</th><th>Price</th>
    <th align="center"><td id="amount" class="amount">Amount</td> </th></tr>
    </thead>
    <tfoot>
        <tr><td colspan="2"></td><td align="right"><td id="total" class="totalprice">TOTAL</td> </td></tr>
    </tfoot>
    <tbody>
    
    <tr>
    	<td>Product 1</td><td>
			<select value="" class="quantity" name="quantity">
			        <option value="1">1</option>
			        <option value="2">2</option>
			</select>
		</td>
		<td>
			<input type="text" value="11.60" class="price">
		</td>
		
		<td align="center"><td id="amount" class="amount">0</td> eur
		</td>
	</tr>

    <tr>
    	<td>Product 2</td>
    	<td>
    		<select value="" class="qty" name="qty">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</td>

		<td>
			<input type="text" value="15.26" class="price">
		</td>


		<td align="center"><td id="amount" class="amount">0</td> eur
		</td>
	</tr>
        
</tbody></table>

@endsection



@section('js_section')

   <script
  src="{{asset('https://code.jquery.com/jquery-1.7.2.js')}}"></script>

<script>
// function format2(n, currency) {
//     return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
// }

$(document).write(function(){

    update_amounts(currency);
    $('.quantity').change(function() {
        update_amounts();
    });
});


function update_amounts(currency)
{
	    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");


    var sum = 0.00;
    $('#myTable > tbody  > tr').each(function() {
        var quantity = $(this).find('option:selected').val();
        var price = $(this).find('.price').val();
        var amount = (quantity*price)
        sum+=amount;
        $(this).find('.amount').text(''+amount);
    });
    //just update the total to sum  
    $('.totalprice').text(sum);
}


<script>

function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

var numbers = [1, 12, 123, 1234, 12345, 123456, 1234567, 12345.67];


document.write("<p>Format #2:</p>");
for (var i = 0; i < numbers.length; i++) {
    document.write(format2(numbers[i], "RM") + "<br />");
}
</script>
