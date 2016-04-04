@extends('admin.master')


@section('title')
    sản phẩm - sửa thông tin
@endsection

    
@push('head-fw')
    <!-- CSS Jcrop -->    <link rel="stylesheet" href="{{ url('public/admin/css/jquery.Jcrop.css') }}" type="text/css" />
    <!-- CKEditor  -->    <script src="{{ url('public/admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <!-- CKFinder  -->    <script src="{{ url('public/admin/js/ckfinder/ckfinder.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
    <!-- CKEditor config  -->   <script src="{{ url('public/admin/js/func_ckfinder.js') }}" type="text/javascript"></script>
    <!-- Jcrop -->              <script src="{{ url('public/admin/js/jquery.Jcrop.min.js') }}" type="text/javascript"></script>
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
        <div class="modal fade bs-example-modal-lg" id="crop-image-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Cắt hình ảnh</h4>
                </div>
                <div class="modal-body crop-image-wrapper">
                    <div class="row">
                        <div class="col-lg-8" id="crop-image-before-wrapper" style="padding-right: 0px;">
                            <div class="progress crop-image-progress">
                                <div class="progress-bar" id="crop-image-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-4 crop-image-after-wrapper">
                            <h5>Xem trước: </h5>
                            <div id="preview">
                                
                            </div>
                        </div>
                        <ipnut type="hidden" id="crop-x" />
                        <ipnut type="hidden" id="crop-y" />
                        <ipnut type="hidden" id="crop-w" />
                        <ipnut type="hidden" id="crop-h" />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-default" id="crop-image-cancel">Hủy</button>
                            <button class="btn btn-primary" id="crop-image-submit">Cắt và lưu</button>
                        </div>
                    </div>
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
                        <a id="profile-image" href="javascript:void(0);" class="thumbnail">
                            @if($product['image'] != null)
                                <img id="image-profile" src="{!! asset('resources/upload/images/profile/'.$product['image']); !!}" alt="...">
                            @else
                                <img id="image-profile" src="{!! asset('public/admin/img/no-image.png'); !!}" alt="...">
                            @endif
                                <div class="profile-image-slide" id="profile-image-slide">
                                    <span class="profile-image-label"><i class="demo-icon profile-image-icon">&#xe80a;</i>Tải hình đại diện</span>
                                </div>
                            </img>
                        </a>
                    </div>
                    <input type="file" name="file-3" id="fImage" class="inputfile inputfile-3" />          
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


            $('#profile-image').click(function(){
                $('#fImage').click();
            });

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
                var file_rule = /^(?:image\/gif|image\/jpeg|image\/pjpeg|image\/png)$/i;

                // Kiểm tra file được upload
                var file = $(this)[0].files[0];
                var file_size = file.size;
                var file_type = file.type;

                // Kiêm tra đuôi file upload    
                if(!file_rule.test(file_type)){
                    alert('Xin nhập một file .gif, .jpg hoặc .png.');
                    return;
                }

                // Kiểm tra dung lượng file
                if(file_size > 2000000){
                    alert('Xin nhập một file ảnh nhỏ hơn 2MB.');
                    return;
                }
                
                $('#profile_image_label').hide();

                var data = new FormData();
                data.append("fImage",file);
                data.append('_token',$('#_token').val());

                function updateCrop(c){

                    showPreview(c);
                    $('#crop-x').val(c.x);
                    $('#crop-y').val(c.y);
                    $('#crop-w').val(c.w);
                    $('#crop-h').val(c.h);
                }

                function showPreview(crop){
                    var rx  = 250/crop.w;
                    var ry  = 300/crop.h;
                    var o_h = $('#cropbox').height();

                    //console.log(o_h);
                    $('#preview img').css({
                        width: Math.round(rx*500)+'px',
                        heigh: Math.round(ry*o_h)+ 'px',
                        marginLeft: '-'+Math.round(rx*crop.x)+'px',
                        marginTop: '-' +Math.round(ry*crop.y)+'px'
                    });
                }

                //console.log(data);
                // upload hình dữ dụng jquery
                $.ajax({
                    type: 'POST',
                    timeout     : 1000,
                    processData: false,
                    contentType: false,
                    url: '{!! Route('admin.product.postImageUpload',$product["id"]) !!}',
                    data: data,
                    dataType: 'json', 
                    xhr: function()
                    {
                        var xhr = new window.XMLHttpRequest();
                        //Upload progress
                        xhr.upload.addEventListener("progress", function(evt){
                          if (evt.lengthComputable) {
                            //console.log('Đang xử lý');
                            $('#crop-image-modal').modal();
                            var percent = (evt.loaded / evt.total)*100;
                            $('#crop-image-progress-bar').attr('style','width: '+percent+'%');
                          }
                        }, false);
                        return xhr;
                    },
                    success: function(data){
                        //console.log(data.msg);
                        if(data.type == 'success'){
                            $('#crop-image-before-wrapper').html('<img id="cropbox" src="{!! asset("resources/upload/images/tmp") !!}/'+ data.msg +'" />');
                            $('#preview').html('<img src="{!! asset("resources/upload/images/tmp") !!}/'+ data.msg +'" />');  

                            // Đoạn xử lý cắt hình
                            //console.log($('#cropbox'));
                            $('#cropbox').Jcrop({
                                aspectRatio: 250/300,
                                setSelect: [0,0,250,300],
                                onSelect: updateCrop,
                                onChange: updateCrop
                                });

                        }else{
                            $('#crop-image-before-wrapper').html(data.msg);  
                        }
                        
                    }
                });
            }); // End  fImage.change()

            $('#crop-image-cancel').click(function(){
                $('#crop-image-modal').modal('hide');

                var data = new FormData();
                data.append('_token',$('#_token').val());
                data.append('type','tmp');

                $.ajax({
                    type: 'POST',
                    timeout     : 1000,
                    processData: false,
                    contentType: false,
                    url: '{!! Route('admin.product.postImageDelete',$product["id"]) !!}',
                    data: data,
                    dataType: 'json', 
                    success: function(data){
                        if(data.type == "success"){
                            
                        }else{
                            console.log(data);
                        }
                    }
                });
            }); // End crop-image-cancel.click()

                
            // Đoạn xử lý submit hình đã cắt xong
            //
            $('#crop-image-submit').click(function(){
                $('#crop-image-modal').modal('hide');

                var data = new FormData();
                data.append('_token',$('#_token').val());
                data.append('type','profile');
                data.append('x',$('#crop-x').val());
                data.append('y',$('#crop-y').val());
                data.append('w',$('#crop-w').val());
                data.append('h',$('#crop-h').val());

                $.ajax({
                    type: 'POST',
                    timeout     : 1000,
                    processData: false,
                    contentType: false,
                    url: '{!! Route('admin.product.postImageCrop',$product["id"]) !!}',
                    data: data,
                    dataType: 'json', 
                    success: function(data){
                        if(data.type == "success"){
                            $('#image-profile').attr({'src': '{!! asset("resources/upload/images/profile"); !!}/'+ data.msg });
                        }else{
                            console.log(data);
                        }
                    }
                });
            }); //end crop-image-submid.click()
        });
    </script>
@endpush
