<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	array('id' => 0, 'username'=>'ben', 'password'=>hash::make('ben'), 'name'=>'ben','email'  => 'ben@example.com','phone' => '123456','phone2' => '654321','address' => 'abc','level' => 0, 'remember_token' => 'HkfeyfGlZnMiTwuqi8fiV90RRLxWjtX6H9DdFKpw', 'clocked' => 0, 'birthday' => '07/20/1988');
   		);
    }
}
