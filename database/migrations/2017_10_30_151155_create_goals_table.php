<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',300);
            $table->string('description',2500)->nullable();
            $table->integer('is_public');
            $table->integer('user_id');
            $table->integer('nr_encouragements')->default(0);
            $table->integer('status_id')->default(1);
            $table->string('goal_picture')->nullable();
            $table->string('cathegory',300)->default('goal');
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
        Schema::dropIfExists('goals');
    }
}
