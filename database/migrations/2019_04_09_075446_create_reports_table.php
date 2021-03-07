<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('name');
            $table->string('team');
            $table->float('total_hours');
            $table->string('account')->nullable();
            $table->integer('bids')->nullable();
            $table->float('bidding_hours')->nullable();
            $table->integer('chats')->nullable();
            $table->float('chatting_hours')->nullable();
            $table->integer('Awards')->nullable();
            $table->integer('Acepts')->nullable();
            $table->integer('pending_tasks')->nullable();
            $table->float('task_hours');
            $table->string('description');
            $table->string('state');
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
        Schema::dropIfExists('reports');
    }
}