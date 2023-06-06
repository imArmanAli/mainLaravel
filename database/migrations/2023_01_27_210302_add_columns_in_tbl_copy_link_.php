<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInTblCopyLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_copy_link', function (Blueprint $table) {
            $table->text('cl_win_url_file')->after('cl_win_url');
            $table->text('cl_and_url_file')->after('cl_and_url');
            $table->text('cl_mac_url_file')->after('cl_mac_url');
            $table->text('cl_win_10_file')->after('cl_win_10');
            $table->text('cl_win_11_file')->after('cl_win_11');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_copy_link_', function (Blueprint $table) {
            //
        });
    }
}
