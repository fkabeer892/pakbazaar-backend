<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('parent_id')->nullable();
                $table->foreign("parent_id", "categories_parent_id_foreign")->references("id")->on("categories");
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
        /*Schema::table("categories", function (Blueprint $table){
            $table->dropForeign('categories_parent_id_foreign');
        });*/
        Schema::dropIfExists('categories');
    }
}
