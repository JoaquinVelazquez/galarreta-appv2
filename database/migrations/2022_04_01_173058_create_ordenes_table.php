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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->integer("seller_id");
            $table->bigInteger("order_id");
            $table->string("producto_id");
            $table->bigInteger("shipping_id")->nullable();
            $table->string("producto");
            $table->integer("cantidad");
            $table->float("monto");
            $table->string("fecha");
            $table->string("plataforma");
            $table->string("divisa");
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
        Schema::dropIfExists('ordenes');
    }
};
