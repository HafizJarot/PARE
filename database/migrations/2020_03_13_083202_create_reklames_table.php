<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReklamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklames', function (Blueprint $table) {
            $table->char('id','3')->unique();
            $table->integer('ukuran');
            $table->text('log')->nullable();
            $table->text('lat')->nullable();
            $table->string('pemilik','30');
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
        Schema::dropIfExists('reklames');
    }
}
