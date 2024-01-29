<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhishlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whishlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
                $table->foreign("customer_id", "whishlist_customer_id_foreign")->references("id")->on("users");
            $table->unsignedBigInteger("category_id");
                $table->foreign("category_id", "whishlist_category_id_foreign")->references("id")->on("categories");
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
        /*Schema::table("whishist", function (Blueprint $table){
            $table->dropForeign('whishlist_customer_id_foreign');
            $table->dropForeign('whishlist_category_id_foreign');
        });*/
        Schema::dropIfExists('whishlist');
    }
}
