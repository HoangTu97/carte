<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE restaurant
            (
                id                SERIAL NOT NULL
                    CONSTRAINT restaurant_pkey
                    PRIMARY KEY,
                name              VARCHAR(200),
                classement        SMALLINT,
                email             VARCHAR(100),
                telephone         VARCHAR(200),
                telephonefax      VARCHAR(50),
                fax               VARCHAR(50),
                facebook          VARCHAR(300),
                website           VARCHAR(250),
                tarifmin          DOUBLE PRECISION,
                tarifmax          DOUBLE PRECISION,
                tarifenclair      TEXT,
                details           TEXT,
                image             XML,
                meta_title        VARCHAR(100),
                meta_descriptions VARCHAR(250),
                created_date      DATE DEFAULT CURRENT_DATE,
                created_by        INTEGER,
                edited_date       DATE,
                edited_by         INTEGER,
                show_on_home      BIT,
                status            BIT,
                producteur        VARCHAR(100)
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
        Schema::dropIfExists('restaurant');
    }
}
