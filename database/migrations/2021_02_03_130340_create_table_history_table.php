<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->integer('template_id');
            $table->integer('position');
            $table->dateTime('datetime_interview')->nullable();
            $table->date('date_work')->nullable();
            $table->string('candidate_email');
            $table->float('salary')->default(0);
            $table->text('content');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('history');
    }
}
