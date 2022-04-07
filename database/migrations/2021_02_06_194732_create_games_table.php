<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->mediumText('name')->nullable();
            $table->mediumText('gameAvatar')->nullable();
            $table->longText('description')->nullable();

            $table->unsignedInteger('win_occurrence')->nullable()->default(30);
            $table->double('slot_cash')->nullable()->default(100);

            $table->unsignedInteger('bonus_occurrence')->nullable()->default(15);

            $table->unsignedInteger('min_reel_loop')->nullable()->default(1);

            $table->unsignedInteger('reel_delay')->nullable()->default(0);

            $table->unsignedInteger('time_show_win')->nullable()->default(2000);

            $table->unsignedInteger('time_show_all_wins')->nullable()->default(2000);

            $table->double('min_bet')->nullable()->default(0.25);
            $table->double('max_bet')->nullable()->default(5);
            $table->unsignedBigInteger('max_hold')->nullable()->default(3);

            $table->double('perc_win_prize_1')->nullable()->default(50);
            $table->double('perc_win_prize_2')->nullable()->default(35);
            $table->double('perc_win_prize_3')->nullable()->default(15);

            $table->tinyInteger('show_credits')->nullable()->default(false);
            $table->tinyInteger('audio_enable_on_startup')->nullable()->default(false);
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
        Schema::dropIfExists('games');
    }
}
