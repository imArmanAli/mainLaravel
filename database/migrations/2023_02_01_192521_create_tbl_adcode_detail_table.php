<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAdcodeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_adcode_detail', function (Blueprint $table) {
            $table->id();
            $table->string('pub_id')->nullable()->default(null);
            $table->string('site_id')->nullable()->default(null);
            $table->string('adcode_id')->nullable()->default(null);
            $table->string('adcode_link')->nullable()->default(null);
            $table->string('link_code')->nullable()->default(null);
            $table->string('link_type')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_adcode_detail');
    }
}
