<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->increments('id');
            $table->String('titre');
            $table->String('image');
            $table->String('langue');
            $table->integer('qte');
            $table->double('prix');
            // foreign Auteur
            $table->integer('idauteur')->unsigned();
            $table->foreign('idauteur')->references('id')->on('auteurs')->onDelete('cascade');
            // foreign genre
            $table->integer('idgenre')->unsigned();
            $table->foreign('idgenre')->references('id')->on('genres')->onDelete('cascade');
            // foreign Tag
            $table->integer('idtag')->unsigned();
            $table->foreign('idtag')->references('id')->on('tages')->onDelete('cascade');
            $table->String('resume');            
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
        Schema::table('livres', function (Blueprint $table) {
            $table->dropForeign(['idgenre']);
            $table->dropForeign(['idauteur']);
            $table->dropForeign(['idtag']);
        });
        Schema::dropIfExists('livres');
    }
}
