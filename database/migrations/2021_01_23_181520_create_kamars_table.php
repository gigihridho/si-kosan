<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_kamar',3)->unique();
            $table->boolean('status')->default(true);
            $table->integer('tipe_kamar_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('tipe_kamar_id')
                ->references('id')->on('tipe_kamars')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
