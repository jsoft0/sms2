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
        // Schema::create('attendences', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('student_id');
        //     $table->foreign('student_id')->references('id')->on('students');
        //     $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        //     $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade');
        //     $table->string('status');
        //     $table->date('date');
        //     $table->timestamps();
        // });


        Schema::create('attendences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('status');
            $table->date('date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendences');
    }
};
