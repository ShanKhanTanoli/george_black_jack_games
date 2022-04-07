<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\PaypalCredential;

class CreatePaypalCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_credentials', function (Blueprint $table) {
            $table->id();

            $table->text('PAYPAL_MODE')->nullable()->default('sandbox');
            $table->text('PAYPAL_SANDBOX_CLIENT_ID')->nullable();
            
            $table->text('PAYPAL_SANDBOX_SECRET')->nullable();
            $table->text('PAYPAL_SANDBOX_ACCOUNT')->nullable();

            $table->text('PAYPAL_LIVE_CLIENT_ID')->nullable();
            $table->text('PAYPAL_LIVE_SECRET')->nullable();

            $table->timestamps();
        });

        PaypalCredential::create([

            'PAYPAL_MODE' => 'sandbox',

            'PAYPAL_SANDBOX_CLIENT_ID' => 'AVQw3_9w0X0gsf5hqL6TKS2H2uIF4bSXXs0fYLvZtNNOnY4XQN5qvtT_RFVJEtkaHyTXTUI-u-Vzyjlt',

            'PAYPAL_SANDBOX_SECRET' => 'EHOqktIt7Sq-R8PXVwMddwIH6K3rbQogz-dKHCfAyCOSTQT0JYs13utE76xEqCZ0qEVfCERg1IaK_RIf',

            'PAYPAL_SANDBOX_ACCOUNT' => 'sb-0ftsv5212827@business.example.com',

        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal_credentials');
    }
}
