<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_prductos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsers');
            $table->unsignedBigInteger('idProductos');

            $table->foreign('idUsers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idProductos')->references('id')->on('productos')->onDelete('cascade');
            
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
        Schema::dropIfExists('users_prductos');
    }
};
