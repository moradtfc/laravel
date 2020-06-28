<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('color_code')->nullable();
            $table->integer('order')->nullable();
               $table->string('icon_path')->nullable();
                $table->string('icon_url')->nullable();
                 $table->string('icon_url_alternative')->nullable();
                  $table->string('icon_additional_path')->nullable();
                   $table->string('pdf_url')->nullable();
                   $table->string('active_url')->nullable();
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
