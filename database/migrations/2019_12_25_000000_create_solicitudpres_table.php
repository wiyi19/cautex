<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudpresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudpres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden')->nullable();
            $table->string('texto1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('imagen1')->nullable();
            $table->string('imagen2')->nullable();
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
        Schema::dropIfExists('solicitudpres');
    }
}