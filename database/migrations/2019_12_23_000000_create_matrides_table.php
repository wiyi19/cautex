<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatridesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden')->nullable();
            $table->string('texto1')->nullable();
            $table->longtext('texto2')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrides');
    }
}