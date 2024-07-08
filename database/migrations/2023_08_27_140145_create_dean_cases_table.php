<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dean_cases', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('username');
            $table->string('role');

            $table->string('dept');
            $table->string('year');
            $table->string('semister');

            $table->string('caseHandler');
            $table->string('routedCaseHandler');
            $table->text('case');
            $table->text('file');

            $table->text('description');
            $table->text('rdescription');

            $table->string('session');
            $table->boolean('tracking');
            $table->string('token');
            $table->integer('phone');
            $table->string('gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dean_cases');
    }
};
