<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("parent_id")->nullable();
                $table->foreign("parent_id", "locations_parent_id_foreign")->references("id")->on("locations");
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
        /*Schema::table("locations", function (Blueprint $table){
            $table->dropForeign('locations_parent_id_foreign');
        });*/
        Schema::dropIfExists('locations');
    }
}
