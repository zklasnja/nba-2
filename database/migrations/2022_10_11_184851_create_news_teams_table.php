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
        Schema::create('news_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained();
            $table->foreignId('team_id')->constrained();
            // $table->primary(['news_id', 'team_id']);
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
        Schema::dropIfExists('news_teams');
    }
};
