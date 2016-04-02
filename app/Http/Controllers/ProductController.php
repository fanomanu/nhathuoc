<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use FRequest;
use Illuminate\Http\Request;

use DB;
use App\Menu;
use App\Category;
use App\Product;
use UnitType;
use Input,File;
use Datatables;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function getAdd(){
    	//echo Hash::make('ben');
        $menu   	=   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        $cates		= 	Category::select('id','name','parent_id')->orderBy('name','ASC')->get()->toArray();
        $unitType 	=	new UnitType;
        return view('admin.product.add',compact('menu','cates','unitType'));
    }

    public function postAdd(ProductRequest $request){
        $product = new Product;
    	
    	$product->name 			=	$request->txtName;
    	$product->alias 		=	changeTitle($request->txtName);
    	$product->unit_type 	=	$request->txtUnitType;
    	$product->price 		=	$request->txtPrice;
    	$product->intro 		=	$request->txtIntro;
        $product->content       =   $request->txtContent;
    	$product->keyword 		=	$request->txtKeyword;
    	$product->clocked 		=	$request->rdoStatus;
    	$product->user_id 		=	0;
    	$product->category_id 		=	$request->slCate;
    	$product->save();


/*        $file_ext      = $request->file('fImage')->getClientOriginalExtension();
        $file_name     = 'pi'.$product->id.'.'.$file_ext;
        $product->image         =  $file_name;
        $request->file('fImage')->move('resources/upload/images/','pi'.$product->id.'.'.$file_ext);
        $product->save();*/
        $edit_link = route('admin.product.getEdit',$product->id);

    	return redirect()->route('admin.product')->with(['flash-type' => 'confirm','flash-style'=>'alert-success','flash-message'=>'Đã thêm sản phẩm thành công! Hiện tại sản phẩm chưa có hình ảnh <a href="' .$edit_link. '">nhấp vào đây</a> để thêm hình ảnh cho sản phẩm.']);	
    }

    public function index(){
    	$menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        return view('admin.product.list',compact('menu'));
    }

    public function getData(){
        if(FRequest::ajax()){
            $products = DB::table('products')->leftJoin('categories','products.category_id','=','categories.id')
            ->select(['products.id as product_id','products.name as product_name','categories.id as category_id','categories.name as category_name','products.unit_type','products.price']);
            return Datatables::of($products)
            ->editColumn('unit_type',function($product){
                    $unitType   =   new UnitType;
                    return $unitType->getUnitTypeName($product->unit_type);
                })
            ->editColumn('price',function($product){
                    return number_format($product->price,0,',','.');
                })
            ->addColumn('action', function ($product) {
                    $edit_link = route('admin.product.getEdit',$product->product_id);
                    $delete_link = route('admin.product.getDelete',$product->product_id);

                    $str = '<div class="btn-group">';
                    $str .= '<a href="' . $edit_link . '" class="btn btn-default btn-xs tbl_button"><i class="demo-icon icon-pencil">&#xe801;</i>Sửa&nbsp;&nbsp;</a>';
                    $str .= '<a data-toggle="modal" href="javascript:void(0);" class="btn btn-danger btn-xs tbl_button" data-target=".bs-example-modal-sm" link="' . $delete_link . '" onclick="xacnhanxoa(this);"><i class="demo-icon icon-trash-1">&#xe800;</i>Xóa&nbsp;&nbsp;</a>';
                    $str .= '</div>';

                    return $str;
                })
            ->make(true);
        }else{
            return redirect()->route('admin.product');
        }
    }

    public function getDelete($id){
        $product = Product::find($id);
        $child_num = $product->Bill_detail()->count();
        if($child_num == 0){
            $product->delete();
            return redirect()->route('admin.product')->with(['flash-type' => 'inform','flash-style'=>'alert-success','flash-message'=>'Đã xóa xong sản phẩm']); 
        }else{
            return redirect()->route('admin.product')->with(['flash-type' => 'inform','flash-style'=>'alert-danger','flash-message'=>'Rất tiếc ! Vì tính toàn vẹn của dữ liệu bạn không thế xóa sản phẩm này']); 
        }
    }

    public function getEdit($id){
        $menu       =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        $cates      =   Category::select('id','name','parent_id')->orderBy('name','ASC')->get()->toArray();
        $unitType   =   new UnitType;
        $product    =   Product::find($id);
        return view('admin.product.edit',compact('menu','cates','unitType','product'));
    }

    public function postEdit(){

    }

    public function imageUpload($id){
        if(FRequest::ajax()){
            $org_width = 750;
            $imageFile = $_FILES['image_data']['tmp_name'];
            $fileName = $_FILES['image_data']['name'];

            print_r($_FILES['image_data']);

            list($width, $height) = getimagesize($imageFile);

            $src = imagecreatefromjpeg($imageFile);
            $org_height = ($height/$width) * $org_width;

            $tmp = imagecreatetruecolor($org_width,$org_height);
            imagecopyresampled($tmp,$src,0,0,0,0,$org_width,$org_height,$width,$height);
            imagejpeg($tmp,'resources/upload/images/'.$fileName,100);

            imagedestroy($tmp);
            imagedestroy($src);

            echo 'Xong';
        }else{
            
        }
    }
}
