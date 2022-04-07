<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id')->references('id')->on('vouchers');

            $table->string('Order_ID')->nullable();
            $table->string('Order_Status')->nullable();
            $table->string('Payer_Given_Name')->nullable();
            $table->string('Payer_Sur_Name')->nullable();
            $table->string('Payer_Email')->nullable();
            $table->string('Payer_ID')->nullable();
            $table->string('Paid_Amount')->nullable();
            $table->string('Paid_At')->nullable();
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
        Schema::dropIfExists('checkouts');
    }
}
