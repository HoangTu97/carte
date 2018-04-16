<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE contact
            (
                id            SERIAL       NOT NULL
                    CONSTRAINT "Contact_pkey"
                    PRIMARY KEY,
                username      VARCHAR(20)  NOT NULL,
                email         VARCHAR(50),
                firstname     VARCHAR(50),
                lastname      VARCHAR(50),
                adress        VARCHAR(250),
                socialprofile VARCHAR(250) NOT NULL,
                content       TEXT
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
        Schema::dropIfExists('contact');
    }
}
