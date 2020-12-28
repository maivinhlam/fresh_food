<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->unsignedBigInteger('customer_id');
                    $table->foreign('customer_id')->references('id')->on('customers');
                    $table->unsignedBigInteger('product_id');
                    $table->foreign('product_id')->references('id')->on('products');
                    $table->unsignedBigInteger('news_id');
                    $table->foreign('news_id')->references('id')->on('news');
                    $table->longText('content');
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('carts_customer_id_foreign');
            $table->dropColumn('customer_id');

            $table->dropForeign('carts_product_id_foreign');
            $table->dropColumn('product_id');
            $table->dropForeign('carts_news_id_foreign');
            $table->dropColumn('news_id');
        });
        Schema::dropIfExists('comments');
    }
}