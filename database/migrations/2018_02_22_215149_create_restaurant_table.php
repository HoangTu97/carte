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
                category_id       INTEGER,
                telephone         VARCHAR(200),
                email             VARCHAR(100),
                image             XML,
                website           VARCHAR(250),
                details           TEXT,
                meta_title        VARCHAR(100),
                meta_descriptions VARCHAR(250),
                created_date      DATE DEFAULT CURRENT_DATE,
                created_by        INTEGER,
                edited_date       DATE,
                edited_by         INTEGER,
                show_on_home      BIT,
                status            BIT,
                classement        SMALLINT,
                telephonefax      VARCHAR(50),
                fax               VARCHAR(50),
                tarifmin          DOUBLE PRECISION,
                tarifmax          DOUBLE PRECISION,
                tarifenclair      TEXT,
                facebook          VARCHAR(300),
                type              VARCHAR(50),
                type_detail       VARCHAR(500),
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
