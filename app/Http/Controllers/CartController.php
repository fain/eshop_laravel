<?php

namespace Eshop\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Eshop\Http\Controllers\Controller;

use Eshop\Cart;
use Eshop\CartItem;


// use Alert;
use DB;


class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCart ($productId){

      
        $cartItem  = new Cartitem();

        //original
        // $cart = Cart::where('user_id',Auth::user()->id)->first();

        //2 tested
        // $cart = Cart::where('user_id',Auth::user()->id)
        //             ->leftjoin('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
        //             ->where('product_id', '=', $cartItem->product_id)
        //             ->first();
        $id = Auth::user()->id; 

        $cart = DB::table('carts')
                    ->LEFTJOIN('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                    ->SELECT('cart_items.product_id') 
                    ->WHERE('cart_id', '=', $id)
                    ->WHERE('cart_items.product_id', '=', $productId)
                    ->first();
        
        if (is_null($cart))
        { 
         
            $id = Auth::user()->id;

            $cartItem->product_id=$productId;
            $cartItem->cart_id= $id;
        
            $cartItem->save();
            return redirect('/')->withSuccessMessage('');
        }

        else
        {
           return redirect('/')->withInfoMessage('');
        }

        // if(!$cart){
        //     $cart =  new Cart();
        //     $cart->user_id=Auth::user()->id;
        //     $cart->save();
        // }
        
        //     $cartItem  = new Cartitem();
        //     $cartItem->product_id=$productId;
        //     $cartItem->cart_id= $cart->user_id;
         

        //     $cartItem->save();
        //     return redirect('/')->withSuccessMessage('');




    }

    public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $id = Auth::user()->id;

        $product_cart = DB::table('carts')
                         ->leftjoin('users', 'users.id', '=', 'carts.user_id')
                         ->leftjoin('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                         ->leftjoin('products_info', 'cart_items.product_id', 'products_info.products_id')
                         ->leftjoin('merchants_info', 'products_info.merchant_shipping_id', 'merchants_info.id')
                         ->leftjoin('product_image', 'cart_items.product_id', 'product_image.products_id')
                         ->select('users.name', 'cart_items.*', 'products_info.*', 'merchants_info.*', 'product_image.*', 'cart_items.id as id_ci') 
                         ->WHERE('users.id', '=', $id)
                         ->groupBy('cart_items.product_id')
                         ->get();


        $total_cart = DB::table('carts')
                         ->leftjoin('users', 'users.id', '=', 'carts.user_id')
                         ->leftjoin('cart_items', 'cart_items.cart_id', '=', 'carts.user_id')
                         ->leftjoin('products_info', 'products_info.products_id', '=', 'cart_items.product_id')
                         ->select('users.name', 'cart_items.product_id', 'products_info.*') 
                         ->WHERE('cart_id', '=', $id)
                         ->groupBy('cart_items.product_id')
                         ->count();




        /**Cart total**/                 
        // $items = $cart->cartItems;

        // $total=0;
        // foreach($product_carts as $product_cart){
        //     $total+=$product_cart->price;
        // }

        return view('front.product_carts',
            [
            // 'items' => $items,
            'product_carts' => $product_cart,
            // 'total'=>$total,
            'total_carts' => $total_cart
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCart($id){

        CartItem::destroy($id);
        return redirect('/product_carts')->withSuccessRemoveCartMessage('Product cart has been removed!');
        //->withSuccessRemoveCartMessage('Product cart has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart(){

        CartItem::removeCart();
        return redirect('/product_carts')->withSuccessEmptyCartMessage('');
    }

    

    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        CartItem::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);

    }



}