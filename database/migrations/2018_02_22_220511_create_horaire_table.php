<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoraireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE "Horaire"
            (
                id           SERIAL NOT NULL
                    CONSTRAINT "Horaire_pkey"
                    PRIMARY KEY,
                idrestaurant INTEGER,
                date         TEXT,
                open         TEXT,
                close        TEXT
            );
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Horaire');
    }
}
