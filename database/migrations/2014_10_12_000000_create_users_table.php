<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone',11)->unique();
            $table->string('image')->nullable();
            $table->string('role',10)->nullable();
            $table->string('saved_by',4)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ip_address');
            $table->rememberToken();
            $table->timestamps();
        });
        $user = new User();
        $user->name = "Md. Shamim Miah";
        $user->username = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('1');
        $user->phone = '01774266791';
        $user->ip_address = '0';
        $user->save();
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
