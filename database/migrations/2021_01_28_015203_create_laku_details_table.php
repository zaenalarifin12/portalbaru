<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLakuDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laku_detail', function (Blueprint $table) {
            $table->id();
            $table->integer("jumlah");
            $table->integer("total");
            $table->unsignedBigInteger("great_id");
            $table->unsignedBigInteger("hasil_penjualan_id");
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
        Schema::dropIfExists('laku_detail');
    }
}
