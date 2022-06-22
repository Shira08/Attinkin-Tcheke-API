<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodbagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloodbags', function (Blueprint $table) {
                $table->id();
                $table->string('bloodgroup');
                $table->integer('volume');
                $table->integer('quantity');
                $table->unsignedBigInteger('hopital_id');
                $table->foreign('hopital_id')
                      ->references('id')
                      ->on('hopitals')
                      ->cascade('delete');
                $table->softDeletes();
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
        Schema::dropIfExists('bloodbags');
    }
}
