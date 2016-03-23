@extends('admin.master')
@section('title')
Loại sản phẩm - thêm
@endsection

@section('css-fw')
@endsection

@section('content')
    <div class="col-lg-3">
        <div class="menucontainer">
            <div id="cssmenu" class="bmenu">
                <ul class="nav">
                    <?php renderMenu($arr_menu) ?>
                </ul>    
            </div><!-- END cssmenu -->
        </div><!-- END menucontainer -->
    </div>
    <!-- content -->
    <div class="col-lg-9 content">
        <div class="col-lg-12 page-header">
            <h2>Loại sản phẩm <small>Thêm mới</small></h2>
        </div><!-- END page-header -->
        @include('admin.blocks.inform')
        <form action="{!! route('admin.category.getAdd') !!}" method="POST">
            <div class="col-lg-7 main-form-wrapper">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <div class="form-group">
                    <label>Thuộc loại</label>
                    <select class="form-control" name="slParent">
                    <option value="0">Xin chọn một loại..</option>
                    <?php cate_parent($parent); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên loại</label>
                    <input class="form-control" name="txtName" placeholder="Xin nhập tên loại" />
                </div>
                <div class="form-group">
                    <label>Thứ tự sắp xếp</label>
                    <input class="form-control" name="txtOrder" placeholder="Xin nhập thứ tự sắp xếp" />
                </div>
                <div class="form-group">
                    <label>Từ khóa tìm kiếm</label>
                    <input class="form-control" name="txtKeyword" placeholder="Xin nhập từ khóa" />
                </div>
                <div class="form-group">
                    <label>Mô tả loại</label>
                    <textarea class="form-control" name="txtDescription" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Tình trạng</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="0" type="radio">Không hiện
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Thêm loại</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </div><!-- END main-form-wrapper --> 
            <div class="col-lg-5 sub-form-wrapper">
                
            </div><!-- END sub-form-wrapper -->             
        </form><!-- END form -->
    </div> 
@endsection

@section('javascript-fw')
@endsection

@section('script')
@endsection
