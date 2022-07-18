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
        Schema::create('vscode_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vscode_id');
            $table->string('project');
            $table->string('file');
            $table->string('languageId');
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
        Schema::dropIfExists('vscode_settings');
    }
};
