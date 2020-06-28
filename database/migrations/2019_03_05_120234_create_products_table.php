<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('points');
            $table->integer('points_price');
            $table->integer('last_points');
            $table->decimal('price', 10, 2);
            $table->integer('impression_views')->nullable();
            $table->integer('visit_views')->nullable();
            $table->boolean('state');
            $table->string('photo_path')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('photo_url_alternative')->nullable();
            $table->string('final_url')->nullable();
            $table->string('active_url')->nullable();
            $table->string('sku')->nullable();
             $table->string('stock')->nullable();
             $table->string('tags')->nullable();
            $table->decimal('real_value', 12, 2)->nullable();
             $table->text('detail')->nullable();
             $table->boolean('es_licor');

              $table->integer('catalogue_id')->unsigned()->index()->nullable();
            $table->foreign('catalogue_id')->references('id')->on('catalogues');


             $table->integer('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');


             $table->integer('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('products');
    }
}
