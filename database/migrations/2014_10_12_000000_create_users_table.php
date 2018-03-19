<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE SEQUENCE user_id_seq;');
        DB::statement("
            CREATE TABLE \"user\"
            (
                id        INTEGER DEFAULT nextval('user_id_seq' :: REGCLASS) NOT NULL
                    CONSTRAINT \"User_pkey\"
                    PRIMARY KEY,
                username  VARCHAR(20)                                        NOT NULL,
                password  VARCHAR(20)                                        NOT NULL,
                email     VARCHAR(50),
                firstname VARCHAR(50),
                lastname  VARCHAR(50),
                adress    VARCHAR(250),
                level     BIT
            );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        DB::statement('DROP SEQUENCE IF EXISTS user_id_seq');
    }
}
