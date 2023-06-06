<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTblGecode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_gecode', function (Blueprint $table) {
             $table->string('cl_win_url_file')->nullable()->after('cl_win_url');
            $table->string('cl_win_rotation_url_file')->nullable()->after('cl_win_rotation_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_gecode', function (Blueprint $table) {
            //
        });
    }
}
