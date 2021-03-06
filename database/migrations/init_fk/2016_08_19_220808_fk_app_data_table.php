<?php

use Illuminate\Support\Facades\Schema;
use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FKAppDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->table('app_data', function (Blueprint $table) {

            $table->fkActions();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->table('app_data', function (Blueprint $table) {

            $table->dropActions();

        });
    }
}
