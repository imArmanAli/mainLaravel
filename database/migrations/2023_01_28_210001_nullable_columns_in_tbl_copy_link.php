<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableColumnsInTblCopyLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_copy_link', function (Blueprint $table) {
            $table->string('cl_win_url')->nullable()->change();
            $table->string('cl_win_url_file')->nullable()->change();
            $table->string('cl_and_url_file')->nullable()->change();
            $table->string('cl_mac_url')->nullable()->change();
            $table->string('cl_mac_url_file')->nullable()->change();
            $table->string('cl_win_10_file')->nullable()->change();
            $table->string('cl_win_11_file')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_copy_link', function (Blueprint $table) {
            $table->string('cl_win_url')->nullable(false)->change();
            $table->string('cl_win_url_file')->nullable(false)->change();
            $table->string('cl_and_url_file')->nullable(false)->change();
            $table->string('cl_mac_url')->nullable(false)->change();
            $table->string('cl_mac_url_file')->nullable(false)->change();
            $table->string('cl_win_10_file')->nullable(false)->change();
            $table->string('cl_win_11_file')->nullable(false)->change();
        });
    }
}
