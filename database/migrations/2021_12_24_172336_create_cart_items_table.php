<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cart_id");
                $table->foreign("cart_id", "cart_items_cart_id")->references("id")->on("carts");
            $table->unsignedBigInteger("product_id");
            $table->foreign("product_id", "cart_items_product_id")->references("id")->on("products");
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
        /*Schema::table("cart_items", function (Blueprint $table){
            $table->dropForeign('cart_items_cart_id');
            $table->dropForeign('cart_items_product_id');
        });*/
        Schema::dropIfExists('cart_items');
    }
}
