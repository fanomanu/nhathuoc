@extends('admin.master')


@section('title')

@endsection

    
@push('head-fw')
    <!-- Bootstrap Datatable -->    <link rel="stylesheet" href="{{ url('public/admin/css/dataTables.bootstrap.css') }}" type="text/css"/>
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
            <li class="active">Thêm mới</li>
        </ol>
    </div>
@endsection


@push('foot-fw')
    <!-- Datatable  -->           <script src="{{ url('public/admin/js/jquery.dataTables.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Datatable  --> <script src="{{ url('public/admin/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
@endpush



@push('scripts')
   <script type="text/javascript">

        //Hàm xác nhận xóa
        function xacnhanxoa(btn){
            //console.log($('#btn-delete-confirm'));
            var btn = $(btn);
            //console.log(btn.attr('link'));

            $('#btn-delete-confirm').attr('href',btn.attr('link'));
        }

        $(document).ready(function(){
            


            var table = $('#datatable').DataTable({
                    "dom": '<"toolbar">ftp',
                    "oLanguage": {
                        "sSearch": "Tìm kiếm _INPUT_",
                        "sEmptyTable": "Chưa có dữ liệu trong bảng <a class='tbl_empty_new_button' href='{!! url('admin/category/add') !!}'>Tạo mới</a>",
                        "sProcessing ": "Đang xử lý dữ liệu",
                        "oPaginate": {
                            "sNext": "Sau",
                            "sPrevious": "Trước"
                        }
                    },
                    "aoColumnDefs": [
                        { "sClass": "col-btn", "aTargets": [ 5 ] },
                        { visible: false, "aTargets": [ 3 ] }
                    ],
                    "language": {
                       "processing": "Đang xử lý"
                    },
                    "fnInitComplete": function ( oSettings ) {
                        oSettings.oLanguage.sZeroRecords    = "Không có dữ liệu phù hợp" 
                    },
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.category.data') !!}',
                    columns: [
                        { data: 'cate_id', name: 'cate.id'},
                        { data: 'cate_name', name: 'cate.name',orderable: false },
                        { data: 'cate_order', name: 'cate.order', searchable: false },
                        { data: 'parent_id', name: 'pcate.id', orderable: false },
                        { data: 'parent_name', name: 'pcate.name',orderable: false },
                        { data: 'action', name: 'action',orderable: false, searchable: false }
                    ]   
            });
            
            <!-- Đây là đoạn mã quy định số dòng table -->
            table.page.len(50).draw();    
            
            <!-- Đây là đoạn mã vẽ toolbar cho table -->
            $('#datatable_filter').addClass('col-lg-9');
            //console.log($('#datatable_filter').html());
            $('div.toolbar').addClass('col-lg-3');
            $('div.toolbar').html('<a href="{!! url('admin/category/add') !!}" class="btn btn-new">Thêm mới</a>');
        });
    </script>
@endpush