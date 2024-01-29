<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("sku");
            $table->unsignedBigInteger("category_id");
                $table->foreign("category_id", "products_category_id_foreign")->references("id")->on("categories");
            $table->unsignedBigInteger("brand_id");
                $table->foreign("brand_id", "products_brand_id_foreign")->references("id")->on("brands");
            $table->text("description")->nullable();
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
        /*Schema::table("products", function (Blueprint $table){
            $table->dropForeign('categories_parent_id_foreign');
            $table->dropForeign('products_brand_id_foreign');
        });*/
        Schema::dropIfExists('products');
    }
}
