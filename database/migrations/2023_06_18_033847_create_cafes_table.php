<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->float('suasana', 12, 10);
            $table->float('kenyamanan', 12, 10);
            $table->float('kualitas', 12, 10);
            $table->float('harga', 12, 10);
            $table->float('wifi', 12, 10);
            $table->float('pelayanan', 12, 10);
            $table->float('kebersihan', 12, 10);
            $table->float('lokasi', 12, 10);
            $table->float('menu_unik', 12, 10);
            $table->float('respon_pelanggan', 12, 10);
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
        Schema::dropIfExists('cafes');
    }
}
