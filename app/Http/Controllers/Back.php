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

use PHPExcel;
use PHPExcel_IOFactory;

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

 //            if(Brand::hasFile('image')){
 //    $brands = Brand::file('image');
 //    $brands = $file->move(public_path().'brand_uploads/". $id ."/',$file->getOriginalFileName());
 //    $brands->path = $file->getRealPath();
 // }

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

            $merchant_return = DB::table('merchant_return')
                ->leftjoin('state', 'state.id', '=', 'merchant_return.state')
                ->select('merchant_return.*', 'state.name as state_name')
                ->get();

            $def_ship_add = DB::table('merchant_shipping')
                ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
                ->where('set_default', '=', 'Y')
                ->select('merchant_shipping.*', 'state.name as state_name')
                ->first();

            $def_rtn_add = DB::table('merchant_return')
                ->leftjoin('state', 'state.id', '=', 'merchant_return.state')
                ->where('set_default', '=', 'Y')
                ->select('merchant_return.*', 'state.name as state_name')
                ->first();

            $prod_opt_actv = ProductOption::where('status', '=', 'A')->get();

            foreach($prod_opt_actv as $poa){
                $arr[] = array($poa->id => $poa->name);
            }

            $prod_opt_group = ProductOptionGroup::where('status', '=', 'A')->get();

            return view('back.new_product',
                array(
                    'title' => 'Add New Product',
                    'page' => 'add_new_product',
                    'basecat_url' => '/backend/product_listing/',
                    'currmenu' => '',
                    'mainmenu' => 'product',
                    'maincat' => $maincat,
                    'dropdown' => $arr,
                    'prod_opt_group' => $prod_opt_group,
                    'ship_states' => $states,
                    'merch_ship' => $merchant_shipping,
                    'merch_rtn' => $merchant_return,
                    'def_ship_add' => $def_ship_add,
                    'def_rtn_add' => $def_rtn_add
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
//        $promotions = new Promotion();
//        $shipping_rate = new ShippingRate();
//        $merchant_shipping = new MerchantShipping();

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
//            $filename = $file->getClientOriginalName();
            $temp = explode(".", $file->getClientOriginalName());
            $ext = strtolower(end($temp));
            $newfilename = rand(10000, 990000) . '_' . time() . '.' . $ext;

            if($validator->passes()){
//                $upload_success = $file->move($destinationPath, $filename);
                $upload_success = $file->move($destinationPath, $newfilename);
                $uploadcount ++;
            }

            $product_image = new ProductImage();

            $product_image->products_id = $product_id;

            if($uploadcount==1){
                $product_image->primary_img = "Y";
            }

//            $product_image->name = $filename;
            $product_image->name = $newfilename;
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

        //product option done

        $arr_opt_id_g = $request->opt_id_g;
        $arr_opt_info_g = $request->opt_info;

        $arr_opt_id_m = $request->opt;
        $arr_opt_info_m = $request->info;

        $opt_g = count($arr_opt_id_g);
        $opt_m = count($arr_opt_id_m);

        if($opt_g>0){
            for($i=0; $i<=$opt_g-1; $i++){
                $newObj[] = '{"typeid": "'.$arr_opt_id_g[$i].'", "info": "'.$arr_opt_info_g[$i].'"}';
            }

            $product_info->option_id = json_encode($newObj);
        }
        elseif ($opt_m>0){
            for($i=0; $i<=$opt_m-1; $i++){
                $newObj[] = '{"typeid": "'.$arr_opt_id_m[$i].'", "info": "'.$arr_opt_info_m[$i].'"}';
            }

            $product_info->option_id = json_encode($newObj);
        }
        else{
            $product_info->option_id = NULL;
        }


        //merchant shipping done
        $product_info->merchant_shipping_id = $request->shipping_add_id;
        $product_info->merchant_return_id = $request->return_add_id;

        $product_info->shipping_method = $request->shipping_method;

        $ship_rate = $request->ship_rate;
        if($ship_rate=="ByProd"){
            $product_info->ship_rate = $ship_rate;

            $ship_rate = new ShippingRate();
            $ship_rate->products_id = $product_id;
            $ship_rate->wm_kg = $request->wm_kg;
            $ship_rate->wm_rm = $request->wm_rm;
            $ship_rate->add_wm_kg = $request->add_wm_kg;
            $ship_rate->add_wm_rm = $request->add_wm_rm;
            $ship_rate->sbh_kg = $request->sbh_kg;
            $ship_rate->sbh_rm = $request->sbh_rm;
            $ship_rate->add_sbh_kg = $request->add_sbh_kg;
            $ship_rate->add_sbh_rm = $request->add_sbh_rm;
            $ship_rate->srk_kg = $request->srk_kg;
            $ship_rate->srk_rm = $request->srk_rm;
            $ship_rate->add_srk_kg = $request->add_srk_kg;
            $ship_rate->add_srk_rm = $request->add_srk_rm;

            $ship_rate->cond_ship = $request->cond_ship;

            $cond_ship = $request->cond_ship;
            $cond_disc = $request->cond_disc;
            $cond_disc_for_purch = $request->cond_disc_for_purch;
            $cond_free = $request->cond_free;

            if($cond_ship=="D"){
                $ship_rate->cond_disc = $cond_disc;
                $ship_rate->cond_disc_for_purch = $cond_disc_for_purch;

                $ship_rate->cond_free = NULL;
            }else if($cond_ship=="F"){
                $ship_rate->cond_disc = NULL;
                $ship_rate->cond_disc_for_purch = NULL;

                $ship_rate->cond_free = $cond_free;
            }else{
                $ship_rate->cond_disc = NULL;
                $ship_rate->cond_disc_for_purch = NULL;
                $ship_rate->cond_free = NULL;
            }

            $ship_rate->updated_at = $cur_datetime;
            $ship_rate->created_at = $cur_datetime;

            $ship_rate->save();

            $ship_rate_id = $ship_rate->id;
            //shipping rate done

            $product_info->ship_rate_id = $ship_rate_id;
        }else{
            $product_info->ship_rate = $ship_rate;
        }

        $after_sale_serv = $request->after_sale_serv;
        if($after_sale_serv==""){
            $after_sale_serv=NULL;
        }

        $product_info->after_sale_serv = $after_sale_serv;
        $product_info->return_policy = $request->return_policy;

        $promo_set = $request->promo_set_val;
        if($promo_set==""){
            $promo_set='N';
            $product_info->promo_id = NULL;
        }
        
        if($promo_set=="Y"){
            $promo = new Promotion();
            $promo->products_id = $product_id;
            $promo->promo_text = $request->promo_text;
            $promo->country_origin = $request->country_origin;
            $promo->mul_pur_disc_set = $request->mul_pur_disc_set;
            $promo->mul_pur_disc_item = $request->mul_pur_disc_item;
            $promo->mul_pur_disc_sel = $request->mul_pur_disc_sel;
            $promo->mul_pur_disc = $request->mul_pur_disc;
            $promo->mul_pur_disc_period_set = $request->mul_pur_disc_period_set;
            $promo->mul_pur_period_start = date("Y-m-d", strtotime($request->mul_pur_period_start));
            $promo->mul_pur_period_end = date("Y-m-d", strtotime($request->mul_pur_period_end));
            $promo->min_pur = $request->min_pur;
            $promo->min_pur_val = $request->min_pur_val;
            $promo->max_pur = $request->max_pur;
            $promo->max_per_ord = $request->max_per_ord;
            $promo->max_per_pers = $request->max_per_pers;
            $promo->ad_sel = $request->ad_sel;
            $promo->ad_start = date("Y-m-d", strtotime($request->ad_start));
            $promo->ad_end = date("Y-m-d", strtotime($request->ad_end));
            $promo->created_at = $cur_datetime;
            $promo->updated_at = $cur_datetime;

            $promo->save();

            $promo_id = $promo->id;
            //promotion done
            $product_info->promo_id = $promo_id;
        }

        $product_info->promo_set = $promo_set;

        $product_info->created_at = $cur_datetime;
        $product_info->updated_at = $cur_datetime;
        /*******************************product info end*********************************/

        $product_info->save();

        $request->session()->flash('success', 'New product successfully inserted!');
        return redirect('/backend/product_listing/');
    }
    /*******************************Product Listing ends*********************************/

    /*******************************Edit Product start*********************************/
    public function edit_product($product){
        if(Auth::check()){

            $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

            $states = State::get();

            $merchant_shipping = DB::table('merchant_shipping')
                ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
                ->select('merchant_shipping.*', 'state.name as state_name')
                ->get();

            $merchant_return = DB::table('merchant_return')
                ->leftjoin('state', 'state.id', '=', 'merchant_return.state')
                ->select('merchant_return.*', 'state.name as state_name')
                ->get();

            $prod_opt_actv = ProductOption::where('status', '=', 'A')->get();

            foreach($prod_opt_actv as $poa){
                $arr[] = array($poa->id => $poa->name);
            }

            $prod_opt_group = ProductOptionGroup::where('status', '=', 'A')->get();

            /*******************************Get all product info start*********************************/
            $product_by_id = DB::table('products')
                ->leftjoin('products_info', 'products.id', '=', 'products_info.products_id')
                ->where('products.id', '=', $product)
                ->select('products.*', 'products_info.*', 'products.id as pid', 'products_info.id as pinfoid')
                ->first();

            if($product_by_id->brand_id!=="" || $product_by_id->brand_id!=0){
                $bdetails = DB::table('brands')
                    ->leftjoin('categories', 'brands.category_id', '=', 'categories.id')
                    ->select('brands.id as brand_id', 'categories.name as catname','categories.id as catid',
                        'categories.main_category_id as cat_maincatid', 'categories.menu_type as cat_menutype')
                    ->where('brands.id', $product_by_id->brand_id)
                    ->first();
            }else{
                $bdetails = DB::table('categories')
                    ->select('name as catname','id as catid',
                        'main_category_id as cat_maincatid', 'menu_type as cat_menutype')
                    ->where('id', $product_by_id->category_id)
                    ->first();
            }

            $images = ProductImage::where("products_id", "=", $product)->get();

            $def_ship_add = DB::table('merchant_shipping')
                ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
                ->where('merchant_shipping.id', '=', $product_by_id->merchant_shipping_id)
                ->select('merchant_shipping.*', 'state.name as state_name')
                ->first();

            $def_rtn_add = DB::table('merchant_return')
                ->leftjoin('state', 'state.id', '=', 'merchant_return.state')
                ->where('merchant_return.id', '=', $product_by_id->merchant_return_id)
                ->select('merchant_return.*', 'state.name as state_name')
                ->first();

            $ship_rate_byprod = "";

            if($product_by_id->ship_rate=="ByProd"){
                $ship_rate_byprod = ShippingRate::where("id", "=", $product_by_id->ship_rate_id)->first();
            }

            $promo = "";

            if($product_by_id->promo_set=="Y"){
                $promo = Promotion::where("id", "=", $product_by_id->promo_id)->first();
            }


            /*******************************Get all product info end*********************************/

            return view('back.edit_product',
                array(
                    'title' => 'Edit Product',
                    'page' => 'edit_product',
                    'basecat_url' => '/backend/product_listing/',
                    'currmenu' => '',
                    'mainmenu' => 'product',
                    'maincat' => $maincat,
                    'dropdown' => $arr,
                    'prod_opt_group' => $prod_opt_group,
                    'ship_states' => $states,
                    'merch_ship' => $merchant_shipping,
                    'merch_rtn' => $merchant_return,
                    'def_ship_add' => $def_ship_add,
                    'def_rtn_add' => $def_rtn_add,

                    'product_by_id' => $product_by_id,
                    'bdetails' => $bdetails,
                    'images' => $images,
                    'ship_rate_byprod' => $ship_rate_byprod,
                    'promo' => $promo
                ));
        }else{
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }
    /*******************************Edit Product end*********************************/

    public function delete_product($pid){
        $prod = new Product();
        $prod->destroy($pid);

        $prod_info = ProductInfo::where("products_id", "=", $pid)->first();
        if(isset($prod_info)){
            $prod_info->delete();
        }

        $prod_image = ProductImage::where("products_id", "=", $pid)->first();
        if(isset($prod_image)){
            $prod_image->delete();
        }

        $promo = Promotion::where("products_id", "=", $pid)->first();
        if(isset($promo)){
            $promo->delete();
        }

        $ship_rate_by_prod = ShippingRate::where("products_id", "=", $pid)->first();
        if(isset($ship_rate_by_prod)){
            $ship_rate_by_prod->delete();
        }

        Session::flash('warning', 'Product had been successfully deleted!');
        return redirect('/backend/product_listing/');
    }

    public function product_listing_handler_update(Request $request){

        //Jangan lupa buat validation nanti

        $cur_datetime = Carbon::now();

        if($request->sub_category!=""){
            $cat_id = $request->sub_category;
        }else{
            $cat_id = $request->main_category;
        }

        //get user id
        $userid = Auth::user()->id;
        $product_id = $request->product_id;

        /*******************************products start*********************************/
        $brands = $request->brand_sel;
        if($brands==""){
            $brands=0;
        }

        $products = new Product();

        $products_arr = array(
            'category_id' => $cat_id,
            'brand_id' => $brands,
            'merchants_id' => $userid,
            'updated_at' => $cur_datetime,
            'updated_at_ip' => $request->ip
        );

        $products->where('id', $product_id)->update($products_arr);
        /*******************************products end*********************************/

        /*******************************product image start*********************************/
        $images = $request->file('images');
        $image_count = count($images);

        if(isset($images)){
            $uploadcount = 0;

            //make directory
            $dirPath = "uploads/". $product_id ."/";

            //Check if the directory already exists.
            if(!is_dir($dirPath)){
                //Directory does not exist, so lets create it.
                mkdir($dirPath, 0755);
            }

            $i = 1;

            foreach($images as $file) {
                $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);

                $destinationPath = 'uploads/'.$product_id.'/';
                $temp = explode(".", $file->getClientOriginalName());
                $ext = strtolower(end($temp));
                $newfilename = rand(10000, 990000) . '_' . time() . '.' . $ext;
//                $filename = $file->getClientOriginalName();

                if($validator->passes()){
                    $upload_success = $file->move($destinationPath, $newfilename);
//                    $upload_success = $file->move($destinationPath, $filename);
                    $uploadcount ++;
                }

                $product_image = new ProductImage();

                $primary_img = NULL;

                if($uploadcount==1){
                    $primary_img = "Y";
                }



                $img_id = $request->input("image_".$i);

                if($img_id != ""){
                    $product_image_arr = array(
                        'products_id' => $product_id,
                        'primary_img' => $primary_img,
//                        'name' => $filename,
                        'name' => $newfilename,
                        'path' => $destinationPath,
                        'updated_at' => $cur_datetime
                    );

                    $product_image->where('id', $img_id)->update($product_image_arr);
                }
                else{
                    $product_image->products_id = $product_id;
                    $product_image->primary_img = $primary_img;
//                    $product_image->name = $filename;
                    $product_image->name = $newfilename;
                    $product_image->path = $destinationPath;
                    $product_image->created_at = $cur_datetime;
                    $product_image->updated_at = $cur_datetime;

                    $product_image->save();
                }
                $i++;
            }

            if($uploadcount == $image_count){
//            Session::flash('success', 'Upload successfully');
//            return Redirect::to('upload');
            }
        }
        /*******************************product image end*********************************/

        /*******************************product info start*********************************/
        $product_info = new ProductInfo();

        $prod_code = $request->prod_code;
        if($prod_code==""){
            $prod_code=NULL;
        }

        $period_day = $request->selling_period_day;
        if($period_day==""){
            $period_day=NULL;
        }

        $period_start = $request->selling_period_start;
        if($period_start==""){
            $period_start = NULL;
        }else{
            $period_start = date("Y-m-d", strtotime($request->selling_period_start));
        }

        $period_end = $request->selling_period_end;
        if($period_end==""){
            $period_end = NULL;
        }else{
            $period_end = date("Y-m-d", strtotime($request->selling_period_end));
        }

        $tier_price = $request->tier_price;
        if($tier_price==""){
            $tier_price = NULL;
        }

        $inst_price = $request->inst_price;
        if($inst_price==""){
            $inst_price = NULL;
        }

        $discount_set = $request->discount_set;
        if($discount_set==""){
            $discount_set = 'N';
        }

        $discount_sel = $request->discount_sel;
        if($discount_sel==""){
            $discount_sel=NULL;
        }

        $discount_val = $request->discount_val;
        if($discount_val==""){
            $discount_val = NULL;
        }

        $discount_period_set = $request->discount_period_set;
        if($discount_period_set==""){
            $discount_period_set=NULL;
        }

        $discount_period_start = $request->discount_period_start;
        if($discount_period_start==""){
            $discount_period_start = NULL;
        }else{
            $discount_period_start = date("Y-m-d", strtotime($request->discount_period_start));
        }

        $discount_period_end = $request->discount_period_end;
        if($discount_period_end==""){
            $discount_period_end = NULL;
        }else{
            $discount_period_end = date("Y-m-d", strtotime($request->discount_period_end));
        }

        /**-----------------------------prod option start-------------------------------**/
        //product option done
        $arr_opt_id_g = $request->opt_id_g;
        $arr_opt_info_g = $request->opt_info;

        $arr_opt_id_m = $request->opt;
        $arr_opt_info_m = $request->info;

        $arr_opt_id_o = $request->type_opt;
        $arr_opt_id_info_o = $request->info_opt;

        $opt_g = count($arr_opt_id_g);
        $opt_m = count($arr_opt_id_m);
        $opt_o = count($arr_opt_id_o);

        $opt_id = NULL;

        if($opt_g>0){
            for($i=0; $i<=$opt_g-1; $i++){
                $newObj[] = '{"typeid": "'.$arr_opt_id_g[$i].'", "info": "'.$arr_opt_info_g[$i].'"}';
            }

            $opt_id = json_encode($newObj);
        }
        elseif ($opt_m>0){
            for($i=0; $i<=$opt_m-1; $i++){
                $newObj[] = '{"typeid": "'.$arr_opt_id_m[$i].'", "info": "'.$arr_opt_info_m[$i].'"}';
            }

            $opt_id = json_encode($newObj);
        }elseif ($opt_o>0){
            for($i=0; $i<=$opt_o-1; $i++){
                $newObj[] = '{"typeid": "'.$arr_opt_id_o[$i].'", "info": "'.$arr_opt_id_info_o[$i].'"}';
            }

            $opt_id = json_encode($newObj);
        }
        /**-----------------------------prod option end-------------------------------**/

        /**-----------------------------merchant shipping start-------------------------------**/
        //merchant shipping done

        //shipping rate done
        $ship_rate_id = NULL;

        $ship_rate = $request->ship_rate;
        if($ship_rate=="ByProd"){
            $shiping_rate = new ShippingRate();

            $cond_ship = $request->cond_ship;
            $cond_disc = $request->cond_disc;
            $cond_disc_for_purch = $request->cond_disc_for_purch;
            $cond_free = $request->cond_free;

            $cond_disc_val = NULL;
            $cond_disc_for_purch_val = NULL;
            $cond_free_val = NULL;

            if($cond_ship=="D"){
                $cond_disc_val = $cond_disc;
                $cond_disc_for_purch_val = $cond_disc_for_purch;

                $cond_free_val = NULL;

            }else if($cond_ship=="F"){
                $cond_disc_val = NULL;
                $cond_disc_for_purch_val = NULL;

                $cond_free_val = $cond_free;
            }

            $ship_rate_id = $request->ship_rate_id_val;

            if($ship_rate_id != ""){
                $ship_rate_arr = array(
                    'products_id' => $product_id,
                    'wm_kg' => $request->wm_kg,
                    'wm_rm' => $request->wm_rm,
                    'add_wm_kg' => $request->add_wm_kg,
                    'add_wm_rm' => $request->add_wm_rm,
                    'sbh_kg' => $request->sbh_kg,
                    'sbh_rm' => $request->sbh_rm,
                    'add_sbh_kg' => $request->add_sbh_kg,
                    'add_sbh_rm' => $request->add_sbh_rm,
                    'srk_kg' => $request->srk_kg,
                    'srk_rm' => $request->srk_rm,
                    'add_srk_kg' => $request->add_srk_kg,
                    'add_srk_rm' => $request->add_srk_rm,

                    'cond_ship' => $request->cond_ship,

                    'cond_disc' => $cond_disc_val,
                    'cond_disc_for_purch' => $cond_disc_for_purch_val,
                    'cond_free' => $cond_free_val,

                    'updated_at' => $cur_datetime
                );

                $shiping_rate->where('id', $ship_rate_id)->update($ship_rate_arr);
            }
            else{
                $shiping_rate->products_id = $product_id;
                $shiping_rate->wm_kg = $request->wm_kg;
                $shiping_rate->wm_rm = $request->wm_rm;
                $shiping_rate->add_wm_kg = $request->add_wm_kg;
                $shiping_rate->add_wm_rm = $request->add_wm_rm;
                $shiping_rate->sbh_kg = $request->sbh_kg;
                $shiping_rate->sbh_rm = $request->sbh_rm;
                $shiping_rate->add_sbh_kg = $request->add_sbh_kg;
                $shiping_rate->add_sbh_rm = $request->add_sbh_rm;
                $shiping_rate->srk_kg = $request->srk_kg;
                $shiping_rate->srk_rm = $request->srk_rm;
                $shiping_rate->add_srk_kg = $request->add_srk_kg;
                $shiping_rate->add_srk_rm = $request->add_srk_rm;

                $shiping_rate->cond_ship = $request->cond_ship;

                $shiping_rate->cond_disc = $cond_disc_val;
                $shiping_rate->cond_disc_for_purch = $cond_disc_for_purch_val;
                $shiping_rate->cond_free = $cond_free_val;

                $shiping_rate->updated_at = $cur_datetime;
                $shiping_rate->created_at = $cur_datetime;

                $shiping_rate->save();

                $ship_rate_id = $shiping_rate->id;
                //shipping rate done
            }
        }
        /**-----------------------------merchant shipping end-------------------------------**/

        $after_sale_serv = $request->after_sale_serv;
        if($after_sale_serv==""){
            $after_sale_serv=NULL;
        }

        $promo_set = $request->promo_set_val;
        if($promo_set==""){
            $promo_set='N';
            $product_info->promo_id = NULL;
        }

        /**-----------------------------Promotion start-------------------------------**/
        $mul_pur_disc_set = $request->mul_pur_disc_set;
        if($mul_pur_disc_set == ""){
            $mul_pur_disc_set = "N";
        }else{
            $mul_pur_disc_set = "Y";
        }

        $mul_pur_disc_item = $request->mul_pur_disc_item;
        if($mul_pur_disc_item == ""){
            $mul_pur_disc_item = NULL;
        }

        $mul_pur_disc = $request->mul_pur_disc;
        if($mul_pur_disc == ""){
            $mul_pur_disc = NULL;
        }

        $mul_pur_disc_period_set = $request->mul_pur_disc_period_set;
        if($mul_pur_disc_period_set == ""){
            $mul_pur_disc_period_set = NULL;
        }

        $min_pur_val = $request->min_pur_val;
        if($min_pur_val == ""){
            $min_pur_val = NULL;
        }

        $mul_pur_period_start = $request->mul_pur_period_start;
        if($mul_pur_period_start==""){
            $mul_pur_period_start = NULL;
        }else{
            $mul_pur_period_start = date("Y-m-d", strtotime($request->mul_pur_period_start));
        }

        $mul_pur_period_end = $request->mul_pur_period_end;
        if($mul_pur_period_end==""){
            $mul_pur_period_end = NULL;
        }else{
            $mul_pur_period_end = date("Y-m-d", strtotime($request->mul_pur_period_end));
        }

        $max_per_ord = $request->max_per_ord;
        if($max_per_ord == ""){
            $max_per_ord = NULL;
        }

        $max_per_pers = $request->max_per_pers;
        if($max_per_pers == ""){
            $max_per_pers = NULL;
        }

        $ad_sel = $request->ad_sel;
        if($ad_sel==""){
            $ad_sel='N';
        }

        $ad_start = $request->ad_start;
        if($ad_start==""){
            $ad_start = NULL;
        }else{
            $ad_start = date("Y-m-d", strtotime($request->ad_start));
        }

        $ad_end = $request->ad_end;
        if($ad_end==""){
            $ad_end = NULL;
        }else{
            $ad_end = date("Y-m-d", strtotime($request->ad_end));
        }

        $promo_id_val = NULL;

        if($promo_set=="Y"){
            $promo = new Promotion();

            $promo_id_val = $request->promo_id_val;
            if($promo_id_val!=""){
                $promo_arr = array(
                    'products_id' => $product_id,
                    'promo_text' => $request->promo_text,
                    'country_origin' => $request->country_origin,
                    'mul_pur_disc_set' => $mul_pur_disc_set,
                    'mul_pur_disc_item' => $mul_pur_disc_item,
                    'mul_pur_disc_sel' => $request->mul_pur_disc_sel,
                    'mul_pur_disc' => $mul_pur_disc,
                    'mul_pur_disc_period_set' => $mul_pur_disc_period_set,
                    'mul_pur_period_start' => $mul_pur_period_start,
                    'mul_pur_period_end' => $mul_pur_period_end,
                    'min_pur' => $request->min_pur,
                    'min_pur_val' => $min_pur_val,
                    'max_pur' => $request->max_pur,
                    'max_per_ord' => $max_per_ord,
                    'max_per_pers' => $max_per_pers,
                    'ad_sel' => $ad_sel,
                    'ad_start' => $ad_start,
                    'ad_end' => $ad_end,
                    'updated_at' => $cur_datetime
                );

                $promo->where('id', $request->promo_id_val)->update($promo_arr);
            }
            else{
                $promo->products_id = $product_id;
                $promo->promo_text = $request->promo_text;
                $promo->country_origin = $request->country_origin;
                $promo->mul_pur_disc_set = $mul_pur_disc_set;
                $promo->mul_pur_disc_item = $mul_pur_disc_item;
                $promo->mul_pur_disc_sel = $request->mul_pur_disc_sel;
                $promo->mul_pur_disc = $mul_pur_disc;
                $promo->mul_pur_disc_period_set = $mul_pur_disc_period_set;
                $promo->mul_pur_period_start = $mul_pur_period_start;
                $promo->mul_pur_period_end = $mul_pur_period_end;
                $promo->min_pur = $request->min_pur;
                $promo->min_pur_val = $min_pur_val;
                $promo->max_pur = $request->max_pur;
                $promo->max_per_ord = $max_per_ord;
                $promo->max_per_pers = $max_per_pers;
                $promo->ad_sel = $ad_sel;
                $promo->ad_start = $ad_start;
                $promo->ad_end = $ad_end;
                $promo->created_at = $cur_datetime;
                $promo->updated_at = $cur_datetime;

                $promo->save();

                $promo_id = $promo->id;
                //promotion done
                $promo_id_val = $promo_id;
            }
            
            //promotion done
        }
        /**-----------------------------Promotion end-------------------------------**/

        $product_info_arr = array(
            'products_id' => $product_id,
            'type' => $request->sales_type,
            'prod_name' => $request->name,
            'prod_code' => $prod_code,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'gst_type' => $request->gst_type,
            'selling_period_set' => $request->selling_period_set,
            'selling_period_day' => $period_day,
            'selling_period_start' => $period_start,
            'selling_period_end' => $period_end,
            'price' => $request->price,
            'tier_price' => $tier_price,
            'inst_price' => $inst_price,
            'discount_set' => $discount_set,
            'discount_sel' => $discount_sel,
            'discount_val' => $discount_val,
            'discount_period_set' => $discount_period_set,
            'discount_period_start' => $discount_period_start,
            'discount_period_end' => $discount_period_end,
            'weight' => $request->weight,
            'stock_quantity' => $request->stock_quantity,
            'option_id' => $opt_id,
            'merchant_shipping_id' => $request->shipping_add_id,
            'merchant_return_id' => $request->return_add_id,
            'shipping_method' => $request->shipping_method,
            'ship_rate' => $ship_rate,
            'ship_rate_id' => $ship_rate_id,
            'after_sale_serv' => $after_sale_serv,
            'return_policy' => $request->return_policy,
            'promo_set' => $promo_set,
            'promo_id' => $promo_id_val,
            'updated_at' => $cur_datetime
        );

        /*******************************product info end*********************************/

        $product_info->where('id', $request->product_info_id)->update($product_info_arr);

        $request->session()->flash('success', 'Product successfully updated!');
        return redirect('/backend/edit_product/'.$product_id);
    }

    /*******************************Product Bulk List start*********************************/
    public function product_bulk_list() {
        if(Auth::check()){

            return view('back.prod_bulk_list',
                array(
                    'title' => 'Product Bulk Listing',
                    'description' => '',
                    'page' => 'product_bulk_listing',
                    'mainmenu' => 'product_bulk_listing'
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function product_bulk_list_upload(Request $request){
        $cur_datetime = Carbon::now();

        $excel_file = $request->file('excel_file');

        $ext = explode(".", $excel_file->getClientOriginalName());
        $extension = end($ext);

        $allowed_extension = array("xls", "xlsx", "csv");

        if(in_array($extension, $allowed_extension)){ //check selected file extension is present in allowed extension array

            $inserted = "";

            $objPHPExcel = PHPExcel_IOFactory::load($excel_file);
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){

                $highestRow = $worksheet->getHighestRow();
                for($row=3; $row<=$highestRow; $row++){
                    $version = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $cat_num = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $prod_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $seller_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $promo_text = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $gst_type = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $main_img = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $add_img_1 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $add_img_2 = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $add_img_3 = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

                    $details = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $short_details = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

                    $price = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $disc = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $weight = $worksheet->getCellByColumnAndRow(15, $row)->getValue();

                    $opt_id = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $opt_val = $worksheet->getCellByColumnAndRow(17, $row)->getValue();

                    $quantity = $worksheet->getCellByColumnAndRow(18, $row)->getValue();

                    $ship_mthd = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $ship_rate = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $ship_rate_wm = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $ship_rate_sbh = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    $ship_rate_srk = $worksheet->getCellByColumnAndRow(23, $row)->getValue();

                    $ship_promo = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                    $ship_promo_disc = $worksheet->getCellByColumnAndRow(25, $row)->getValue();

                    $after_sale = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                    $rtn_policy = $worksheet->getCellByColumnAndRow(27, $row)->getValue();

                    $err_msg = $worksheet->getCellByColumnAndRow(28, $row)->getValue();

                    //this will insert all the data gathered into database
                    //get user id
                    $userid = Auth::user()->id;

                    $products = new Product();

                    $products->category_id = $cat_num;
                    $products->brand_id = "0";
                    $products->merchants_id = $userid;
                    $products->created_at = $cur_datetime;
                    $products->updated_at = $cur_datetime;
                    $products->created_at_ip = $request->ip;
                    $products->updated_at_ip = $request->ip;

                    $products->save();

                    //last insert id in products
                    $product_id = $products->id;

                    $product_info = new ProductInfo();

                    $product_info->products_id = $product_id;

                    //required field start
                    $product_info->type = "New";
                    $product_info->selling_period_set = "Y";
                    $product_info->selling_period_day = "120";

                    $today = date("Y-m-d");

                    $product_info->selling_period_start = $today;
                    $product_info->selling_period_end = date("Y-m-d", strtotime($today.' + 120 days'));

                    $ship_id = MerchantShipping::where('set_default', '=', 'Y')->select('id')->first();
                    $rtn_id = MerchantReturn::where('set_default', '=', 'Y')->select('id')->first();

                    $product_info->merchant_shipping_id = $ship_id->id;
                    $product_info->merchant_return_id = $rtn_id->id;
                    //required field end

                    $product_info->prod_name = $prod_name;
                    $product_info->prod_code = $seller_code;

                    $promo = new Promotion();

                    $promo->products_id = $product_id;
                    $promo->promo_text = $promo_text;

                    $promo->save();

                    $product_info->gst_type = $gst_type;

                    //kena buat upload image nanti

                    $main_img_save = "";
                    $add_img_1_save = "";
                    $add_img_2_save = "";
                    $add_img_3_save = "";

                    if($main_img!=""){
                        $product_image = new ProductImage();

                        $product_image->products_id = $product_id;
                        $product_image->name = $main_img;
                        $product_image->primary_img = "Y";
                        $product_image->path = "uploads/".$product_id."/";
                        $product_image->created_at = $cur_datetime;
                        $product_image->updated_at = $cur_datetime;

                        $product_image->save();

                        $main_img_save = $product_image->id;
                    }

                    if($add_img_1!=""){
                        $product_image = new ProductImage();

                        $product_image->products_id = $product_id;
                        $product_image->name = $add_img_1;
                        $product_image->primary_img = NULL;
                        $product_image->path = "uploads/".$product_id."/";
                        $product_image->created_at = $cur_datetime;
                        $product_image->updated_at = $cur_datetime;

                        $product_image->save();

                        $add_img_1_save = $product_image->id;
                    }

                    if($add_img_2!=""){
                        $product_image = new ProductImage();

                        $product_image->products_id = $product_id;
                        $product_image->name = $add_img_2;
                        $product_image->primary_img = NULL;
                        $product_image->path = "uploads/".$product_id."/";
                        $product_image->created_at = $cur_datetime;
                        $product_image->updated_at = $cur_datetime;

                        $product_image->save();

                        $add_img_2_save = $product_image->id;
                    }

                    if($add_img_3!=""){
                        $product_image = new ProductImage();

                        $product_image->products_id = $product_id;
                        $product_image->name = $add_img_3;
                        $product_image->primary_img = NULL;
                        $product_image->path = "uploads/".$product_id."/";
                        $product_image->created_at = $cur_datetime;
                        $product_image->updated_at = $cur_datetime;

                        $product_image->save();

                        $add_img_3_save = $product_image->id;
                    }

                    $product_info->details = $details;
                    $product_info->short_details = $short_details;

                    $product_info->price = $price;

                    if($disc!=""){
                        $disc_arr = explode("-", $disc);
                        $product_info->discount_sel = $disc_arr[0];
                        $product_info->discount_val = $disc_arr[1];
                    }else{
                        $product_info->discount_sel = "RM";
                    }

                    $product_info->weight = $weight;
                    $product_info->weight = $weight;

                    if($opt_id != ""){
                        $opt_id_arr = explode(",", $opt_id);
                        $opt_val_arr = explode(",", $opt_val);
                        $tot_opt_id = (count($opt_id_arr))-1;

                        $opt_arr = '[';

                        for($i=0; $i<=$tot_opt_id; $i++){
                            $opt_arr .= '"{\"typeid\": \"'.$opt_id_arr[$i].'\", \"info\": \"'.$opt_val_arr[$i].'\"}"';

                            $tot_min_one = $tot_opt_id-1;
                            if($i<=$tot_min_one){
                                $opt_arr .= ',';
                            }
                        }

                        $opt_arr .= ']';
                        $product_info->option_id = $opt_arr;
                    }

                    $product_info->stock_quantity = $quantity;
                    $product_info->shipping_method = $ship_mthd;
                    $product_info->ship_rate = $ship_rate;

                    if($ship_rate=="ByProd"){
                        $shiping_rate = new ShippingRate();

                        $shiping_rate->products_id = $product_id;

                        $ship_rate_wm_arr = explode("|", $ship_rate_wm);
                        $shiping_rate->wm_kg = $ship_rate_wm_arr[0];
                        $shiping_rate->wm_rm = $ship_rate_wm_arr[1];
                        $shiping_rate->add_wm_kg = $ship_rate_wm_arr[2];
                        $shiping_rate->add_wm_rm = $ship_rate_wm_arr[3];

                        $ship_rate_sbh_arr = explode("|", $ship_rate_sbh);
                        $shiping_rate->sbh_kg = $ship_rate_sbh_arr[0];
                        $shiping_rate->sbh_rm = $ship_rate_sbh_arr[1];
                        $shiping_rate->add_sbh_kg = $ship_rate_sbh_arr[2];
                        $shiping_rate->add_sbh_rm = $ship_rate_sbh_arr[3];

                        $ship_rate_srk_arr = explode("|", $ship_rate_srk);
                        $shiping_rate->srk_kg = $ship_rate_srk_arr[0];
                        $shiping_rate->srk_rm = $ship_rate_srk_arr[1];
                        $shiping_rate->add_srk_kg = $ship_rate_srk_arr[2];
                        $shiping_rate->add_srk_rm = $ship_rate_srk_arr[3];

                        $shiping_rate->cond_ship = $ship_promo;

                        if($ship_promo=="D"){
                            $ship_promo_disc_arr = explode("|", $ship_promo_disc);
                            $shiping_rate->cond_disc = $ship_promo_disc_arr[0];
                            $shiping_rate->cond_disc_for_purch = $ship_promo_disc_arr[1];
                            $shiping_rate->cond_free = NULL;
                        }else if($ship_promo=="F"){
                            $ship_promo_disc_arr = explode("|", $ship_promo_disc);
                            $shiping_rate->cond_disc = NULL;
                            $shiping_rate->cond_disc_for_purch = NULL;
                            $shiping_rate->cond_free = $ship_promo_disc_arr[0];
                        }else{
                            $shiping_rate->cond_disc = NULL;
                            $shiping_rate->cond_disc_for_purch = NULL;
                            $shiping_rate->cond_free = NULL;
                        }

                        $shiping_rate->save();

                        $ship_rate_id = $shiping_rate->id;
                        $product_info->ship_rate_id = $ship_rate_id;
                    }

                    $product_info->after_sale_serv = $after_sale;
                    $product_info->return_policy = $rtn_policy;

                    $product_info->updated_at = $cur_datetime;
                    $product_info->created_at = $cur_datetime;

                    $product_info_save = $product_info->save();

                    if(!$product_info_save){
                        Product::destroy($products->id);

                        if($main_img_save != ""){
                            ProductImage::destroy($main_img_save);
                        }
                        if($add_img_1_save != ""){
                            ProductImage::destroy($add_img_1_save);
                        }
                        if($add_img_2_save != ""){
                            ProductImage::destroy($add_img_2_save);
                        }
                        if($add_img_3_save != ""){
                            ProductImage::destroy($add_img_3_save);
                        }

                        Promotion::destroy($promo->id);
                    }
                }

                
            }

        }

        $request->session()->flash('success', 'Bulk Product List successfully inserted!');
        return redirect('/backend/prod_bulk_list');
    }
    /*******************************Product Bulk List ends*********************************/
}
