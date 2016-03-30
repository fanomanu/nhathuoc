<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Category;
use App\Menu;
use App\Product;
use Datatables;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        return view('admin.cate.list',compact('menu'));
    }

    public function getData(){
        if(request::ajax()){
            //$categories = Category::select(['id', 'name', 'order','parent_id']);
            $categories = DB::table('categories as cate')->leftJoin('categories as pcate','cate.parent_id','=','pcate.id')
            ->select(['cate.id as cate_id','cate.name as cate_name','cate.order as cate_order','pcate.id as parent_id','pcate.name as parent_name']);
            return Datatables::of($categories)
                ->editColumn('parent_name',function($category){
                    if($category->parent_name != null){
                        return $category->parent_name;
                    }else{
                        return 'Không có';
                    }
                    
                })
                ->addColumn('action', function ($category) {
                    $edit_link = route('admin.category.getEdit',$category->cate_id);
                    $delete_link = route('admin.category.getDelete',$category->cate_id);

                    $str = '<div class="btn-group">';
                    $str .= '<a href="' . $edit_link . '" class="btn btn-default btn-xs tbl_button"><i class="demo-icon icon-pencil">&#xe801;</i>Sửa&nbsp;&nbsp;</a>';
                    $str .= '<a data-toggle="modal" href="javascript:void(0);" class="btn btn-danger btn-xs tbl_button" data-target=".bs-example-modal-sm" link="' . $delete_link . '" onclick="xacnhanxoa(this);"><i class="demo-icon icon-trash-1">&#xe800;</i>Xóa&nbsp;&nbsp;</a>';
                    $str .= '</div>';

                    return $str;
                })
                ->make(true);
        }else{
            return redirect()->route('admin.category');
        }
    }

    public function getAdd(){
        $menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        $parent     =   Category::select('id','name','parent_id')->orderBy('name','ASC')->get()->toArray();
        return view('admin.cate.add',compact('parent','menu'));
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
        return redirect()->route('admin.category')->with(['flash-type'=>'alert-success','flash-message'=>'Đã thêm loại thành công']);
    }

    public function getDelete($id){
        $cate = Category::find($id);

        $child_num = category::where('parent_id',$id)->count();
        $products  = $cate->product()->count();
        if($child_num == 0 && $products == 0){
            $cate->delete();
            return redirect()->route('admin.category')->with(['flash-type'=>'alert-success','flash-message'=>'Đã xóa xong loại']); 
        }else{
            return redirect()->route('admin.category')->with(['flash-type'=>'alert-danger','flash-message'=>'Rất tiếc ! Vì tính toàn vẹn của dữ liệu bạn không thế xóa loại này']); 
        }
    }

    public function getEdit($id){
        $menu   =   Menu::select('id','name','link','parent_id','icon')->get()->toArray();
        $categories     =   Category::select('id','name','parent_id')->orderBy('name','ASC')->get()->toArray();
        $category = Category::find($id);
        return view('admin.cate.edit',compact('menu','categories','category'));
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,
            ['txtName' => 'required'], 
            ['txtName.required' => 'Xin vui lòng nhập tên.'],
            ['txtName' => 'unique:categories,name'], 
            ['txtName.unique' => 'Tên này đã tồn tại'],
            ['txtOrder' => 'required'], 
            ['txtOrder.required' => 'Xin vui lòng nhập thứ tự sắp xếp.'],
            ['txtKeyword' => 'required'], 
            ['txtKeyword.required' => 'Xin vui lòng nhập từ khóa.']   
        );

        $category = Category::find($id);
        $category->name        =   $request->txtName;
        $category->alias       =   changeTitle($request->txtName);
        $category->order       =   $request->txtOrder;
        $category->parent_id   =   $request->slParent;
        $category->keyword     =   $request->txtKeyword;  
        $category->description =   $request->txtDescription;
        $category->clocked     =   $request->rdoStatus;
        $category->save();
        return redirect()->route('admin.category')->with(['flash-type'=>'alert-success','flash-message'=>'Đã sửa thông tin loại thành công']);
    }
}
