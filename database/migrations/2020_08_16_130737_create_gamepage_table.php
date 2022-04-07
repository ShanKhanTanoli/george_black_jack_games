<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\GamePage;

class CreateGamepageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamepage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('GameId')->nullable();
            $table->string('pagetitle')->nullable();
            $table->longText('gameinfo')->nullable();
            $table->string('buttontext')->nullable();
            $table->timestamps();
        });

        GamePage::create([
            'pagetitle' => 'Game Terms & Conditions',
            'gameinfo' => 'These are the Terms & Conditions and How to Play',
            'buttontext' => 'Play Now',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamepage');
    }
}
