<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkLoginTokenGroupsTable extends Migration
{
    public $table = 'token_groups';

    public function up()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->fkActions();
        });
    }

    public function down()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->dropActions();
        });
    }
}
