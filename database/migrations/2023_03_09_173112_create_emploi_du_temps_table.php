<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploiDuTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->foreignId('idsalle')->references('idsalle')->on('salles');
            $table->string('idprof');
            $table->foreign('idprof')->references('idprof')->on('professeurs');
            $table->string('idclasse');
            $table->foreign('idclasse')->references('idclasse')->on('classes');
            $table->string('cours');
            $table->dateTime('date');
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
        Schema::dropIfExists('emploi_du_temps');
    }
}
?>
