<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("location_id");
                $table->foreign("location_id", 'product_stock_location_id_foreign')->references("id")->on("locations");
            $table->unsignedBigInteger("product_id");
                $table->foreign("product_id", 'product_stock_product_id_foreign')->references("id")->on("products");
            $table->integer("stock");
            $table->decimal("price", 10, 2);
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
        /*Schema::table("product_stock", function (Blueprint $table){
            $table->dropForeign('product_stock_location_id_foreign');
            $table->dropForeign('product_stock_product_id_foreign');
        });*/
        Schema::dropIfExists('product_stock');
    }
}
