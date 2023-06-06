<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCappingPopInlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_capping_pop_inline', function (Blueprint $table) {
            $table->id();
            $table->string('pub_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('adcode_id')->nullable();
            $table->text('country')->nullable();
            $table->text('states')->nullable();
            $table->text('os')->nullable();
            $table->text('link1')->nullable()->default(null);
            $table->text('link2')->nullable()->default(null);
            $table->text('link3')->nullable()->default(null);
            $table->text('link4')->nullable()->default(null);
            $table->text('link5')->nullable()->default(null);
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
        Schema::dropIfExists('tbl_capping_pop_inline');
    }
}
