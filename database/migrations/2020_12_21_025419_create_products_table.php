<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('product_types');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('name');
            $table->decimal('price', 10, 0);
            $table->tinyInteger('sell_percen');
            $table->integer('amount');
            $table->longText('description');
            $table->string('image_path');
            $table->decimal('view_count', 8, 0);
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_creator_id_foreign');
            $table->dropColumn('creator_id');

            $table->dropForeign('products_type_id_foreign');
            $table->dropColumn('type_id');

            $table->dropForeign('products_brand_id_foreign');
            $table->dropColumn('brand_id');
        });
        Schema::dropIfExists('products');
    }
}
