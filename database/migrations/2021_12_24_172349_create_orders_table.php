<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id", "orders_customer_id_foreign")->references("id")->on("users");
            $table->decimal("total", 10,2);
            $table->unsignedBigInteger("payment_method_id");
            $table->foreign("payment_method_id", "orders_payment_method_id_foreign")->references("id")->on("payment_methods");
            $table->unsignedBigInteger("coupon_code_id")->nullable();
            $table->foreign("coupon_code_id", "orders_coupon_code_id_foreign")->references("id")->on("coupon_codes");
            $table->set("discount_type", ["amount", "percentage"])->nullable();
            $table->decimal("discount_amount", 10,2)->nullable();
            $table->decimal("tax", 10,2)->nullable();
            $table->decimal("grand_total", 10,2);
            $table->unsignedBigInteger("cart_id");
                $table->foreign("cart_id", "orders_cart_id_foreign")->references("id")->on("carts");
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
        /*Schema::table("orders", function (Blueprint $table){
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_payment_method_id_foreign');
            $table->dropForeign('orders_coupon_code_id_foreign');
            $table->dropForeign('orders_cart_id_foreign');
        });*/
        Schema::dropIfExists('orders');
    }
}
