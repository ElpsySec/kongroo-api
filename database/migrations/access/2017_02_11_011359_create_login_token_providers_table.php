<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateLoginTokenProvidersTable extends Migration
{
    public $table = 'token_providers';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {
            $table->increments('id');

            $table->nomen();

            $table->stamps();

            $table->actions();
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists($this->table);
    }
}
