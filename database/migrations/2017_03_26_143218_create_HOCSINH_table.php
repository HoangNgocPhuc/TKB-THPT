<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatehocsinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinh', function (Blueprint $table) {
            Schema::dropIfExists('hocsinh');
            $table->increments('id');
            $table->string('malop');
            $table->string('mahocsinh')->unique();
            $table->string('hodem');
            $table->string('ten');
            $table->date('ngaysinh');
            //$table->foreign('malop')->references('malop')->on('lop')->onDelete('cascade');
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
        Schema::dropIfExists('hocsinh');
    }
}
