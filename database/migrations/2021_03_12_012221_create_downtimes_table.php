<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDowntimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downtimes', function (Blueprint $table) {
            $table->id('dwn_id');
            $table->bigInteger('id_line')->unsigned();
            $table->bigInteger('sts_id')->unsigned();
            $table->dateTime('date_start');
            $table->dateTime('date_end');;
        });

        Schema::table('downtimes', function (Blueprint $table) {
            $table->foreign('id_line')->references('id_line')->on('mch_lines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sts_id')->references('sts_id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downtimes');
    }
}
