<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            CREATE TABLE "Category"
            (
                id               SERIAL NOT NULL
                    CONSTRAINT "Category_pkey"
                    PRIMARY KEY,
                name             VARCHAR(50),
                idparent         INTEGER,
                img              XML,
                details          TEXT,
                metatitle        VARCHAR(50),
                metadescriptions VARCHAR(250),
                createddate      DATE DEFAULT CURRENT_DATE,
                createdby        INTEGER,
                editeddate       DATE,
                editedby         INTEGER,
                showonhome       BIT
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
        Schema::dropIfExists('Category');
    }
}
