<?php

namespace Eshop\Http\Controllers;

use Eshop\User;
use Eshop\UserInfo;

use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\Cart;
use Eshop\Brand;
use Eshop\Merchants;
use Eshop\MerchantsInfo;
use Eshop\Category;
use Eshop\Product;
use Eshop\ProductInfo;
use Eshop\ShippingRate;
use Eshop\ProductImage;
use Eshop\Wishlist;


use Eshop\Http\Controllers\Controller;


use Eshop\Post;

use Validator;
use Session;


//for timestamp
use Carbon\Carbon;

use Alert;
use DB;

class Front extends Controller {

    var $shipping_rate;
    var $brands;
    var $merchants;
    var $merchantsinfo;
    var $categories;
    var $products;
    var $productinfo;
    var $products_image;
    var $title;
    var $description;

    public function __construct() {
        $this->brands = Brand::all(array('name'));
        $this->merchantsinfo = MerchantsInfo::all(array('id', 'store_name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','category_id','brand_id', 'merchants_id'));
        $this->shipping_rate = ShippingRate::all(array('id'));
        $this->products_image = ProductImage::all(array('id'));
        $this->carts = Cart::all(array('id'));
        $this->wishlists = Wishlist::all(array('id'));
        $this->products_info = ProductInfo::all(array('id'));



    }

    // As a Guest
    public function shop() {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->get();

    // top sale change where to high profit
       $product_top_sale = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'Top Sale')
                                ->get();

       $product_new = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'New')
                                ->get();                                

       $product_used = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'Used')
                                ->get();                                

       $product_pre_order = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'categories.*', 'products_info.*', 'product_image.*', 'categories.name as main_cat',  'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'Pre-Order')
                                ->get();   

       $twenty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '20%')
                                ->first();  

       $thirty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '30%')
                                ->first();  

        $fifty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '50%')
                                ->first();  

        
        $seventy_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '70%')
                                ->first();  

        $treecats = Category::where('main_category_id', 0)
                                ->where('menu_type', 'main')
                                ->with('subcat')
                                ->get();

        $brand_main_category = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->groupBy('main_cat')
                                     ->orderBy('categories.id')
                                     ->get(); 


        $brand_by_electronic = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Electronics')
                                     ->WHERE('products.category_id', '=', 15)
                                     ->groupBy('brands.name')
                                     ->get(); 


        $brand_by_women = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Women\`s Fashion')
                                     ->WHERE('products.category_id', '=', 17)
                                     ->groupBy('brands.name')
                                     ->get(); 

        $brand_by_men = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Men\`s Fashion')
                                     ->WHERE('products.category_id', '=', 19)
                                     ->groupBy('brands.name')
                                     ->get(); 


        $total_wishlist_by_user = DB::table('users')
                                     ->leftjoin('user_info', 'user_info.user_id', '=', 'users.id')
                                     ->leftjoin('wishlists', 'wishlists.user_id', '=', 'user_info.user_id')
                                     ->select('users.*', 'user_info.gender', 'wishlists.product_id') 
                                     ->WHERE('users.id', '=', 3)
                                     ->groupBy('wishlists.product_id')
                                     ->count();
                                     
     
        return view('front.home',
            array(
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'home',
                'brands' => $this->brands, 
                'merchantsinfo' => $this->merchantsinfo,
                'categories' => $this->categories,
                'products' => $product,
                'products_top_sale' => $product_top_sale,
                'products_new' => $product_new,
                'products_used' => $product_used,
                'products_pre_order' => $product_pre_order,
                'products_image' => $this->products_image,
                'twentypercent_off' => $twenty_off,
                'thirtypercent_off' => $thirty_off,
                'fiftypercent_off' => $fifty_off,
                'seventypercent_off' => $seventy_off,
                'treecat' => $treecats,
                'brands_by_electronics' => $brand_by_electronic,
                'brands_by_womens' => $brand_by_women,
                'brands_by_mens' => $brand_by_men, 
                'brands_main_categories' => $brand_main_category,
                'total_wishlists' => $total_wishlist_by_user



            )
        );

    }


    // After user login
    public function index() {
    $product = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                            ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                            ->where('product_image.primary_img', '=', 'Y')
                            ->get();

    // top sale change where to high profit
    $product_top_sale = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                            ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                            ->where('product_image.primary_img', '=', 'Y')
                            ->where('products_info.type', '=', 'Top Sale')
                            ->get();

    $product_new = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                            ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                            ->where('product_image.primary_img', '=', 'Y')
                            ->where('products_info.type', '=', 'New')
                            ->get();                                

    $product_used = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                            ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                            ->where('product_image.primary_img', '=', 'Y')
                            ->where('products_info.type', '=', 'Used')
                            ->get();                                

    $product_pre_order = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                            ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                            ->select('products.*', 'brands.*', 'categories.*', 'products_info.*', 'product_image.*', 'categories.name as main_cat',  'brands.name as p_brand')
                            ->where('product_image.primary_img', '=', 'Y')
                            ->where('products_info.type', '=', 'Pre-Order')
                            ->get();   

    $twenty_off = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->select('products.*', 'brands.*', 'products_info.*')
                            ->where('products_info.discount_sel', '=', '20%')
                            ->first();  

    $thirty_off = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->select('products.*', 'brands.*', 'products_info.*')
                            ->where('products_info.discount_sel', '=', '30%')
                            ->first();  

    $fifty_off = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->select('products.*', 'brands.*', 'products_info.*')
                            ->where('products_info.discount_sel', '=', '50%')
                            ->first();  


    $seventy_off = DB::table('products')
                            ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                            ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                            ->select('products.*', 'brands.*', 'products_info.*')
                            ->where('products_info.discount_sel', '=', '70%')
                            ->first();  

    $treecats = Category::where('main_category_id', 0)
                            ->where('menu_type', 'main')
                            ->with('subcat')
                            ->get();

    $brand_main_category = DB::table('products')
                                 ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                 ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                 ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                 ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                 DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                 ->groupBy('main_cat')
                                 ->orderBy('categories.id')
                                 ->get(); 


    $brand_by_electronic = DB::table('products')
                                 ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                 ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                 ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                 ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                 DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                 ->WHERE('categories.name', '<>', 'Electronics')
                                 ->WHERE('products.category_id', '=', 15)
                                 ->groupBy('brands.name')
                                 ->get(); 


    $brand_by_women = DB::table('products')
                                 ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                 ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                 ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                 ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                 DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                 ->WHERE('categories.name', '<>', 'Women\`s Fashion')
                                 ->WHERE('products.category_id', '=', 17)
                                 ->groupBy('brands.name')
                                 ->get(); 

    $brand_by_men = DB::table('products')
                                 ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                 ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                 ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                 ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                 DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                 ->WHERE('categories.name', '<>', 'Men\`s Fashion')
                                 ->WHERE('products.category_id', '=', 19)
                                 ->groupBy('brands.name')
                                 ->get(); 


    $total_wishlist_by_user = DB::table('users')
                                 ->leftjoin('user_info', 'user_info.user_id', '=', 'users.id')
                                 ->leftjoin('wishlists', 'wishlists.user_id', '=', 'user_info.user_id')
                                 ->select('users.*', 'user_info.gender', 'wishlists.product_id') 
                                 ->WHERE('users.id', '=', 3)
                                 ->groupBy('wishlists.product_id')
                                 ->count();

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

      

        return view('front.home',
            array(
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'home',
                'brands' => $this->brands, 
                'merchantsinfo' => $this->merchantsinfo,
                'categories' => $this->categories,
                'products' => $product,
                'products_top_sale' => $product_top_sale,
                'products_new' => $product_new,
                'products_used' => $product_used,
                'products_pre_order' => $product_pre_order,
                'products_image' => $this->products_image,
                'twentypercent_off' => $twenty_off,
                'thirtypercent_off' => $thirty_off,
                'fiftypercent_off' => $fifty_off,
                'seventypercent_off' => $seventy_off,
                'treecat' => $treecats,
                'brands_by_electronics' => $brand_by_electronic,
                'brands_by_womens' => $brand_by_women,
                'brands_by_mens' => $brand_by_men, 
                'brands_main_categories' => $brand_main_category,
                'total_wishlists' => $total_wishlist_by_user,
                'product_carts' => $product_cart

            )
        );

    }

    public function products($id) {
        
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.products_id', '=', $id)
                                ->first();

        

        return view('front.products',
            array('title' => 'Products Listing',
             'description' => '',
                'page' => 'home',
                'product' => $product

                
            ));
    }

    //As guest
    public function details($productId) {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('shipping_rate', 'shipping_rate.id', '=', 'products.id')
                                ->select('products.*', 'products_info.*', 'brands.*', 'products_info.prod_name as p_name', 'shipping_rate.*')
                                ->where('products_info.products_id', '=', $productId)
                                ->first();

          
        return view('front.product_details', 
            array( 
                'title' => $product->p_name,
                'description' => '',
                'page' => 'products',
                'product' => $product           
                ));
    }

    //As logged in user
    public function product_details($id, $productId) {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('shipping_rate', 'shipping_rate.id', '=', 'products.id')
                                ->select('products.*', 'products_info.*', 'brands.*', 'products_info.prod_name as p_name', 'shipping_rate.*')
                                ->where('products_info.products_id', '=', $productId)
                                ->first();

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
      
        return view('front.product_details', 
            array( 
                'title' => $product->p_name,'description' => '',
                'page' => 'products',
                'product' => $product,
                'product_carts' => $product_cart               


                
                ));
    }

 

    public function product_wishlists($id) {

        $id = Auth::user()->id;
        $user_wishlist = DB::table('users')
                                     ->leftjoin('user_info', 'user_info.user_id', '=', 'users.id')
                                     ->leftjoin('wishlists', 'wishlists.user_id', '=', 'user_info.user_id')
                                     ->leftjoin('products_info', 'wishlists.product_id', 'products_info.products_id')
                                     ->leftjoin('merchants_info', 'products_info.merchant_shipping_id', 'merchants_info.id')
                                     ->leftjoin('product_image', 'wishlists.product_id', 'product_image.products_id')
                                     ->select('users.*', 'user_info.*', 'wishlists.*', 'products_info.*', 'merchants_info.*', 'product_image.*', 'wishlists.id as pw_id') 
                                     ->WHERE('users.id', '=', $id)
                                     ->groupBy('wishlists.product_id')
                                     ->get();

      
        return view('front.product_wishlists', 
            array( 
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'product_wishlists',
                'user_wish_list'  => $user_wishlist

                
                ));
    }

 
    //  public function delete_product_wishlist($pw_id) {

    //     $wishlist = Wishlist::where('product_id', '=', $pw_id)->first();

    //     dd($wishlist);

    //         alert('satu');
    //         if(isset($wishlist)){
    //         $wishlist->delete();
    //         alert('dua');
    //     }

    //     Session::flash('warning', 'Product wishlist had been successfully deleted!');
    //     return redirect('/products/wishlists/{id}', Auth::user()->id);
    // }

    //     public function delete_product_wishlist($pw_id) {

    //             $wishlists =  Wishlist::where('id', $pw_id)->delete();
    //             dd($wishlists);

    // }

    public function delete_product_wishlist($pw_id) {
     $wishlists = Wishlist::where('id', '=', $pw_id)->first();
          

        
        dd($wishlists);

        Session::flash('warning', 'Product wishlist had been successfully deleted!');
        return redirect('/products/wishlists/{id}', Auth::user()->id);
    }


 public function apply_loan() {
      
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

        return view('front.apply_loan',
            array(
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'apply_loan',
                                'product_carts' => $product_cart               


            )
        );

    }

   
    public function product_merchants($id) {
        $merchantinfo = DB::table('merchantsinfo')
                                ->leftjoin('merchants', 'merchants.id', '=', 'merchantsinfo.id')
                                ->first();

    }
    public function product_categories($name) {
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_brands($name, $category = null) {
   
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        return view('front.blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog_post($url) {
        $post = Post::whereUrl($url)->first();

        $tags = $post->tags;
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $brands = $this->brands;
        $categories = $this->categories;
        $products = $this->products;

        $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'merchants', 'categories', 'products');

        return view('front.blog_post', $data);
    }
    
    public function contact_us() {
        return view('front.contact_us', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'contact_us'));
    }

    public function login() {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->first();

      
        return view('front.login',
         array('title' => 'Log in or Sign Up',
            'description' => '',
            'page' => '',
            'brands' => $this->brands,
            'merchantsinfo' => $this->merchantsinfo,
            'categories' => $this->categories
            )
         );
    }

    public function login_handler(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//        if(Auth::guard('merchants')->attempt(['username' => $request->username, 'password' => $request->password])){
//            return redirect('/');
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect('/');
        }else{
            $request->session()->flash('danger', 'Your Username or Password might be wrong!');
            return redirect('/login');
        }
    }

    public function register() {
        return view('front.register', array('title' => 'Register new account','description' => '','page' => ''));
    }

    public function register_handler(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|unique:merchants_info,email',
            'dob' => 'required|date_format:d-m-Y',
            'gender' => 'required',
            'c_number' => 'required|numeric|digits_between:10,12',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ]);

        $cur_datetime = Carbon::now();

        if ($validator->fails()){
            return redirect('/auth/register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User;
            $user_info = new UserInfo;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_group = "Customer";
            $user->updated_at = $cur_datetime;
            $user->created_at = $cur_datetime;

            $user->save();

            $user_id = $user->id;

            $user_info->user_id = $user_id;
            $user_info->dob = date("Y-m-d", strtotime($request->dob));
            $user_info->gender = $request->gender;
            $user_info->c_number = $request->c_number;
            $user_info->updated_at = $cur_datetime;
            $user_info->created_at = $cur_datetime;

            $user_info->save();

            $request->session()->flash('success', 'You had been successfully Registered. You can log in now.');
            return redirect('/auth/login');
        }
    }

    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key)
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('front.profile', ['orders' => $orders]);
        
    }

    public function logout(){
        Auth::logout();
        Session::flash('success', 'You are successfully logged out!');
        return redirect('/auth/login');
    }

   
    public function checkout() {
        return view('front.checkout', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'home'));
    }

    public function search($query) {
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products'));
    }
}
