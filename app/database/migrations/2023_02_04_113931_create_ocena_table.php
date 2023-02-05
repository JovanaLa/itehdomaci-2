<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocena', function (Blueprint $table) {
            $table->id();
            $table->timestamp('datum_i_vreme');
            $table->foreignId('korisnik');
            $table->foreignId('film');
            $table->integer('ocena');
            $table->text('poruka')->nullable(); 
         
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocena');
    }
};
