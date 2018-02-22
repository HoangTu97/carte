<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE "Favorite"
            (
                id            SERIAL NOT NULL
                    CONSTRAINT "Favorite_pkey"
                    PRIMARY KEY,
                idrestaurants INTEGER,
                iduser        INTEGER
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
        Schema::dropIfExists('Favorite');
    }
}
