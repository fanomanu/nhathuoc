<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type');
            $table->date('date');
            $table->string('deli_name');
            $table->string('deli_addr');
            $table->string('deli_phone',100);
            $table->integer('sub_total');
            $table->integer('total');
            $table->smallInteger('payment');
            $table->text('payment_note');
            $table->text('note');
            $table->tinyInteger('status');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bills');
    }
}
