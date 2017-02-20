@extends('layouts.layout')

@section('content')

    <div class="container">
        <p><a href="{{ url('') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        {{ $prod_name }}

        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach (Cart::content() as $products)
                    <tr>
                        <td class="table-image"><a href="{{ url('', [$products->product->prod_name]) }}"><img src="../{{$products->product->path}}{{$products->product->name}}" alt="product" class="img-responsive cart-image"></a></td>
                        <td><a href="">{{$products->prod_name}}</a></td>
                        <td>
                            <select class="quantity" data-id="{{ $products->rowid }}">
                                <option {{ $products->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $products->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $products->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $products->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $products->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>RM{{$products->subtotal }}   </td>
                        <td class=""></td>
                        <td>
                            <form action="" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            <form action="" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">RM{{ Cart::total() }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <a href="{{ url('') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="/emptyCart" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif
        <div class="spacer"></div>

    </div> 

@endsection

@section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var products_id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '/cart/' + products_id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '/cart';
                  }
                });

            });

        })();

    </script>
@endsection