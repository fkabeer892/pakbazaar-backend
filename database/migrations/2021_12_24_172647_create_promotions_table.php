<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("purchased_product_id");
                $table->foreign("purchased_product_id", "promotions_purchased_product_id_foreign")->references("id")->on("products");
            $table->integer("purchased_product_quantity");
            $table->unsignedBigInteger("gift_product_id");
            $table->foreign("gift_product_id", "promotions_gift_product_id_foreign")->references("id")->on("products");
            $table->integer("gift_product_quantity");
            $table->datetime("start_date");
            $table->datetime("end_date");
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
        /*Schema::table("promotions", function (Blueprint $table){
            $table->dropForeign('promotions_purchased_product_id_foreign');
            $table->dropForeign('promotions_gift_product_id_foreign');
        });*/
        Schema::dropIfExists('promotions');
    }
}
