<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\LandingPage;

class CreateLandingpageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landingpage', function (Blueprint $table) {
            $table->id();

            $table->string('page_heading')->nullable();

            $table->longText('hero_image')->nullable();

            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->longText('about_heading')->nullable();
            $table->longText('about_description')->nullable();

            $table->timestamps();
        });

    LandingPage::create([
        'page_heading' => 'Online Casino',
        'hero_image' => 'Online Casino',
        'short_description' => 'Genuine Money Transaction',
        'long_description' => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.',
        'about_heading' => 'About Us',
        'about_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ua.',
    ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landingpage');
    }
}
