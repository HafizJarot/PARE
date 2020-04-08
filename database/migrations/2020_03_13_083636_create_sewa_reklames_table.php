<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaReklamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_reklames', function (Blueprint $table) {
            $table->char('id','3')->unique();
            $table->string('nama_usaha','40');
            $table->text('lokasi');
            $table->string('nama_pemilik','30');
            $table->date('tanggal_sewa');
            $table->date('tanggal_berakhir');
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
        Schema::dropIfExists('sewa_reklames');
    }
}
