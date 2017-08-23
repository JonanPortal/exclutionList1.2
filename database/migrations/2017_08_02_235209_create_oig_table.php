<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oigs', function (Blueprint $table) {
            $table->string('LASTNAME')->nullable();
            $table->string('FIRSTNAME')->nullable();
            $table->string('MIDNAME')->nullable();
            $table->string('BUSNAME')->nullable();
            $table->string('GENERAL')->nullable();
            $table->string('ESPECIALTY')->nullable();
            $table->string('UPIN')->nullable();
            $table->string('NPI')->nullable();
            $table->string('DOB')->nullable();
            $table->string('ADDRESS')->nullable();
            $table->string('CITY')->nullable();
            $table->string('STATE')->nullable();
            $table->string('ZIP')->nullable();
            $table->string('EXCLTYPE')->nullable();
            $table->string('EXCLDATE')->nullable();
            $table->string('REINDATE')->nullable();
            $table->string('WAIVERDATE')->nullable();
            $table->string('WVRSTATE')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oigs');
    }
}
