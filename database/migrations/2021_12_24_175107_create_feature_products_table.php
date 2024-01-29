<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
                $table->foreign("product_id", "feature_products_product_id_foreign")->references("id")->on("products");
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
        /*Schema::table("feature_products", function (Blueprint $table){
            $table->dropForeign('feature_products_product_id_foreign');
        });*/
        Schema::dropIfExists('feature_products');
    }
}
