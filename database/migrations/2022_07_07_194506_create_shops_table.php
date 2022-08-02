<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('school_id');
            $table->string('business_name');
            $table->string('tagline')->nullable();
            $table->text('description');
            $table->string('logo')->nullable();
            $table->json('pictures')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
