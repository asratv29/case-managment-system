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
        Schema::create('submitted_cases', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('username');
            $table->string('dept');
            $table->string('year');
            $table->string('semister');
            $table->integer('phone');
            $table->string('gender');

            $table->string('response');
            $table->string('caseHandler');
            $table->string('description');
            $table->string('rdescription');

            $table->text('case');
            $table->text('file');
            $table->string('token');

            $table->string('session');
            $table->integer('tracking');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitted_cases');
    }
};
