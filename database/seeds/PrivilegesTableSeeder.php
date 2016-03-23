<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
        	/** User level 0 **/

        		/** Người dùng **/
        	array('menu_id'=> 1, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 2, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 3, 'user_level'=> 0, 'level'=>	7),
            	/** Loại sản phẩm **/
            array('menu_id'=> 4, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 5, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 6, 'user_level'=> 0, 'level'=>	7),
            	/** Sản phẩm **/
            array('menu_id'=> 7, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 8, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 9, 'user_level'=> 0, 'level'=>	7),
            	/** Quản lý **/
            array('menu_id'=> 10, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 11, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 12, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 13, 'user_level'=> 0, 'level'=>	7),
            	/** Báo cáo **/
            array('menu_id'=> 14, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 15, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 16, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 17, 'user_level'=> 0, 'level'=>	7),
            array('menu_id'=> 18, 'user_level'=> 0, 'level'=>	7)

            /** End User level 0 **/
      
        ]);
    }
}
