<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE "Feedback"
            (
                id          SERIAL NOT NULL
                    CONSTRAINT "Feedback_pkey"
                    PRIMARY KEY,
                iduser      INTEGER,
                content     TEXT,
                createddate DATE,
                createdby   INTEGER,
                editeddate  DATE,
                editedby    INTEGER,
                status      BIT
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
        Schema::dropIfExists('Feedback');
    }
}
