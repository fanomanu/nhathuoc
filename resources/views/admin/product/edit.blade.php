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
        @include('admin.blocks.inform')
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Quản lý hình ảnh</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h3 class="modal-sub-title">Hình đại diện</h3>
                        <div class="col-lg-12 modal-profile-image-content">
                            <div class="profile-image-frame" id="modal-profile-image-frame" >
                                <a id="modal-profile-image" class="thumbnail">
                                    @if($product['image'] != null)
                                        <img src="{!! asset('resources/upload/images/'.$product['image']); !!}" alt="...">
                                    @else
                                        <img src="{!! asset('public/admin/img/no-image.png'); !!}" alt="...">
                                    @endif
                                    </img>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <form action="{!! route('admin.product.postImageUpload') !!}" type="POST" id="profile_image_form">
                                <input type="file" name="file-3" id="fImage" class="inputfile inputfile-3" />
                                <label for="fImage" id="profile_image_label"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>Cập nhật ảnh đại diện.</span></label>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="modal-sub-title">Hình chi tiết</h3>   
                        
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- end modal-content -->
          </div><!-- end modal-dialog -->
        </div><!-- end modal --> 
        <form action="" method="POST">
            <div class="col-lg-7 main-form-wrapper">
                <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}"/>
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
                        <a id="profile-image" href="javascript:void(0);" class="thumbnail" data-toggle="modal" data-target=".bs-example-modal-lg">
                            @if($product['image'] != null)
                                <img src="{!! asset('resources/upload/images/'.$product['image']); !!}" alt="...">
                            @else
                                <img src="{!! asset('public/admin/img/no-image.png'); !!}" alt="...">
                            @endif
                                <div class="profile-image-slide" id="profile-image-slide">
                                    <span class="profile-image-label"><i class="demo-icon profile-image-icon">&#xe80a;</i>Quản lý hình ảnh</span>
                                </div>
                            </img>
                        </a>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#profile-image').hover(function(e){
                        //console.log(e.type);
                        if(e.type == 'mouseenter'){
                            $('#profile-image-slide').css('opacity','0.8');
                        }else if (e.type == 'mouseleave'){
                            $('#profile-image-slide').css('opacity','0');
                        }
                    });
                </script>
                <div class="form-group">
                    <label>Từ khóa tìm kiếm sản phẩm</label>
                    <input class="form-control" name="txtKeyword" placeholder="Xin nhập từ khóa" value="{!! old('txtKeyword', isset($product)?$product['keyword']:null) !!}" />
                </div>
                <div class="form-group">
                    <label>Tình trạng</label>
                    <label class="radio-inline">
                            @if($product['clocked'] == 0)
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

            // Đoạn xử lý upload profile
            //
            $('#fImage').change(function(){

                // Kiểm tra API trên trình duyệt
                if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
                  alert('Trình duyệt của bạn không hỗ trợ upload file.');
                  return;
                }

                
                // Kiểm tra có file được upload hay ko
                if($(this).length == 0){
                    alert('Xin chọn một file.');
                    return;
                }

                // Lập một trình biểu thức kiểm tra file là hình
                var file_rule = /^(?:image\/bmp|image\/gif|image\/jpeg|image\/pjpeg|image\/png)$/i;

                // Kiểm tra file được upload
                var file = $(this)[0].files[0];
                var file_size = file.size;
                var file_type = file.type;

                // Kiêm tra đuôi file upload    
                if(!file_rule.test(file_type)){
                    alert('Xin nhập một file ảnh.');
                    return;
                }

                // Kiểm tra dung lượng file
                if(file_size > 2000000){
                    alert('Xin nhập một file ảnh nhỏ hơn 2MB.');
                    return;
                }
                
                $('#profile_image_label').hide();

                var data = new FormData();
                data.append("image_data",file);
                data.append('_token',$('#_token').val());

                //console.log(data);
                // upload hình dữ dụng jquery
                $.ajax({
                    type: 'POST',
                    timeout     : 1000,
                    processData: false,
                    contentType: false,
                    url: '{!! Route('admin.product.postImageUpload',$product["id"]) !!}',
                    data: data,
                    dataType: 'html', 
                    success: function(){
                        
                    }
                });
            });
        });
    </script>
@endpush
