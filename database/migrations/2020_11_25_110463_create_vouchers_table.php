<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $voucherTable = config('vouchers.table', 'vouchers');
        $pivotTable = config('vouchers.pivot_table', 'user_voucher');

        Schema::create($voucherTable, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->string('code', 32)->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('user_credientals')->nullable();
            $table->double('price')->nullable();
            $table->string('status')->nullable();
            $table->date('cashout_at')->nullable();
            $table->unsignedBigInteger('recharge_count')->default(0)->nullable();
            $table->morphs('model');
            $table->text('data')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create($pivotTable, function (Blueprint $table) use ($voucherTable) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('voucher_id');
            $table->foreign('voucher_id')->references('id')->on($voucherTable);

            $table->timestamp('redeemed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('vouchers.pivot_table', 'user_voucher'));
        Schema::dropIfExists(config('vouchers.table', 'vouchers'));
    }
}
