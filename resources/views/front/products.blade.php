@extends('layouts.layout')

@section('content') 
    <div id='msg'></div>
   


    <section>
        <div class="container">

            <div class="row">
                <div class="col-sm-12">

                {{$product->products_id}}

                {{$product->prod_name}}
                <form action="/cart" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="products_id" value="{{ $product->products_id }}">
                    <input type="hidden" name="prod_name" value="{{ $product->prod_name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>



                   </div>
            </div>
        </div>
        </div>
    </section>
@endsection