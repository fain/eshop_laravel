<?php

namespace Eshop\Http\Controllers;

use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Eshop\Category;
use Eshop\Brand;
use Eshop\ProductOption;
use Eshop\ProductOptionGroup;

use Eshop\MerchantShipping;
use Illuminate\Support\Facades\Auth;

//for timestamp
use Carbon\Carbon;


class ApiController extends Controller
{
    //
    public function categoryDropDownData($id){
        $main_category = $id;

        $sub_category = Category::where('main_category_id', '=', $main_category)
            ->where('main_category_id', '!=', 0)
            ->where('status', 'A')
            ->where('menu_type', 'sub')
//            ->orderBy('name', 'asc')
            ->get();

        return Response::json($sub_category);
    }

    public function brandDropDownData($id){
        $category = $id;

        $brands = Brand::where('category_id', $category)
//            ->where('status', 'A')
//            ->orderBy('name', 'asc')
            ->get();

        return Response::json($brands);
    }

    public function prodOptGrpTable($id){
        $group_id = $id;

        $prod_opt_grp = ProductOptionGroup::where('id', $group_id)->first();

        $prod_opt_in = $prod_opt_grp->prod_opt;
        $list_opt = array();

        if(isset($prod_opt_in) && $prod_opt_in!=""){
            $arr_opt = explode(",", $prod_opt_in);

            $len = (count($arr_opt))-1;

            for($i=0; $i<=$len; $i++){
                $list_opt[] = ProductOption::where('id', '=', $arr_opt[$i])->select('id', 'name')->first();
            }
        }

//        print_r($list_opt);
//        exit;

        return Response::json($list_opt);
    }

    /*******************************Merchant Shipping Ajax start*********************************/
    public function new_shipping(Request $request){
        $userid = Auth::user()->id;
        $cur_datetime = Carbon::now();

        if($request->ship_id==""){
            $merch_ship = new MerchantShipping();

            $merch_ship->user_id = $userid;
            $merch_ship->title = $request->ship_title;
            $merch_ship->set_default = $request->ship_default;
            $merch_ship->name = $request->ship_name;
            $merch_ship->address = $request->ship_address;
            $merch_ship->state = $request->ship_state;
            $merch_ship->city = $request->ship_city;
            $merch_ship->postcode = $request->ship_pcode;
            $merch_ship->phone = $request->ship_phone;
            $merch_ship->updated_at = $cur_datetime;
            $merch_ship->created_at = $cur_datetime;
//
            $merch_ship->save();

            $merch_ship_id = $merch_ship->id;
            $msg = 'New Shipping address had been successfully Inserted!';
        }else{
            $merch_ship = MerchantShipping::find($request->ship_id);
            $merch_ship_arr = array(
                'title' => $request->ship_title,
                'set_default' => $request->ship_default,
                'name' => $request->ship_name,
                'address' => $request->ship_address,
                'state' => $request->ship_state,
                'city' => $request->ship_city,
                'postcode' => $request->ship_pcode,
                'phone' => $request->ship_phone,
                'updated_at' => $cur_datetime
            );

            $merch_ship->where('id', $request->ship_id)->update($merch_ship_arr);

            $merch_ship_id = $request->ship_id;
            $msg = 'Shipping address had been successfully Updated!';
        }

        if($request->ship_default=="Y"){
            MerchantShipping::where('id', '!=', $request->ship_id)->update(['set_default' => 'N', 'updated_at' => $cur_datetime]);
        }

        $data = [
            'message'=> $msg,
            'title' => $request->ship_title,
            'def' => $request->ship_default,
            'name' => $request->ship_name,
            'address' => $request->ship_address,
            'state' => $request->ship_state,
            'full_state' => $request->full_state,
            'city' => $request->ship_city,
            'pcode' => $request->ship_pcode,
            'phone' => $request->ship_phone,
            'id' => $merch_ship_id
        ];

        return Response::json($data);
    }

    public function merchant_shipping($id) {
        $merchant_shipping = DB::table('merchant_shipping')
            ->leftjoin('state', 'state.id', '=', 'merchant_shipping.state')
            ->select('merchant_shipping.*', 'state.name as state_name')
            ->where('merchant_shipping.id', '=', $id)
            ->first();

        return Response::json($merchant_shipping);
    }
    /*******************************Merchant Shipping Ajax end*********************************/
}
