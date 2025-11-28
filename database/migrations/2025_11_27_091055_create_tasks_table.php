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
            $table->timestamps();
            // заголовок,
            $table->string('title');
            // описание,
            $table->text('description')->nullable();
            // статус (planned, in_progress, done),
            $table->string('status');
            // дата завершения (опционально),
            $table->string('date_finished');
            // исполнитель (пользователь),
            $table->integer('assignee_user_id')->nullable();
            // вложение (опционально).
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
