<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->morphs("object");
            $table->unsignedBigInteger("user_id")->nullable();
                $table->foreign("user_id")->references("id")->on("users");
            $table->string("street");
            $table->string("street2")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("postal_code")->nullable();
            //$table->string("country_id")->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
                $table->foreign("country_id", "addresses_country_id_foreign")->references("id")->on("countries");
            $table->unsignedBigInteger("location_id")->nullable();
                $table->foreign("location_id", "addresses_location_id_foreign")->references("id")->on("locations");
            $table->string("phone")->nullable();
            $table->decimal("latitude", 15, 10)->nullable();
            $table->decimal("longitude", 15, 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table("users", function (Blueprint $table){
            $table->unsignedBigInteger("address_id")->after("phone_number");
                $table->foreign("address_id", "users_address_id_foreign")->references("id")->on("addresses");
            $table->dropColumn(['lat', 'lon', 'state', 'zip']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function (Blueprint $table){
            $table->dropForeign("users_address_id_foreign");
            $table->dropColumn("address_id");
            $table->string("postal_code")->after("phone_number");
            $table->string("state")->after("phone_number");
            $table->decimal("latitude", 15, 10)->nullable();
            $table->decimal("longitude", 15, 10)->nullable();

        });
        Schema::dropIfExists('addresses');
    }
}
