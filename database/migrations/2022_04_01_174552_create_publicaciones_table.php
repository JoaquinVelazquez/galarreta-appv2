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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->string('publicacion_id');
            $table->string('nombre');
            $table->string("marca");
            $table->decimal('precio', $precision = 15, $scale = 2);
            $table->string('imagen');
            $table->string('tipo');
            $table->string('full');
            $table->string('flex');
            $table->string('categoria_id');
            $table->string('categoria_principal_id')->nullable();
            $table->string('status');
            $table->string('pais');
            $table->integer('seller_id');
            $table->string('link');
            $table->integer('visitas_30_dias')->nullable();
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
        Schema::dropIfExists('publicaciones');
    }
};
