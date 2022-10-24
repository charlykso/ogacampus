<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiveawaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giveaways', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('users');
            $table->unsignedInteger('school_id');
            $table->string('type', 21);
            $table->foreign('school_id')->references('id')->on('schools');
            $table->integer('max_count');
            $table->json('beneficiaries')->nullable();
            $table->boolean('is_active')->default(1);
            $table->decimal('amount');
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
        Schema::dropIfExists('giveaways');
    }
}
