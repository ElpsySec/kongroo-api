<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateContentGistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('content_gists', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("provider")->default('github');
            $table->string("gist_id")->nullable();
            $table->string("gist_src")->nullable();
            $table->status();
            $table->trackableTimestamps();
            $table->restorableSoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema()->dropIfExists('content_gists');
    }
}