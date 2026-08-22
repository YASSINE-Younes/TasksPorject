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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();

            $table->enum('status' ,['pending' , 'in_progress' , 'completed'])->default('pending');
            $table->enum('priority' ,['low' , 'medium' , 'high'])->default('medium');

            $table->date('due_date');

            // Foreign Key User ID
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
