<?php

use Illuminate\Support\Facades\Schema;
use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema()->create('app_data', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string("name", 64);
            $table->string("display_name", 64);
            $table->string("twitter_username", 64);
            $table->string("github_username", 64);
            $table->string("medium_username", 64);
            $table->stamps();
            $table->actions();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_data');
    }
}
