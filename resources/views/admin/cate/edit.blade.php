@extends('admin.master')
@section('title')
Loại sản phẩm - sửa
@endsection

@push('head-fw')
@endpush

@section('content')
    <div class="col-lg-3">
        <div class="menucontainer">
            <div id="cssmenu" class="bmenu">
                <ul class="nav">
                    <?php renderMenu($menu) ?>
                </ul>    
            </div><!-- END cssmenu -->
        </div><!-- END menucontainer -->
    </div>
    <div class="col-lg-9 content">
        <div class="row">
            <ol class="breadcrumb page-header">
                <li><a  href="{!! route('admin.category') !!}">Loại sản phẩm</a></li>
                <li class="active">Sửa thông tin</li>
            </ol><!-- end page-header -->
            @include('admin.blocks.inform')           
            <form action="{!! route('admin.category.getEdit',$category['id']) !!}" method="POST">
                <div class="col-lg-7 main-form-wrapper">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="form-group">
                        <label>Thuộc loại</label>
                        <select class="form-control" name="slParent">
                        <option value="0">Xin chọn một loại..</option>
                        <?php renderCategoryForSelect($categories,0,'',$category['parent_id']); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label {!! $errors->first('txtName') != null ? 'class="text-error"' : null !!}>Tên loại</label>
                        <input class="form-control" name="txtName" placeholder="Xin nhập tên loại" value="{!! old('txtName', isset($category)?$category['name']:null) !!}" />
                    </div>
                    <div class="form-group">
                        <label {!! $errors->first('txtOrder') != null ? 'class="text-error"' : null !!}>Thứ tự sắp xếp</label>
                        <input class="form-control" name="txtOrder" placeholder="Xin nhập thứ tự sắp xếp"  value="{!! old('txtOrder', isset($category)?$category['order']:null) !!}" />
                    </div>
                    <div class="form-group">
                        <label {!! $errors->first('txtKeyword') != null ? 'class="text-error"' : null !!}>Từ khóa tìm kiếm</label>
                        <input class="form-control" name="txtKeyword" placeholder="Xin nhập từ khóa"  value="{!! old('txtKeyword', isset($category)?$category['keyword']:null) !!}" />
                    </div>
                    <div class="form-group">
                        <label {!! $errors->first('txtDescription') != null ? 'class="text-error"' : null !!}>Mô tả loại</label>
                        <textarea class="form-control" name="txtDescription" rows="3">{!! old('txtDescription', isset($category)?$category['description']:null) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tình trạng</label>
                        <label class="radio-inline">
                            @if($category['clocked'] == 0)
                                    <input name="rdoStatus" value="0" checked="checked" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" type="radio">Không hiện
                            @else
                                    <input name="rdoStatus" value="0" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="checked" type="radio">Không hiện
                            @endif
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                </div><!-- END main-form-wrapper --> 
                <div class="col-lg-5 sub-form-wrapper">
                                
                </div><!-- END sub-form-wrapper -->             
            </form><!-- END form -->        
        </div> 
    </div><!-- END content -->
@endsection

@push('foot-fw')
@endpush

@push('script')
@endpush

