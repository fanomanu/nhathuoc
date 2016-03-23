<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills',function($table){
            $table->string('deli_name')->nullable()->change();
            $table->string('deli_addr')->nullable()->change();
            $table->string('deli_phone',12)->nullable()->change();
            $table->string('payment_note')->nullable()->change();
            $table->string('note')->nullable()->change();
            $table->integer('user_cf_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
