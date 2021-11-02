<?php

use App\Support\Enum\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('username')->nullable()->index();
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('role_id')->default('3');
            $table->date('birthday')->nullable();
            $table->string('device_id', 255)->nullable();
            $table->text('last_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('confirmation_code', 10)->nullable();
            $table->integer('confirmation_expiry')->nullable();
            $table->string('confirmation_token', 60)->nullable();
            $table->string('status', 20)->default(UserStatus::ACTIVE);
            $table->integer('two_factor_country_code')->nullable();
            $table->integer('two_factor_phone')->nullable();
            $table->text('two_factor_options')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index('created_at');
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
        Schema::drop('users');
    }
}
