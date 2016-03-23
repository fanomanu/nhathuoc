<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Menu;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getList(){
        $arr_menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        return view('admin.cate.list',compact('arr_menu'));
    }

    public function getData(){
        print_r($_GET);
    }

    public function getAdd(){
        $arr_menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        $parent     =   Category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        //print_r($parent);
        return view('admin.cate.add',compact('parent','arr_menu'));
    }

    public function postAdd(CategoryRequest $request){
        $category = new Category;

        $category->name         = $request->txtName;
        $category->alias        = changeTitle($request->txtName);
        $category->order        = $request->txtOrder;
        $category->parent_id    = $request->slParent;
        $category->keyword      = $request->txtKeyword;
        $category->description  = $request->txtDescription;
        $category->clocked      = $request->rdoStatus;
        $category->save();
        return redirect()->route('admin.category.list')->with(['flash-type'=>'alert-success','flash-message'=>'Đã thêm loại thành công']);
    }
}
