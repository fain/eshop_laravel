@extends('layouts.layout')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="cart_items"><!-- cart -->

             
                <h2 class="title text-center">My Cart</h2>
            
                @if (session()->has('success_message'))
                <div class="alert alert-success alert-dismissible" style="font-size: 20; font-weight:bold">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('success_message') }}
                </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger alert-dismissible" style="font-size: 20; font-weight:bold">
                        {{ session()->get('error_message') }}
                    </div>
                @endif

              <div class="table-responsive">

@if (sizeof($product_carts) > 0)  

                <table class="table table-hover-cart">
                <thead>
                   <tr>
                        <th scope class="" style="text-align:center;">Product</th>
                        <th scope class="" style="text-align:center;">Qty</th>
                        <th scope class="" style="text-align:center;">Price</th>
                        <th scope class="" style="text-align:center;">Discounted Price</th>
                        <th scope class="" style="text-align:center;">Shipping Fee/Seller</th>
                        <th scope class="" style="text-align:center;">Manage</th>
                    </tr>
                </thead>
                <tbody>
               
                @foreach($product_carts as $product_cart)

                    <tr>
                        <td class="">
                            <table style="float: right"><img src="../../{{$product_cart->path}}{{$product_cart->name}}" class="product-wishlist"/></table> 
                            {{$product_cart->prod_name}}
                        </td>          
                        <td class="" width="5%">
                            <select class="quantity" data-id="{{ $product_cart->id_ci }}">
                                <option {{ $product_cart->quantity == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $product_cart->quantity == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $product_cart->quantity == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $product_cart->quantity == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $product_cart->quantity == 5 ? 'selected' : '' }}>5</option>
                            </select>                       
                        </td>  
                        <td class="" style="text-align:center;">RM <strong>{{number_format($product_cart->price,2)}}</strong><br><h6 style="color:grey;">(- RM {{$product_cart->discount_val}})</h6></td>
                        <td class="" style="text-align:center;">
                            <?php $total = 0 ?>

                            <?php  $total = $product_cart->price - $product_cart->discount_val ?>

                             <strong style="color: red; font-size: 15px">RM {{number_format($total,2)}}</strong>

                        </td>    
                        <td class="" style="text-align:center;">{{$product_cart->ship_rate}} <p><u><a href=#><i class="fa fa-building"></i> {{$product_cart->store_name}}</a></u></p></td>
                        <td class="" style="text-align:center;">

                            <a href="/removeCart/{{$product_cart->id_ci}}" class="btn btn-danger btn-sm" name="delete_product_cart" onclick="return confirm('Are you sure to delete this Product?')">
                            <i class="fa fa-remove"></i> Remove</a>
                            
                            <a href="{{url('cart')}}" class="btn btn-warning btn-sm"><i class="fa fa-shopping-bag"></i> To Wishlist</a>
                       </td>
                    </tr>


                @endforeach

                            <table class="table table-hover-cart">
                                <thead>
                                   <tr>
                                        <th scope class="" style="text-align:center;">Order Amount</th>
                                        <th scope class="" style="text-align:center;">Shipping Fee</th>
                                        <th scope class="" style="text-align:center;">Discount Amount</th>
                                        <th scope class="" style="text-align:center;">Payment Amount</th>
                                        <th scope class="" style="text-align:center;"></th>
                                        <th scope class="" style="text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                    </tr>
                                </tbody>
                            </table>

                        </tr>
                    </tbody>
                </table>
    
<div style="float:right">
    <a href="/emptyCart" class="btn btn-danger btn-sm" name="delete_product_cart" onclick="return confirm('Are you sure to empty your list of cart?')">
    <i class="fa fa-trash-o"></i> Empty Cart</a>
</div>

            @else




            </div>


<h3>You have no items in your shopping cart</h3>
<a href="{{url('')}}" class="btn btn-primary btn-lg">Continue Shopping</a>


@endif
        </div>
    </div>
</div>

@endsection