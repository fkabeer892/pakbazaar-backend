<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
                $table->foreign("order_id", "order_reviews_order_id_foreign")->references("id")->on("orders");
            $table->unsignedBigInteger("product_id")->nullable();
                $table->foreign("product_id", "order_reviews_product_id_foreign")->references("id")->on("products");
            $table->integer("points");
            $table->text("feedback")->nullable();
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
        Schema::disableForeignKeyConstraints();
        /*Schema::table("order_review", function (Blueprint $table){
            $table->dropForeign('order_reviews_order_id_foreign');
            $table->dropForeign('order_reviews_product_id_foreign');
        });*/
        Schema::dropIfExists('order_reviews');
    }
}
