<?php

namespace Eshop\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Eshop\Http\Controllers\Controller;

use Eshop\Cart;
use Eshop\CartItem;
use Eshop\Category;
use Eshop\WishlistItem;

use DB;


class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCart ($productId){

        $cartItem  = new Cartitem();

        $id = Auth::user()->id; 

        $cart = DB::table('carts')
                    ->LEFTJOIN('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                    ->SELECT('cart_items.product_id') 
                    ->WHERE('cart_id', '=', $id)
                    ->WHERE('cart_items.product_id', '=', $productId)
                    ->first();

        $wishlist = DB::table('wishlists')
                    ->LEFTJOIN('wishlist_items', 'wishlists.user_id', '=', 'wishlist_items.wishlist_id')
                    ->SELECT('wishlist_items.product_id') 
                    ->WHERE('wishlist_id', '=', $id)
                    ->WHERE('wishlist_items.product_id', '=', $productId)
                    ->first();            
        
        if (is_null($cart) && is_null($wishlist))
        { 
         
            $id = Auth::user()->id;

            $cartItem->product_id=$productId;
            $cartItem->cart_id= $id;
        
            $cartItem->save();
            return redirect('/')->withSuccessCartMessage('');
        }
        elseif (isset($wishlist))
        {
            return redirect('/')->withInfoWishlistMessage('');
        }
        else
        {
            return redirect('/')->withInfoCartMessage('');
        }
    }

    public function showCart(Request $request){
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

        $product_wishlist = DB::table('wishlists')
                         ->leftjoin('users', 'users.id', '=', 'wishlists.user_id')
                         ->leftjoin('wishlist_items', 'wishlists.user_id', '=', 'wishlist_items.wishlist_id')
                         ->leftjoin('products_info', 'wishlist_items.product_id', 'products_info.products_id')
                         ->leftjoin('merchants_info', 'products_info.merchant_shipping_id', 'merchants_info.id')
                         ->leftjoin('product_image', 'wishlist_items.product_id', 'product_image.products_id')
                         ->select('users.name', 'wishlist_items.*', 'products_info.*', 'merchants_info.*', 'product_image.*', 'wishlist_items.id as id_wi') 
                         ->WHERE('users.id', '=', $id)
                         ->groupBy('wishlist_items.product_id')
                         ->get();


        $total_cart = DB::table('carts')
                         ->leftjoin('users', 'users.id', '=', 'carts.user_id')
                         ->leftjoin('cart_items', 'cart_items.cart_id', '=', 'carts.user_id')
                         ->leftjoin('products_info', 'products_info.products_id', '=', 'cart_items.product_id')
                         ->select('users.name', 'cart_items.product_id', 'products_info.*') 
                         ->WHERE('cart_id', '=', $id)
                         ->groupBy('cart_items.product_id')
                         ->count();


        $treecats = Category::where('main_category_id', 0)
                                ->where('menu_type', 'main')
                                ->with('subcat')
                                ->get();

        return view('front.product_carts',
            [
            'product_carts' => $product_cart,
            'product_wishlists' => $product_wishlist,
            'total_carts' => $total_cart,
            'treecat' => $treecats
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
        // // Validation on max quantity
        // $validator = Validator::make($request->all(), [
        //     'quantity' => 'required|numeric|between:1,5'
        // ]);

        //  if ($validator->fails()) {
        //     session()->flash('error_message', 'Quantity must be between 1 and 5.');
        //     return response()->json(['success' => false]);
        //  }

        // CartItem::update($id, $request->quantity);
        // session()->flash('success_message', 'Quantity was updated successfully!');
        // return response()->json(['success' => true]);
    
    }

    /**
     * Switch item from cart to wishlist.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($productId)
    {
       
        $wishlistItem  = new Wishlistitem();

        $cartItem = new Cartitem();
        $cartItem->destroy($productId);

        $id = Auth::user()->id; 
        $wishlist = DB::table('wishlists')
                    ->LEFTJOIN('wishlist_items', 'wishlists.user_id', '=', 'wishlist_items.wishlist_id')
                    ->SELECT('wishlist_items.product_id') 
                    ->WHERE('wishlist_id', '=', $id)
                    ->WHERE('wishlist_items.product_id', '=', $productId)
                    ->first();

        $switchWishlist = CartItem::where("product_id", "=", $productId)->first();

        if (is_null($wishlist) && isset($switchWishlist))
        { 
         
            $id = Auth::user()->id;

            $wishlistItem->product_id=$productId;
            $wishlistItem->wishlist_id= $id;
        
            $wishlistItem->save();
            $switchWishlist->delete();

            return redirect('/product_carts')->withSuccessMoveWishlistMessage('');
        }
    }

    public function saveOrder(Request $request) 
    {
        $cartItem = new Cartitem();
        $cartItem->where('cart_id', '=', $request->cart_id)
                ->update(['quantity' => 'quantity - '. $request->quantity]);
        
        return redirect('order');
    }


}