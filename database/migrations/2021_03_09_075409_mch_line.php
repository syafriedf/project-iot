<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MchLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('mch_line', function (Blueprint $table) {
            // $table->id('id_line');
            //$table->foreign('sts_id')->references('sts_id')->on('statuses');
            $table->foreignId('sts_id')->constrained('statuses');
            // $table->foreign('mch_id')->references('mch_id')->on('machines');
            // $table->foreign('opt_id')->references('opt_id')->on('operators');
            // $table->foreign('wop_id')->references('wop_id')->on('workorders');
        });
    }
    public function down()
    {
        //
    }
}
