@extends('layouts.layout')
@section('content')

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
<script src="{{asset('js/sweetalert.min.js')}}"></script>

@include('sweet::alert')

@include('shared.topbar')

@if (session()->has('success_move_wishlist_message'))
    <script>
    swal({   
        title: "Successfully moved!",
        text: "Product has been moved to your wishlist!",         
        // type: "success",
        imageUrl: 'images/error/wishlist.jpg',
        timer: 2000
      }); 
    </script>
@endif

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




@if (session()->has('error_message'))
    <div class="alert alert-danger alert-dismissible" style="font-weight:bold">
        {{ session()->get('error_message') }}
    </div>
@endif


<div class="page-header">
    <h1 style="margin-left:-910px; margin-bottom:-20px;">Shopping Cart </h1>
    <img src="images/cart/cart list.png" class="cart_list" alt="" />
</div>



<!-- Steps Circular Progress - START --> 
    <div class="row" style="margin-right:5px; margin-left:5px">
        
        <div class="row step" style="margin-right:-8px; margin-left:-8px">
            <div id="div1" class="col-md-2" onclick="javascript: resetActive(event, 0, 'step-1');">
                <span class="fa fa-search"></span>
                <p style="color: black;" >Browse Catalogue</p>
            </div>
            <div id="step2" class="col-md-2 activestep" onclick="javascript: resetActive(event, 20, 'step-2');">
                <span class="fa fa-cart-plus"></span>
                <p style="color: black;">Cart Product</p>
            </div>
            <div id="step3" class="col-md-2" onclick="javascript: resetActive(event, 40, 'step-3');">
                <span class="fa fa-pencil-square-o"></span>
                <p style="color: black;">Apply Loan</p>
            </div>
            <div id="step4" class="col-md-2" onclick="javascript: resetActive(event, 60, 'step-4');">
                <span class="fa fa-upload"></span>
                <p style="color: black;">Submit Loan</p>
            </div>
            <div id="step5" class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-5');">
                <span class="fa fa-handshake-o"></span>
                <p style="color: black;">Approvement Status</p>
            </div>
            <div id="finish" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-6');">
                <span class="fa fa-check-circle-o"></span>
                <p style="color: black;">Submit Order</p>
            </div>
        </div>

        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="col-xs-4 col-md-3 col-lg-3 step">
                <div id="progress" class="col-xs-12 col-md-4 col-lg-4" style="width: 190px; height: 190px;">
                </div>
            </div>

            <div class="col-xs-12 col-md-9 col-lg-9">
                
                <div class="row setup-content step hiddenStepInfo" id="step-1">
                    <div class="col-xs-12">
                        <div class="well text-center" style="width:1050px; height:700px; margin-left:-90px">
                            <h1>STEP 1</h1>
                            <h3 class="underline">Instructions</h3>
                            Download the application form from our repository.
                            This may require logging in.
                        </div>
                    </div>
                </div>

                <div class="row setup-content activeStepInfo" id="step-2">
                    <div>
                        <div class="well" style="width:1050px; height:550px; margin-left:-90px; margin-top:10">
                            <h4 class="underline" style="text-align:left;">STEP 2: Shopping List</h4>
                                
                                <small style="color:black; text-align:left;">The products added to your shopping cart will be stored for maximum 30 days.
                                </small>
                               
                                @if (session()->has('success_remove_cart_message'))
                                <div class="alert alert-success alert-dismissible" style="font-weight:bold">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      {{ session()->get('success_remove_cart_message') }}
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
                                            <th style="text-align:center;"></th>
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
                                            <td class="" width="45%">
                                                <a href="/removeCart/{{$product_cart->id_ci}}" data-toggle="tooltip" data-placement="top" data-html="true" 
                                                title="Remove" class="btn btn-sm" onclick="return confirm('Are you sure to delete product cart {{$product_cart->prod_name}} ?')" >

                                                <i class="fa fa-remove"></i></a>

                                                <table style="float: right"><img src="../../{{$product_cart->path}}{{$product_cart->name}}" class="product-wishlist"/></table> 
                                                {{$product_cart->prod_name}}


                                            </td>          
                                                
                                            <td class="" width="7%">
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
                                            
                                            <td class="" style="text-align:center;" width="15%">
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
                                                            
                                            <td class="" style="text-align:center;" width="15%">
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
                                                <i class="fa fa-question-circle-o" aria-hidden="true"></i></a>

                                                {{$product_cart->ship_rate}} 
                                               
                                                <p><u><a href=#> {{$product_cart->store_name}}</a></u></p>
                                            </td>
                                                
                                             <td class="" style="text-align:center;" width="">                    
                                                <a href="/switchToWishlist/{{$product_cart->products_id}}" data-toggle="tooltip" data-placement="top" data-html="true" 
                                                title="Move to wishlist"><i class="fa fa-heart-o fa-1x"></i></a>
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
                          

                                    </div>
                                        
                                    <table class="table table-hover-cart"></table>

                                    <hr>
                                </div><!-- table responsive -->

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
                                    </div><!-- end calculation -->

                                @else

                                    <strong><h3>You have no items in your shopping cart</h3></strong>
                                    
                                    <div style="float:right">
                                        <a href="{{url('')}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-mail-reply"></i> Continue Shopping</a>
                                    </div>

                                @endif
                        </div>
                    </div>
                </div>
            </div>

                <div class="row setup-content step hiddenStepInfo" id="step-3">
                    <div>
                        <div class="well text-center" style="width:1050px; height:700px; margin-left:-90px">
                            <h1>STEP 3</h1>
                            <h3 class="underline">Instructions</h3>
                            Check to ensure that all data entered is valid. 
                        </div>
                    </div>
                </div>
                <div class="row setup-content step hiddenStepInfo" id="step-4">
                    <div>
                        <div class="well text-center" style="width:1050px; height:700px; margin-left:-90px">
                            <h1>STEP 4</h1>
                            <h3 class="underline">Instructions</h3>
                            Pay the application fee. 
                    This can be done either by entering your card details, or by using Paypal.
                        </div>
                    </div>
                </div>
                <div class="row setup-content step hiddenStepInfo" id="step-5">
                    <div>
                        <div class="well text-center" style="width:1050px; height:700px; margin-left:-90px">
                            <h1>STEP 5</h1>
                            <h3 class="underline">Instructions</h3>
                            Upload the application. 
                    This may require a confirmation email.
                        </div>
                    </div>
                </div>
                <div class="row setup-content step hiddenStepInfo" id="step-6">
                    <div>
                        <div class="well text-center" style="width:1050px; height:700px; margin-left:-90px">
                            <h1>STEP 6</h1>
                            <h3 class="underline">Instructions</h3>
                            Send us feedback on the overall process. 
                    This step is not obligatory.
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<style>
.hiddenStepInfo {
    display: none;
}

.activeStepInfo {
    display: block !important;
}

.underline {
    text-decoration: underline;
}

.step {
    margin-top: 27px;
    text-align: center;
}    

.step .col-md-2 {
    background-color: #fff;
    border: 1px solid #C0C0C0;
    border-right: none;
}

.step .col-md-2:last-child {
    border: 1px solid #C0C0C0;
}

.step .col-md-2:first-child {
    border-radius: 5px 0 0 5px;
}

.step .col-md-2:last-child {
    border-radius: 0 5px 5px 0;
}

.step .col-md-2:hover {
    /*color: #1e98e4;*/
    cursor: pointer;
}

.step .col-md-2:focus {
    color: #F58723;
    cursor: pointer;
}

.step .activestep {
    color: #F58723;
    height: 100px;
    margin-top: -7px;
    padding-top: 7px;
    border-left: 6px solid #25BB22 !important;
    border-right: 6px solid #25BB22 !important;
    border-top: 3px solid #25BB22 !important;
    border-bottom: 3px solid #25BB22 !important;
    vertical-align: central;
}

.step .fa {
    padding-top: 15px;
    font-size: 40px;
}
</style>

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
