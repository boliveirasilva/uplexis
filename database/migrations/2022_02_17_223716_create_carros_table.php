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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nome_veiculo');
            $table->string('link')->unique();
            $table->integer('ano');
            $table->string('combustivel');
            $table->integer('portas');
            $table->integer('quilometragem');
            $table->string('cambio');
            $table->string('cor');
            $table->string('image')->nullable();
            $table->float('preco')->nullable();
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
        Schema::dropIfExists('carros');
    }
};
