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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('reg_no');
            $table->integer('roll_no');
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('picture');
            $table->unsignedBigInteger('class_group_id'); // Use unsignedBigInteger for the foreign key column
            $table->foreign('class_group_id')->references('id')->on('class_groups');
            $table->string('section_id');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
