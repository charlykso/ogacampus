<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->unsignedInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('captured_photo');
            $table->string('id_card');
            $table->enum('status', ['approved', 'denied', 'pending'])->default('pending');
            $table->string('comment')->nullable();
            $table->bigInteger('staff_id')->nullable()->unsigned();
            $table->foreign('staff_id')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('verifications');
    }
}
