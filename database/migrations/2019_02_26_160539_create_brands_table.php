<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
              $table->string('name');
            $table->string('web')->nullable();
            $table->string('email')->nullable();;

             $table->string('photo_path')->nullable();
            $table->string('photo_url')->nullable();
        
             $table->string('photo_url_alt')->nullable();
            $table->string('final_url')->nullable();
             $table->string('active_url')->nullable();

             $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('brands');
    }
}
