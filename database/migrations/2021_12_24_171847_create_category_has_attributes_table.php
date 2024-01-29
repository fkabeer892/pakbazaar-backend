<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHasAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_has_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
                $table->foreign("category_id", 'categories_has_attributes_category_id_foreign')->references("id")->on("categories");
            $table->unsignedBigInteger("attribute_id");
                $table->foreign("attribute_id", 'categories_has_attributes_attribute_id_foreign')->references("id")->on("attributes");
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
        /*Schema::table("category_has_attributes", function (Blueprint $table){
            $table->dropForeign('categories_has_attributes_category_id_foreign');
            $table->dropForeign('categories_has_attributes_attribute_id_foreign');
        });*/
        Schema::dropIfExists('category_has_attributes');
    }
}
