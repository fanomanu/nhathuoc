 <div class="col-lg-12" style="padding-left: 0px;">
                        <div class="profile-image-frame" id="profile-image-frame" >
                            <input type="file" name="fImage" id="fImage" class="inputfile inputfile-3"/>
                            <a href="javascript:void(0)" id="profile-image" class="thumbnail" for="fImage" data-toggle="modal" data-target=".bs-example-modal-lg">
                                <img src="{!! url('public/admin/img/no-image.png') !!}" alt="...">
                            </a>    
                            <div class="profile-image-slide" id="profile-image-slide">
                                <span class="profile-image-label"><i class="demo-icon profile-image-icon">&#xe80a;</i> Tải ảnh</span>
                            </div>
                        </div>
                    </div>

                    // Đoạn xử lý profile image
            //
            $('#profile-image').hover(function(e){
                //console.log(e.type);
                if(e.type == 'mouseenter'){
                    $('#profile-image-slide').css('opacity','0.8');
                }else if (e.type == 'mouseleave'){
                    $('#profile-image-slide').css('opacity','0');
                }
            });