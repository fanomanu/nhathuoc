@extends('admin.master')
@section('title')
Loại sản phẩm - danh sách
@endsection

@section('css-fw')
    <!-- Bootstrap Datatable -->    <link rel="stylesheet" href="{{ url('public/admin/css/dataTables.bootstrap.css') }}" type="text/css"/>
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
            <div class="row">
               <div class="col-lg-12 page-header">
                   <h2>Loại sản phẩm <small>Danh sách</small></h2>
               </div><!-- END page-header -->
            </div>
            <div class="col-lg-12">
                @if(Session::has('flash-message'))
                    <div class="alert {!! Session::get('flash-type') !!}">
                        {!! Session::get('flash-message') !!}
                    </div>
                @endif
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
                   <thead>
                        <tr>
                           <td>ID</td> 
                           <td>Tên loại</td>
                           <td>Sắp xếp</td>
                           <td>Thuộc loại</td>
                           <td class="colxoa">Xóa</td>
                           <td class="colsua">Sửa</td>
                        </tr>
                   </thead>
                   <tbody>
                        <tr>
                            <td>1</td> 
                            <td>Thuốc ho</td>
                            <td>1</td>
                            <td>N/A</td>
                            <td class="colxoa">
                                <a><i class="demo-icon icon-trash-1">&#xe800;</i></a>
                            </td>
                            <td class="colsua">
                                <a><i class="demo-icon icon-pencil">&#xe801;</i></a>
                            </td>
                        </tr>
                   </tbody><!-- END tbody -->
               </table><!-- END table -->       
    </div><!-- END content -->  
@endsection

@section('javascript-fw')
    <!-- Datatable  -->           <script src="{{ url('public/admin/js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Datatable  --> <script src="{{ url('public/admin/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
@endsection

@section('script')
    $(document).ready(function(){
            
            var table = $('#datatable').DataTable({
                    "dom": '<"toolbar">tp',
                    "oLanguage": {
                        "sSearch": "Tìm kiếm _INPUT_",
                        "oPaginate": {
                            "sNext": "Sau",
                            "sPrevious": "Trước"
                        }
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": [1,3,4,5] },
                        { "searchable": false, "targets": [2,4,5] }
                    ]
            });
            
            <!-- Đây là đoạn mã quy định số dòng table -->
            table.page.len(50).draw();    
            
            <!-- Đây là đoạn mã vẽ toolbar cho table -->
            $("div.toolbar").html('<div id="datatable_filter" class="dataTables_filter">'+
                                    '<div class="pull-left"><a class="btn btn-primary">Thêm mới</a></div>'+
                                    '<label>Tìm kiếm <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable">'+
                                    '</label></div>');
    });
@endsection
