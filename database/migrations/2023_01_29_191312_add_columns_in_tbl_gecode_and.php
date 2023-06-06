<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTblGecodeAnd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_gecode_and', function (Blueprint $table) {
            $table->string('cl_and_url_file')->nullable()->after('cl_and_url');
            $table->string('cl_and_rotation_url_file')->nullable()->after('cl_and_rotation_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_gecode_and', function (Blueprint $table) {
            //
        });
    }
}
