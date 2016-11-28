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
}
