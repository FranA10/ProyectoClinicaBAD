<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimesSpans extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alta_medica', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('anexos', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('camilla', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('categoria_medicamento', function (Blueprint $table) {
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
        //
    }
}
