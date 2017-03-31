<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGIAOVIENTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaovien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('magv')->unique();
            $table->string('tengv');
            $table->string('mamon');
            //$table->foreign('mamon')->references('mamon')->on('monhoc')->onDelete('cascade');
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
        Schema::dropIfExists('giaovien');
    }
}
