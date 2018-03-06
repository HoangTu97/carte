<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE location
            (
                id_rest   INTEGER,
                address   VARCHAR(100),
                code_postal       INTEGER,
                commune           VARCHAR(50),
                latitude  DOUBLE PRECISION,
                longitude DOUBLE PRECISION
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
        Schema::dropIfExists('location');
    }
}
