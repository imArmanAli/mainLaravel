<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteIdAndBrowserAndCountryToTblStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_statistics', function (Blueprint $table) {
            $table->string('site_id')->nullable()->default(null);
            $table->string('browser')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_statistics', function (Blueprint $table) {
            Schema::dropIfExists('site_id');
            Schema::dropIfExists('browser');
            Schema::dropIfExists('country');
        });
    }
}
