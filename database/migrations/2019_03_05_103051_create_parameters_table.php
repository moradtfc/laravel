<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('active_c_id')->unsigned()->index()->nullable();
            $table->foreign('active_c_id')->references('id')->on('catalogues');

            $table->integer('staging_c_id')->unsigned()->index()->nullable();
            $table->foreign('staging_c_id')->references('id')->on('catalogues');
            
            $table->softDeletes();
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
        Schema::dropIfExists('parameters');
    }
}
