<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpruntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idlivre')->unsigned();
            $table->foreign('idlivre')->references('id')->on('livres')->onDelete('cascade');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->Date('date_emprunt');
            $table->Date('date_retour');
            $table->String('statut');
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
        Schema::table('emprunts', function (Blueprint $table) {
            $table->dropForeign(['idlivre']);
            $table->dropForeign(['iduser']);
        });
        Schema::dropIfExists('emprunts');
    }
}
