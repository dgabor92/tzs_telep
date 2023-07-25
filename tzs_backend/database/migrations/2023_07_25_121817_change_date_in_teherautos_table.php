<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDateInTeherautosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teherautos', function (Blueprint $table) {
            $table->date('kilepes_datuma')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teherautos', function (Blueprint $table) {
            $table->date('kilepes_datuma')->nullable(false)->change();
        });
    }
}
