<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proj_id');
            $table->string('proj_name');
            $table->string('team');
            $table->string('account');
            $table->string('bidding_time');
            $table->string('award_time');
            $table->string('acept_time');
            $table->string('member');
            $table->string('client_info');
            $table->string('job_site');
            $table->double('price');
            $table->string('completed_time');
            $table->string('other')->nullable();
            $table->string('state')->mullable();
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
        Schema::dropIfExists('results');
    }
}
