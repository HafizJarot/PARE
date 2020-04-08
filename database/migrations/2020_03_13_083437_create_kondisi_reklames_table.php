<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisiReklamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_reklames', function (Blueprint $table) {
            $table->char('id', '3')->unique();
            $table->char('id_reklame','3')->unique();
            $table->integer('masa_berlaku');
            $table->text('keterangan');
            $table->integer('harga_sewa');
            $table->timestamps();

            $table->foreign('id_reklame')->references('id')->on('reklames')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kondisi_reklames');
    }
}
