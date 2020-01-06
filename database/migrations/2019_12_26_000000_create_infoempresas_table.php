<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoempresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoempresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden')->nullable();
            $table->string('texto1')->nullable();
            $table->string('imagen1')->nullable();
            $table->string('texto2')->nullable();
            $table->string('texto3')->nullable();
            $table->string('texto4')->nullable();
            $table->string('texto5')->nullable();
            $table->string('texto6')->nullable();
            $table->string('texto7')->nullable();
            $table->string('imagen2')->nullable();
            $table->longtext('texto8')->nullable();
            $table->string('texto9')->nullable();
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
        Schema::dropIfExists('infoempresas');
    }
}