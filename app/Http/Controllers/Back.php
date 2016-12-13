<?php

namespace Eshop\Http\Controllers;

use Eshop\Merchants;
use Eshop\ProductOptionBridge;
use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Hash;

use Validator;

use Illuminate\Support\Facades\Auth;

use Session;

//for timestamp
use Carbon\Carbon;

//model
use Eshop\State;
use Eshop\User;
use Eshop\UserInfo;
use Eshop\MerchantsInfo;
use Eshop\MerchantsBusDetails;
use Eshop\Category;
use Eshop\Brand;
use Eshop\Product;
use Eshop\ProductInfo;
use Eshop\ProductImage;
use Eshop\Promotion;
use Eshop\ShippingRate;
use Eshop\MerchantShipping;
use Eshop\MerchantReturn;
use Eshop\ProductOption;
use Eshop\ProductOptionGroup;

use Illuminate\Support\Facades\DB;

class Back extends Controller
{
    /*******************************Auth start*********************************/
    public function login(Request $request) {
        return view('back.login', array('title' => 'Eshop - Seller Login Page','description' => '','page' => 'home'));
    }

    public function login_handler(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//        if(Auth::guard('merchants')->attempt(['username' => $request->username, 'password' => $request->password])){
//            return redirect('/');
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect('/backend/home');
        }else{
            $request->session()->flash('danger', 'Your Username or Password might be wrong!');
            return redirect('/backend/login');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flash('success', 'You are successfully logged out!');
        return redirect('/backend/login');
    }
    /*******************************Auth end*********************************/

    /*******************************Reg start*********************************/
    public function register() {

        $states = State::get();

        $content = array(
            'title' => 'Eshop - Seller Registration Page',
            'description' => '',
            'page' => '',
            'ship_states' => $states,
            'rtn_states' => $states);
        return view('back.register', $content);
    }

    public function register_seller(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|unique:users,email',
            'dob' => 'required|date_format:d-m-Y',
            'contact_number' => 'required|numeric|digits_between:10,12',
            'gender' => 'required',
            'store_name' => 'required|max:30|unique:merchants_info,store_name',
            'store_url' => 'required|max:30|unique:merchants_info,store_url',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'pic_name' => 'required|max:100',
            'pic_email' => 'required|max:50|unique:users,email|email',
            'pic_phone' => 'required|numeric|digits_between:10,12',
            'ship_add' => 'required|max:200',
            'ship_state' => 'required',
            'ship_city' => 'required|max:100',
            'ship_pcode' => 'required|max:5',
            'rtn_add' => 'required|max:200',
            'rtn_state' => 'required',
            'rtn_city' => 'required|max:100',
            'rtn_pcode' => 'required|max:5',
        ]);

        $cur_datetime = Carbon::now();

        if ($validator->fails()){
            return redirect('/backend/register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User;
            $user_info = new UserInfo;
            $merchants_info = new MerchantsInfo;
            $merchants_bus_details = new MerchantsBusDetails;
            $merchants_shipping = new MerchantShipping;
            $merchants_return = new MerchantReturn;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_group = "Merchant";
            $user->updated_at = $cur_datetime;
            $user->created_at = $cur_datetime;

            $user->save();

            $user_id = $user->id;

            $user_info->user_id = $user_id;
            $user_info->dob = date("Y-m-d", strtotime($request->dob));
            $user_info->c_number = $request->contact_number;
            $user_info->gender = $request->gender;
            $user_info->updated_at = $cur_datetime;
            $user_info->created_at = $cur_datetime;

            $user_info->save();

            $merchants_info->user_id = $user_id;
            $merchants_info->store_name = $request->store_name;
            $merchants_info->store_url = $request->store_url;
            $merchants_info->status = "Pending";
            $merchants_info->updated_at = $cur_datetime;
            $merchants_info->created_at = $cur_datetime;

            $merchants_info->save();

            $merchants_bus_details->user_id = $user_id;
            $merchants_bus_details->name = $request->pic_name;
            $merchants_bus_details->email = $request->pic_email;
            $merchants_bus_details->phone = $request->pic_phone;
            $merchants_bus_details->updated_at = $cur_datetime;
            $merchants_bus_details->created_at = $cur_datetime;

            $merchants_bus_details->save();

            $merchants_shipping->user_id = $user_id;
            $merchants_shipping->title = "Default";
            $merchants_shipping->set_default = "Y";
            $merchants_shipping->name = $request->pic_name;
            $merchants_shipping->address = $request->ship_add;
            $merchants_shipping->state = $request->ship_state;
            $merchants_shipping->city = $request->ship_city;
            $merchants_shipping->postcode = $request->ship_pcode;
            $merchants_shipping->phone = $request->pic_phone;
            $merchants_shipping->updated_at = $cur_datetime;
            $merchants_shipping->created_at = $cur_datetime;

            $merchants_shipping->save();

            $merchants_return->user_id = $user_id;
            $merchants_return->title = "Default";
            $merchants_return->set_default = "Y";
            $merchants_return->name = $request->pic_name;
            $merchants_return->address = $request->rtn_add;
            $merchants_return->state = $request->rtn_state;
            $merchants_return->city = $request->rtn_city;
            $merchants_return->postcode = $request->rtn_pcode;
            $merchants_return->phone = $request->pic_phone;
            $merchants_return->updated_at = $cur_datetime;
            $merchants_return->created_at = $cur_datetime;

            $merchants_return->save();

            $request->session()->flash('success', 'You had been successfully Registered. Please wait for approval from Us!');
            return redirect('/backend/login');
        }
    }
    /*******************************Reg end*********************************/


    /*******************************Home start*********************************/
    public function home() {
        if(Auth::check()){

            return view('back.home',
                array(
                    'title' => 'Dashboard',
                    'description' => '',
                    'page' => 'home',
                    'mainmenu' => 'dashboard'
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }
    /*******************************Home ends*********************************/

    /*******************************Categories start*********************************/
    public function categories() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();

                return view('back.categories',
                    array(
                        'title' => 'Categories',
                        'page' => 'categories',
                        'treecat' => $treecat,
                        'basecat_url' => '/backend/categories/',
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function categories_more($category) {
        if(Auth::check()){

            $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();
            $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

            $catdetails = Category::where('id', $category)->first();

            return view('back.cat_detail',
                array(
                    'title' => 'Categories',
                    'page' => 'categories',
                    'treecat' => $treecat,
                    'basecat_url' => '/backend/categories/',
                    'maincat' => $maincat,
                    'catdetails' => $catdetails,
                    'currmenu' => $category
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function categories_update(Request $request, Category $category){
        $cattype = $request->type;
        $cur_datetime = Carbon::now();

        if($cattype=="sub"){
            $maincat = $request->main_cat_id;
        }else{
            $maincat = 0;
        }

        $cats = array(
            'name' => $request->name,
            'slug' => $request->slug,
            'menu_set' => $request->menu_set,
            'menu_type' => $cattype,
            'main_category_id' => $maincat,
            'status' => $request->status,
            'description' => $request->description,
            'updated_at' => $cur_datetime,
            'updated_at_ip' => $request->ip
        );

        $category->where('id', $category->id)->update($cats);

        $request->session()->flash('success', 'Category detail successfully updated');
        return redirect('/backend/categories/'.$category->id);
    }

    public function new_cat() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                return view('back.new_cat',
                    array(
                        'title' => 'Add New Categories',
                        'page' => 'categories',
                        'treecat' => $treecat,
                        'maincat' => $maincat,
                        'basecat_url' => '/backend/categories/',
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function new_cat_handler(Request $request, Category $category){
        $cattype = $request->type;
        $cur_datetime = Carbon::now();

        if($cattype=="sub"){
            $maincat = $request->main_cat_id;
        }else{
            $maincat = 0;
        }

        $categories = new Category();

        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->menu_set = $request->menu_set;
        $categories->menu_type = $cattype;
        $categories->main_category_id = $maincat;
        $categories->status = $request->status;
        $categories->description = $request->description;
        $categories->updated_at = $cur_datetime;
        $categories->created_at = $cur_datetime;
        $categories->updated_at_ip = $request->ip;
        $categories->created_at_ip = $request->ip;

        $categories->save();

        $request->session()->flash('success', 'New categories successfully inserted!');
        return redirect('/backend/categories/');
    }

    public function delete_cat($category){
        $categories = new Category();

        $categories->destroy($category);

        Session::flash('success', 'Category had been successfully deleted!');
        return redirect('/backend/categories/');
    }
    /*******************************Categories ends*********************************/

    /*******************************Brand starts*********************************/
    public function brand() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
//                $brandlist = Brand::leftjoin('categories', 'brands.category_id', '=', 'categories.id')
//                    ->select('brands.*', 'categories.name')
//                    ->get();
                $brandlist = DB::table('brands')
                                ->leftjoin('categories', 'brands.category_id', '=', 'categories.id')
                                ->select('brands.*', 'categories.name as catname')
                                ->get();

                return view('back.brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'currmenu' => '',
                        'brandlist' => $brandlist
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function new_brand() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                return view('back.new_brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'maincat' => $maincat,
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function new_brand_handler(Request $request){
        $cur_datetime = Carbon::now();

        $validator = Validator::make($request->all(), [
            'main_category' => 'required',
            'name' => 'required|unique:brands,name'
        ]);

        if ($validator->fails()){
            return redirect('/backend/new_brand')
                ->withErrors($validator)
                ->withInput();
        }else{
            $brands = new Brand();

            if($request->sub_category!=""){
                $cat_id = $request->sub_category;
            }else{
                $cat_id = $request->main_category;
            }

            $brands->category_id = $cat_id;
            $brands->name = $request->name;
            $brands->status = $request->status;
            $brands->updated_at = $cur_datetime;
            $brands->created_at = $cur_datetime;
            $brands->updated_at_ip = $request->ip;
            $brands->created_at_ip = $request->ip;

            $brands->save();

            $request->session()->flash('success', 'New brand successfully inserted!');
            return redirect('/backend/brand/');
        }
    }

    public function edit_brand($brand) {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                $bdetails = DB::table('brands')
                    ->leftjoin('categories', 'brands.category_id', '=', 'categories.id')
                    ->select('brands.*', 'categories.name as catname','categories.id as catid',
                        'categories.main_category_id as cat_maincatid', 'categories.menu_type as cat_menutype')
                    ->where('brands.id', $brand)
                    ->first();

                return view('back.edit_brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'maincat' => $maincat,
                        'bdetails' => $bdetails,
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function edit_brand_handler(Request $request, Brand $brand){
        $cur_datetime = Carbon::now();

        $validator = Validator::make($request->all(), [
            'main_category' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()){
            return redirect('/backend/edit_brand/'.$request->b_id)
                ->withErrors($validator)
                ->withInput();
        }else{
            if($request->sub_category!=""){
                $cat_id = $request->sub_category;
            }else{
                $cat_id = $request->main_category;
            }

            $brnd = array(
                'category_id' => $cat_id,
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => $cur_datetime,
                'updated_at_ip' => $request->ip
            );

            $brand->where('id', $request->b_id)->update($brnd);

            $request->session()->flash('success', 'Brand successfully updated!');
            return redirect('/backend/brand/');
        }
    }

    public function delete_brand($brand){
        $brands = new Brand();

        $brands->destroy($brand);

        Session::flash('success', 'Brand had been successfully deleted!');
        return redirect('/backend/brand/');
    }
    /*******************************Brand ends*********************************/

    /*******************************Product Option start*********************************/
    public function prod_opt_mgmt() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){

                $prod_opt = ProductOption::get();

                $prod_opt_grp = ProductOptionGroup::get();

                return view('back.prod_opt_mgmt_main',
                    array(
                        'title' => 'Product Option Management',
                        'page' => 'prod_opt_mgmt_main',
                        'basecat_url' => '/backend/prod_opt_mgmt/',
                        'currmenu' => '',
                        'prod_opt' => $prod_opt,
                        'prod_opt_grp' => $prod_opt_grp
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function new_prod_opt(Request $request){
        $cur_datetime = Carbon::now();

        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:product_option,slug'
        ]);

        if ($validator->fails()){
            return redirect('/backend/prod_opt_mgmt')
                ->withErrors($validator)
                ->withInput()
                ->with('active_tabs', 'opt');
        }else{
            $prod_opt = new ProductOption();

            $prod_opt->name = $request->name;
            $prod_opt->slug = $request->slug;
            $prod_opt->status = $request->status;
            $prod_opt->updated_at = $cur_datetime;
            $prod_opt->created_at = $cur_datetime;

            $prod_opt->save();

//            $request->session()->push('active_tabs', 'opt');
            $request->session()->flash('success', 'New Product Option successfully inserted!');
            return redirect('/backend/prod_opt_mgmt')->with('active_tabs', 'opt');
        }
    }

    public function edit_prod_opt(Request $request, ProductOption $prod_opt){
        $cur_datetime = Carbon::now();

        $prodopt = array(
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'updated_at' => $cur_datetime
        );

        $prod_opt->where('id', $request->id)->update($prodopt);

        $request->session()->flash('success', 'Product Option successfully updated!');
        return redirect('/backend/prod_opt_mgmt/')->with('active_tabs', 'opt');

    }

    public function delete_prod_opt($prod_opt){
        $prodopt = new ProductOption();

        $prodopt->destroy($prod_opt);

        Session::flash('success', 'Product Option had been successfully deleted!');
        return redirect('/backend/prod_opt_mgmt/')->with('active_tabs', 'opt');
    }

    public function new_prod_opt_grp(Request $request){
        $cur_datetime = Carbon::now();

        $prod_opt_grp = new ProductOptionGroup();

        $prod_opt_grp->name = $request->name;
        $prod_opt_grp->status = $request->status;
        $prod_opt_grp->updated_at = $cur_datetime;
        $prod_opt_grp->created_at = $cur_datetime;

        $prod_opt_grp->save();

        $request->session()->flash('success', 'New Product Option successfully inserted!');
        return redirect('/backend/prod_opt_mgmt');
    }

    public function prod_opt_mgmt_edit($id) {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){

                $prod_opt = ProductOption::get();

                $prod_opt_grp = ProductOptionGroup::get();

                $prod_group_detail = ProductOptionGroup::where('id', '=', $id)->first();

                $prod_opt_in = $prod_group_detail->prod_opt;
                $list_opt = "";

                if(isset($prod_opt_in) && $prod_opt_in!=""){
                    $arr_opt = explode(",", $prod_opt_in);

                    $len = (count($arr_opt))-1;

                    for($i=0; $i<=$len; $i++){
                        $list_opt[] = ProductOption::where('id', '=', $arr_opt[$i])->select('id', 'name')->first();
                    }
                }

                $prod_opt_actv = ProductOption::where('status', '=', 'A')->get();

                foreach($prod_opt_actv as $poa){
                    $arr[] = array($poa->id => $poa->name);
                }

                return view('back.prod_opt_mgmt_main',
                    array(
                        'title' => 'Product Option Management',
                        'page' => 'prod_opt_mgmt_main',
                        'basecat_url' => '/backend/prod_opt_mgmt/',
                        'currmenu' => '',
                        'prod_opt' => $prod_opt,
                        'prod_opt_grp' => $prod_opt_grp,
                        'prod_group_detail' => $prod_group_detail,
                        'prod_opt_actv' => $prod_opt_actv,
                        'dropdown' => $arr,
                        'list_opt' => $list_opt
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function prod_opt_mgmt_update_handler(Request $request, ProductOptionGroup $prod_opt_grp){
        $cur_datetime = Carbon::now();

        $prodoptgrp = array(
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => $cur_datetime
        );

        $prod_opt_grp->where('id', $request->id)->update($prodoptgrp);

        $request->session()->flash('success', 'Product Option Group successfully updated!');
        return redirect('/backend/prod_opt_mgmt/'.$request->id);

    }

    public function delete_prod_grp($prod_opt_grp){
        $prodoptgrp = new ProductOptionGroup();

        $prodoptgrp->destroy($prod_opt_grp);

        Session::flash('success', 'Product Option Group had been successfully deleted!');
        return redirect('/backend/prod_opt_mgmt/');
    }

    public function prod_opt_handler(Request $request, ProductOptionGroup $prod_opt_grp){
        $cur_datetime = Carbon::now();

        $total_item = $request->total_item;

        for($i = 1; $i<=$total_item; $i++){
            $arr_opt[] = $request->input('opt'.$i);
        }

        $comma_separated = implode(",", $arr_opt);

        $prodoptgrp = array(
            'prod_opt' => $comma_separated,
            'updated_at' => $cur_datetime
        );

        $prod_opt_grp->where('id', $request->grp_id)->update($prodoptgrp);

        $request->session()->flash('success', 'Product Option Group successfully updated!');
        return redirect('/backend/prod_opt_mgmt/'.$request->grp_id);

    }

    public function delete_opt_from_grp($g_id, $id){
        $cur_datetime = Carbon::now();
//        $prodoptgrp = new ProductOptionGroup();

        $prod_opt_list = ProductOptionGroup::where('id', '=', $g_id)->first();

        $arr_list = explode(',', $prod_opt_list->prod_opt);

        foreach ($arr_list as $ar){
            if($ar!=$id){
                $arr_updtd[] = $ar;
            }
        }

        if(isset($arr_updtd)){
            $comma_separated = implode(",", $arr_updtd);
        }else{
            $comma_separated = "";
        }

        $prodoptgrp = array(
            'prod_opt' => $comma_separated,
            'updated_at' => $cur_datetime
        );

        $prod_opt_list->where('id', $g_id)->update($prodoptgrp);

        Session::flash('success', 'Product Option Group list successfully updated!');
        return redirect('/backend/prod_opt_mgmt/'.$g_id);
    }
    /*******************************Product Option end*********************************/

    /*******************************Product Listing start*********************************/
    public function product_listing() {
        if(Auth::check()){

            $productlist = DB::table('products')
                ->leftjoin('products_info', 'products.id', '=', 'products_info.products_id')
                ->leftjoin('product_image', function($q){
                    $q->on('products.id', '=', 'product_image.products_id')
                        ->where('product_image.primary_img', '=', 'Y');
                })
                ->leftjoin('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.id as p_id', 'categories.name as prod_cat',
                         'product_image.id as img_id',
                         'product_image.name as img_name', 'product_image.path as img_path',
                         'products_info.prod_name as prod_name', 'products_info.type as prod_type',
                         'products_info.prod_code as prod_code', 'products_info.price as prod_price',
                         'products_info.stock_quantity as quantity',
                         DB::raw('(CASE WHEN products_info.selling_period_end > CURDATE() THEN "Active" ELSE "In-Active" END) AS prod_status'))
                ->get();

            return view('back.product_listing',
                array(
                    'title' => 'Product Listing',
                    'page' => 'product_listing',
                    'basecat_url' => '/backend/product_listing/',
                    'currmenu' => '',
                    'mainmenu' => 'product',
                    'product_list' => $productlist
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function new_product() {
        if(Auth::check()){

            $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

            $states = State::get();
            $merchant_shipping = DB::table('merchant_shipping')
                ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
                ->select('merchant_shipping.*', 'state.name as state_name')
                ->get();

            $def_ship_add = DB::table('merchant_shipping')
                ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
                ->where('set_default', '=', 'Y')
                ->select('merchant_shipping.*', 'state.name as state_name')
                ->first();

            $prod_opt_actv = ProductOption::where('status', '=', 'A')->get();

            foreach($prod_opt_actv as $poa){
                $arr[] = array($poa->id => $poa->name);
            }

            $prod_opt_group = ProductOptionGroup::where('status', '=', 'A')->get();

            return view('back.new_product',
                array(
                    'title' => 'Product Listing',
                    'page' => 'product_listing',
                    'basecat_url' => '/backend/product_listing/',
                    'currmenu' => '',
                    'mainmenu' => 'product',
                    'maincat' => $maincat,
                    'dropdown' => $arr,
                    'prod_opt_group' => $prod_opt_group,
                    'ship_states' => $states,
                    'merch_ship' => $merchant_shipping,
                    'def_ship_add' => $def_ship_add
                ));
        }else{
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function product_listing_handler(Request $request){

        //Jangan lupa buat validation nanti

        $cur_datetime = Carbon::now();

        $products = new Product();
        $product_info = new ProductInfo();
        $promotions = new Promotion();
        $shipping_rate = new ShippingRate();
        $merchant_shipping = new MerchantShipping();

        if($request->sub_category!=""){
            $cat_id = $request->sub_category;
        }else{
            $cat_id = $request->main_category;
        }

        //get user id
        $userid = Auth::user()->id;

        /*******************************products start*********************************/
        $brands = $request->brand_sel;
        if($brands==""){
            $brands=0;
        }

        $products->category_id = $cat_id;
        $products->brand_id = $brands;
        $products->merchants_id = $userid;
        $products->created_at = $cur_datetime;
        $products->updated_at = $cur_datetime;
        $products->created_at_ip = $request->ip;
        $products->updated_at_ip = $request->ip;

        $products->save();
        /*******************************products end*********************************/

        //last insert id in products
        $product_id = $products->id;

        /*******************************product image start*********************************/
        $images = $request->file('images');
        $image_count = count($images);

        $uploadcount = 0;

        //make directory
        mkdir("uploads/". $product_id ."/");

        foreach($images as $file) {
            $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);

            $destinationPath = 'uploads/'.$product_id.'/';
            $filename = $file->getClientOriginalName();

            if($validator->passes()){
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount ++;
            }

            $product_image = new ProductImage();

            $product_image->products_id = $product_id;

            if($uploadcount==1){
                $product_image->primary_img = "Y";
            }

            $product_image->name = $filename;
            $product_image->path = $destinationPath;
            $product_image->created_at = $cur_datetime;
            $product_image->updated_at = $cur_datetime;

            $product_image->save();
        }

        if($uploadcount == $image_count){
//            Session::flash('success', 'Upload successfully');
//            return Redirect::to('upload');
        }
        /*******************************product image end*********************************/

        /*******************************product info start*********************************/
        $product_info->products_id = $product_id;
        $product_info->type = $request->sales_type;
        $product_info->prod_name = $request->name;

        $prod_code = $request->prod_code;
        if($prod_code==""){
            $prod_code=NULL;
        }

        $product_info->prod_code = $prod_code;
        $product_info->short_details = $request->short_details;
        $product_info->details = $request->details;
        $product_info->gst_type = $request->gst_type;
        $product_info->selling_period_set = $request->selling_period_set;

        $period_day = $request->selling_period_day;
        if($period_day==""){
            $period_day=NULL;
        }

        $product_info->selling_period_day = $period_day;

        $period_start = $request->selling_period_start;
        if($period_start==""){
            $period_start = NULL;
        }else{
            $period_start = date("Y-m-d", strtotime($request->selling_period_start));
        }

        $product_info->selling_period_start = $period_start;

        $period_end = $request->selling_period_end;
        if($period_end==""){
            $period_end = NULL;
        }else{
            $period_end = date("Y-m-d", strtotime($request->selling_period_end));
        }

        $product_info->selling_period_end = $period_end;
        $product_info->price = $request->price;

        $tier_price = $request->tier_price;
        if($tier_price==""){
            $tier_price = NULL;
        }

        $product_info->tier_price = $tier_price;

        $inst_price = $request->inst_price;
        if($inst_price==""){
            $inst_price = NULL;
        }

        $product_info->inst_price = $inst_price;

        $discount_set = $request->discount_set;
        if($discount_set==""){
            $discount_set = 'N';
        }

        $product_info->discount_set = $discount_set;

        $discount_sel = $request->discount_sel;
        if($discount_sel==""){
            $discount_sel=NULL;
        }

        $product_info->discount_sel = $discount_sel;

        $discount_val = $request->discount_val;
        if($discount_val==""){
            $discount_val = NULL;
        }

        $product_info->discount_val = $discount_val;

        $discount_period_set = $request->discount_period_set;
        if($discount_period_set==""){
            $discount_period_set=NULL;
        }

        $product_info->discount_period_set = $discount_period_set;

        $discount_period_start = $request->discount_period_start;
        if($discount_period_start==""){
            $discount_period_start = NULL;
        }else{
            $discount_period_start = date("Y-m-d", strtotime($request->discount_period_start));
        }

        $product_info->discount_period_start = $discount_period_start;

        $discount_period_end = $request->discount_period_end;
        if($discount_period_end==""){
            $discount_period_end = NULL;
        }else{
            $discount_period_end = date("Y-m-d", strtotime($request->discount_period_end));
        }

        $product_info->discount_period_end = $discount_period_end;
        $product_info->weight = $request->weight;
        $product_info->stock_quantity = $request->stock_quantity;

        //product option belum ada
        $product_info->option_id = NULL;

        //merchant shipping belum ada
        $product_info->merchant_shipping_id = NULL;
        $product_info->merchant_return_id = NULL;


        $product_info->shipping_method = $request->shipping_method;
        $product_info->ship_rate = $request->ship_rate;

        //shipping rate belum buat
        $product_info->ship_rate_id = NULL;

        $after_sale_serv = $request->after_sale_serv;
        if($after_sale_serv==""){
            $after_sale_serv=NULL;
        }

        $product_info->after_sale_serv = $after_sale_serv;
        $product_info->return_policy = $request->return_policy;

        $promo_set = $request->promo_set;
        if($promo_set==""){
            $promo_set='N';
        }

        $product_info->promo_set = $promo_set;

        //promotion belum ada
        $product_info->promo_id = NULL;

        $product_info->created_at = $request->$cur_datetime;
        $product_info->updated_at = $request->$cur_datetime;
        /*******************************product info end*********************************/

        $product_info->save();

        $request->session()->flash('success', 'New product successfully inserted!');
        return redirect('/backend/product_listing/');
    }
    /*******************************Product Listing ends*********************************/
}
