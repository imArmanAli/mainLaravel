<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInTblCopyLinkPbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_copy_link_pbl', function (Blueprint $table) {
            $table->string('cl_win_url')->nullable()->change();
            $table->string('cl_win_url_file')->nullable()->after('cl_win_url');
            $table->string('cl_and_url')->nullable()->change();
            $table->string('cl_and_url_file')->nullable()->after('cl_and_url');
            $table->string('cl_mac_url')->nullable()->change();
            $table->string('cl_mac_url_file')->nullable()->after('cl_mac_url');
            $table->string('cl_win_10_file')->nullable()->after('cl_win_10');
            $table->string('cl_win_11_file')->nullable()->after('cl_win_11');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_copy_link_pbl', function (Blueprint $table) {
            $table->string('cl_win_url')->nullable(false)->change();
            $table->string('cl_mac_url')->nullable(false)->change();
            $table->string('cl_and_url')->nullable(false)->change();
        });
    }
}
