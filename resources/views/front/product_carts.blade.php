@extends('layouts.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<script src="{{asset('js/sweetalert.min.js')}}"></script>

@include('sweet::alert')

@include('shared.topbar')
<!-- row-->
<div class="row">

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

                

                <table id="myCart" class="table table-hover-cart">
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
                    $total_order = 0;
                    $total_discount=0;
                    $total_ship_rate = 0;
                    $grand_payment_amount = 0;
                    
                ?>  
            
                @foreach($product_carts as $product_cart)
                    <tr> 
                        <td class="" width="30%">
                            <table style="float: right"><img src="../../{{$product_cart->path}}{{$product_cart->name}}" class="product-wishlist"/></table> 
                            {{$product_cart->prod_name}}
                        </td>          
                        
                        <td class="" width="5%">
                            <select value="" class="quantity" name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select> 
                        </td>  
                        
                        <td class="" style="text-align:center;" width="10%">
                       
                            <strong>RM {{number_format($product_cart->price,2)}}</strong>
                            <input type="hidden" value="{{ $product_cart->price }}" class="price">
                            
                            <br>
                            <h6 style="color:grey;">
                                (- RM {{number_format($product_cart->discount_val,2)}})
                                  <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" 
                                            title="<b>Product Discount: RM</b>
                                                {{number_format($product_cart->discount_val,2)}}" >

                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                <input type="hidden" value="{{ $product_cart->discount_val }}" class="discount_val">
                            </h6>
                        </td>
                                        

                        <td class="" style="text-align:center;" width="10%">
                            <?php  
                                $total_discount = $product_cart->price - $product_cart->discount_val;
                            ?>
                            
                            <strong style="color: red; font-size: 15px">RM {{number_format($total_discount,2)}}</strong>
                            
                        </td>  


                        <td class="" style="text-align:center;" width="15%">

                            <input type="hidden" value="{{ $product_cart->ship_rate }}" class="ship_rate">

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

                         {{$product_cart->ship_rate}} 
                            <a href="#" data-toggle="tooltip" data-placement="right" data-html="true" 
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
                            <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>

                        <p><u><a href=#><i class="fa fa-building"></i> {{$product_cart->store_name}}</a></u></p>
                     </td>
                            
                        <td class="" style="text-align:center;" width="15%">                    

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

                    <a href="/emptyCart" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to empty your list of cart?')" >
                    <i class="fa fa-trash-o"></i> Empty Cart</a>
                
                <!--     <form action="/emptyCart" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Empty Cart">
                    </form> -->

                </div>
                
                <table class="table table-hover-cart"></table>

                <hr>
            </div>
            <!-- table responsive -->
        </div>

                <div class="calculation">
 
                <table class="table table-hover-calculation">
                                <td style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Order Amount
                                    <br>

                                   
                                    RM <strong id="total_order" class="totalorder" style="font-size: 19px"> {{number_format($total_order,2)}}</strong>
                                </td>
                            
                                <td class="plus" style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Shipping Fee
                                    <br>

                                    RM <strong id="total_ship_rate" class="totalshiprate" style="font-size: 19px"> {{number_format($total_ship_rate,2)}}</strong>
                                </td>

                                <td class="minus" style="text-align:center; font-size: 19px; background-color: #f5f5f5" width="25%">  
                                    Discount Amount
                                    <br>
                                    
                                    RM <strong id="total_discount" class="totaldiscount" style="font-size: 19px"> {{number_format($total_discount,2)}}</strong>
                                </td>


                                <td class="total" style="text-align:center; font-size: 19px; background-color: rgba(19, 96, 183, 0.24);" width="25%">                               
                                    Payment Amount
                                    <br>

                                    RM <strong id="grand_payment_amount" class="grandpaymentamount" style="font-size: 19px; color: white"> {{number_format($grand_payment_amount,2)}}</strong>
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


<form id="example-form" action="#">
    <div>
        <h3>Account</h3>
        <section>
            <label for="userName">User name *</label>
            <input id="userName" name="userName" type="text" class="required">
            <label for="password">Password *</label>
            <input id="password" name="password" type="text" class="required">
            <label for="confirm">Confirm Password *</label>
            <input id="confirm" name="confirm" type="text" class="required">
            <p>(*) Mandatory</p>
        </section>
        <h3>Profile</h3>
        <section>
            <label for="name">First name *</label>
            <input id="name" name="name" type="text" class="required">
            <label for="surname">Last name *</label>
            <input id="surname" name="surname" type="text" class="required">
            <label for="email">Email *</label>
            <input id="email" name="email" type="text" class="required email">
            <label for="address">Address</label>
            <input id="address" name="address" type="text">
            <p>(*) Mandatory</p>
        </section>
        <h3>Hints</h3>
        <section>
            <ul>
                <li>Foo</li>
                <li>Bar</li>
                <li>Foobar</li>
            </ul>
        </section>
        <h3>Finish</h3>
        <section>
            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
        </section>
    </div>
</form>

@endsection



@section('js_section')


<!-- Quantity update -->
<script src="{{asset('https://code.jquery.com/jquery-1.7.2.js')}}"></script>




<script>
$(document).ready(function(){

    update_amounts();
    $('.quantity').change(function() {
        update_amounts();
    });
});

function update_amounts()
{
    var sum = 0.00;
    var sum_total_discount = 0.00;
    var sum_total_ship_rate = 0.00;
    var grand_payment_amount = 0.00;


    $('#myCart > tbody  > tr').each(function() {
        //Order Price
        var quantity = $(this).find('option:selected').val();

        var price = $(this).find('.price').val();
        var amount = (quantity*price);

        sum += amount;
        $(this).find('.amount').text(''+amount.toLocaleString('en-US', {minimumFractionDigits: 2}));

        //Order Discount
        var discount_val = $(this).find('.discount_val').val();
        var total_discount = (quantity*discount_val);
        sum_total_discount += total_discount;

        //Ship Rate
        var ship_rate = $(this).find('.ship_rate').val();
        var product_ship_rate = (ship_rate*1);
        sum_total_ship_rate += product_ship_rate;


        //Grand Payment
        grand_payment_amount = (sum + sum_total_ship_rate)- sum_total_discount;

    });

    //just update the total to sum  
    $('.totalorder').text(sum.toLocaleString('en-US', {minimumFractionDigits: 2}));
    $('.totaldiscount').text(sum_total_discount.toLocaleString('en-US', {minimumFractionDigits: 2}));
    $('.totalshiprate').text(sum_total_ship_rate.toLocaleString('en-US', {minimumFractionDigits: 2}));

    $('.grandpaymentamount').text(grand_payment_amount.toLocaleString('en-US', {minimumFractionDigits: 2}));

}
</script>
