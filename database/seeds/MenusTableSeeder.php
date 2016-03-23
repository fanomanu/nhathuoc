<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
        	/** User **/
        	array('id' => 1, 'name'=>'Người dùng', 'link'=>'#', 'parent_id'=>0,'icon'  => 'xe807'),
            array('id' => 2, 'name'=>'Danh sách', 'link'=>'admin/user/list', 'parent_id'=>1,'icon'  => ''),
            array('id' => 3, 'name'=>'Thêm mới', 'link'=>'admin/user/add', 'parent_id'=>1,'icon'  => ''),

        	/** Category **/
            array('id' => 4, 'name'=>'Loại sản phẩm', 'link'=>'#', 'parent_id'=>0,'icon'  => 'xe808'),
            array('id' => 5, 'name'=>'Danh sách', 'link'=>'admin/category/list', 'parent_id'=>4,'icon'  => ''),
            array('id' => 6, 'name'=>'Thêm mới', 'link'=>'admin/category/add', 'parent_id'=>4,'icon'  => ''),

            /** Product **/
            array('id' => 7, 'name'=>'Sản phẩm', 'link'=>'#', 'parent_id'=>0,'icon'  => 'xe809'),
            array('id' => 8, 'name'=>'Danh sách', 'link'=>'admin/product/list', 'parent_id'=>7,'icon'  => ''),
            array('id' => 9, 'name'=>'Thêm mới', 'link'=>'admin/product/add', 'parent_id'=>7,'icon'  => ''),

            /** Quản lý **/
            array('id' => 10, 'name'=>'Quản lý', 'link'=>'#', 'parent_id'=>0,'icon'  => 'xe803'),
            array('id' => 11, 'name'=>'Phân quyền', 'link'=>'admin/manager/privil', 'parent_id'=>10,'icon'  => ''),
            array('id' => 12, 'name'=>'Đơn hàng', 'link'=>'admin/manager/order', 'parent_id'=>10,'icon'  => ''),
            array('id' => 13, 'name'=>'Nhập xuất', 'link'=>'admin/manager/store', 'parent_id'=>10,'icon'  => ''),

            /** Báo cáo **/
            array('id' => 14, 'name'=>'Báo cáo', 'link'=>'#', 'parent_id'=>0,'icon'  => 'xe806'),
            array('id' => 15, 'name'=>'Tổng quát', 'link'=>'admin/report/index', 'parent_id'=>14,'icon'  => ''),
            array('id' => 16, 'name'=>'Doanh thu', 'link'=>'admin/report/income', 'parent_id'=>14,'icon'  => ''),
            array('id' => 17, 'name'=>'Kho hàng', 'link'=>'admin/report/store', 'parent_id'=> 14, 'icon'  => ''),
            array('id' => 18, 'name'=>'Sản phẩm bán chạy', 'link'=>'admin/report/top-product', 'parent_id'=>14,'icon'  => '')
        ]);
    }
}
