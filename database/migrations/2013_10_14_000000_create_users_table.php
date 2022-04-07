<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

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
            $table->unsignedInteger('role_id')->default(2);

            $table->string('avatar')->nullable();
            $table->enum('type',['Admin','customer','Cashier'])->default('customer');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();

            $table->longText('address1')->nullable();
            $table->longText('address2')->nullable();

            $table->mediumText('country')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->string('postalcode')->nullable();

            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

    User::create([
        'firstname' => 'Admin',
        'lastname' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('password'),
    ]);

        User::create([
        'firstname' => 'User',
        'lastname' => 'user',
        'email' => 'user@user.com',
        'password' => bcrypt('password'),
    ]);

        User::create([
        'firstname' => 'Cashier',
        'lastname' => 'cashier',
        'email' => 'cashier@cashier.com',
        'password' => bcrypt('password'),
    ]);

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
