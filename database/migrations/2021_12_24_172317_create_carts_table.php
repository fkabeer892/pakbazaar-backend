<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id")->nullable();
                $table->foreign("customer_id", "carts_customer_id_foreign")->references("id")->on("users");
            $table->decimal("total", 10,2)->nullable();
            $table->unsignedBigInteger("payment_method_id")->nullable();
                $table->foreign("payment_method_id", "carts_payment_method_id_foreign")->references("id")->on("payment_methods");
            $table->unsignedBigInteger("coupon_code_id")->nullable();
                $table->foreign("coupon_code_id", "carts_coupon_code_id_foreign")->references("id")->on("coupon_codes");
            $table->set("discount_type", ["amount", "percentage"])->nullable();
            $table->decimal("discount_amount", 10,2)->nullable();
            $table->decimal("tax", 10,2)->nullable();
            $table->decimal("grand_total", 10,2)->nullable();

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
        /*Schema::table("carts", function (Blueprint $table){
            $table->dropForeign('carts_customer_id_foreign');
            $table->dropForeign('carts_payment_method_id_foreign');
            $table->dropForeign('carts_coupon_code_id_foreign');
        });*/
        Schema::dropIfExists('carts');
    }
}
