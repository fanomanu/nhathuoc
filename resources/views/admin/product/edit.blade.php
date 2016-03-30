@extends('admin.master')


@section('title')
    sản phẩm - sửa thông tin
@endsection

    
@push('head-fw')
    <!-- CKEditor  -->    <script src="{{ url('public/admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <!-- CKFinder  -->    <script src="{{ url('public/admin/js/ckfinder/ckfinder.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
    <!-- CKEditor config  -->    <script src="{{ url('public/admin/js/func_ckfinder.js') }}" type="text/javascript"></script>
@endpush


@section('content')
    <div class="col-lg-3">
        <div class="menucontainer">
            <div id="cssmenu" class="bmenu">
                <ul class="nav">
                    <?php renderMenu($menu); ?>
                </ul>    
            </div><!-- END cssmenu -->
        </div><!-- END menucontainer -->
    </div>
    <div class="col-lg-9 content" style="height:auto;">
        <ol class="breadcrumb page-header">
            <li><a  href="{!! route('admin.product') !!}">Sản phẩm</a></li>
            <li class="active">Sửa thông tin</li>
        </ol>
        <form action="" method="POST">
            <div class="col-lg-7 main-form-wrapper">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <div class="form-group">
                    <label>Thuộc loại</label>
                    <select class="form-control" name="slCate">
                        <option value="0">Xin chọn một loại..</option>
                        <?php renderCategoryForSelect($cates,0,'',old('slCate',isset($product)?$product->category_id:0)); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" name="txtName"  value="{!! old('txtName', isset($product)?$product['name']:null) !!}"/>
                </div>
                <div class="form-group"  style="height: 57.326px;">
                    <label>Đơn vị tính</label>
                    <input type="text" style="display: none;" id="txtUnitType" name="txtUnitType"  value="{!! old('txtUnitType', isset($product)?$product['unit_type']:null) !!}"/>
                    <?php $unitType->renderUnitType(); ?>
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <div class="input-group">
                      <input class="form-control" style="height: 34.4444px; text-align: right;" name="txtPrice" value="{!! old('txtPrice', isset($product)?$product['price']:null) !!}"/>
                      <span class="input-group-addon">VND</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Giới thiệu sản phẩm</label>
                    <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product)?$product['intro']:null) !!}</textarea>
                    <script type="text/javascript">ckeditor('txtIntro')</script>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product)?$product['content']:null) !!}</textarea>
                    <script type="text/javascript">ckeditor('txtContent')</script>
                </div>
                <div class="form-group">
                    <label>Hình đại diện sản phẩm</label>
                    <div class="profile-image-frame" id="profile-image-frame" >
                        <a id="profile-image" href="#" class="thumbnail">
                            <img src="{!! asset('resources/upload/images/'.$product['image']); !!}" alt="...">
                                <div class="profile-image-slide" id="profile-image-slide">
                                    <span class="profile-image-label"><i class="demo-icon profile-image-icon">&#xe80a;</i>Hình ảnh</span>
                                </div>
                            </img>
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <label>Từ khóa tìm kiếm sản phẩm</label>
                    <input class="form-control" name="txtKeywords" placeholder="Xin nhập từ khóa" value="" />
                </div>
                <div class="form-group">
                    <label>Tình trạng</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" checked="" type="radio">Hiện
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="2" type="radio">Không hiện
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>  
            </div><!-- END main-form-wrapper -->
            <div class="col-lg-5 sub-form-wrapper">
                
            </div><!-- END sub-form-wrapper -->
        </form><!-- END form -->  
    </div>
@endsection


@push('foot-fw')
    
@endpush



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            // Đoạn xử lý chọn Unit Type
            //
            var btnUnitType = $('#btnUnitType button');
            //console.log(txtUnitType);
            if($('#txtUnitType').val() != ''){
                var selectValue = $('#txtUnitType').val();
                renderUnitType(selectValue);
            }

            function renderUnitType(txtUnitTypeValue){
                btnUnitType.each(function() {
                    //console.log($(this));
                    if($(this).attr('value') == txtUnitTypeValue){
                        if($(this).hasClass('btn-default')){
                            $(this).removeClass('btn-default');    
                        }
                        if(!$(this).hasClass('btn-primary')){
                            $(this).addClass('btn-primary');
                        }
                    }else{
                        if($(this).hasClass('btn-primary')){
                            $(this).removeClass('btn-primary');
                        }
                        if(!$(this).hasClass('btn-default')){
                            $(this).addClass('btn-default');
                        }
                    }
                });
            }

            btnUnitType.on('click',function(e){
                var selectValue = $(this).attr('value');
                $('#txtUnitType').val(selectValue);
                renderUnitType(selectValue);
            });
        });
    </script>
@endpush
