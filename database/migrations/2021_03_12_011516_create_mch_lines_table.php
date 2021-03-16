<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMchLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mch_lines', function (Blueprint $table) {
            $table->id('id_line');
            $table->bigInteger('mch_id')->unsigned();
            $table->bigInteger('sts_id')->unsigned();
            $table->bigInteger('wop_id')->unsigned();
            $table->bigInteger('opt_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('mch_lines', function (Blueprint $table) {
            $table->foreign('mch_id')->references('mch_id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sts_id')->references('sts_id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('wop_id')->references('wop_id')->on('workorders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('opt_id')->references('opt_id')->on('operators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mch_lines');
    }
}
