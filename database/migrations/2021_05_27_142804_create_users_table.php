<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
                $table->foreign("location_id", "users_location_id_foreign")->references("id")->on("locations");

            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_logged_in')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
