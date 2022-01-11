<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Klanten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medewerkers', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam')->nullable();
            $table->string('achternaam');
            $table->string('adres')->nullable();
            $table->string('telefoon_nummer')->nullable();
            $table->string('postcode')->nullable();
            $table->string('stad')->nullable();
            $table->string('land')->nullable();
            $table->string('email')->nullable();
            $table->date('geboortedatum')->nullable();
            $table->string('burger_service_nummer')->nullable();
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
        Schema::dropIfExists("medewerkers");
    }
}
