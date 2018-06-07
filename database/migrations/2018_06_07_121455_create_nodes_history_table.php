<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_nodes_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('node_id')->references('id')->on('rs_nodes')->unsigned();
            $table->integer('field_id')->references('id')->on('rs_fields')->unsigned();
            $table->integer('language_id')->references('id')->on('rs_languages')->unsigned();
            $table->string('value', 512)->nullable()->deffault(null);

            $table->foreign('node_id')->references('id')->on('rs_nodes')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('field_id')->references('id')->on('rs_fields')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('language_id')->references('id')->on('rs_languages')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
        Schema::dropIfExists('nodes_history');
    }
}
