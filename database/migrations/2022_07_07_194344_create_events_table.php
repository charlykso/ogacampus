<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('school_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->dateTime('event_date');
            $table->text('description');
            $table->json('pictures');
            $table->boolean('isFree');
            $table->json('ticket_price');
            $table->enum('status', ['active', 'expired', 'pending', 'review']);
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
        Schema::dropIfExists('events');
    }
}
