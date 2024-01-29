<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
                $table->foreign("product_id", "products_attributes_product_id_foreign")->references("id")->on("products");
            $table->unsignedBigInteger("attribute_id");
                $table->foreign("attribute_id", 'products_attributes_attribute_id_foreign')->references("id")->on("attributes");
            $table->unsignedBigInteger("attribute_value_id")->nullable();
                $table->foreign("attribute_value_id", 'products_attribute_value_id_foreign')->references("id")->on("attribute_values");
            $table->string("value");
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
        /*Schema::table("product_attributes", function (Blueprint $table){
            $table->dropForeign('products_attributes_product_id_foreign');
            $table->dropForeign('products_attributes_attribute_id_foreign');
            $table->dropForeign('products_attribute_value_id_foreign');
        });*/
        Schema::dropIfExists('product_attributes');
    }
}
