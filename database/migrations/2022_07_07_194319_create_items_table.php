<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('user_id');
            $table->text('description');
            $table->integer('category_id');
            $table->string('slug')->unique();
            $table->integer('school_id');
            $table->decimal('price');
            $table->json('pictures');
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
        Schema::dropIfExists('items');
    }
}
