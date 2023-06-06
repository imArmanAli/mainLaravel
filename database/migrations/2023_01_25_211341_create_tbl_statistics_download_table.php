<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatisticsDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_statistics_download', function (Blueprint $table) {
            $table->string('user_ip')->nullable()->default(null);
            $table->datetime('stat_date')->nullable()->default(null);
            $table->integer('pub_id')->nullable()->default(null);
            $table->integer('domain_id')->nullable()->default(null);
            $table->string('stat_os')->nullable()->default(null);
            $table->integer('stat_status')->nullable()->default(null);
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
        Schema::dropIfExists('tbl_statistics_download');
    }
}
