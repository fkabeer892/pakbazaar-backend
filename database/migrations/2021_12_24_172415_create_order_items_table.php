<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
                $table->foreign("order_id", "orders_items_order_id")->references("id")->on("orders");
            $table->unsignedBigInteger("product_id");
                $table->foreign("product_id", "orders_items_product_id")->references("id")->on("products");
            $table->string("product_name");
            $table->integer("quantity");
            $table->decimal("price", 10,2);
            $table->decimal("inline_total", 10,2);
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
        /*Schema::table("order_items", function (Blueprint $table){
            $table->dropForeign('orders_items_order_id');
            $table->dropForeign('orders_items_product_id');
        });*/
        Schema::dropIfExists('order_items');
    }
}
