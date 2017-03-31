<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLOPMONGVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_mon_gv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('malop');
            $table->string('mamon');
            $table->string('magv');
            // $table->foreign('mamon')->references('mamon')->on('monhoc')->onDelete('cascade');
            // $table->foreign('malop')->references('malop')->on('lop')->onDelete('cascade');
            // $table->foreign('magv')->references('magv')->on('giaovien')->onDelete('cascade');
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
        Schema::dropIfExists('lop_mon_gv');
    }
}
