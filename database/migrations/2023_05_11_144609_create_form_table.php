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
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->date('receivedDate');
            $table->bigInteger('customerID');
            $table->string('brandName');
            $table->string('modelName');
            $table->string('password');
            $table->string('probDesc');
            $table->string('probType')->nullable();
            $table->string('solution')->nullable();
            $table->string('product')->nullable();
            $table->string('managedBy')->nullable();
            $table->date('dueDate')->nullable();
            $table->string('payment')->nullable();
            $table->string('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form');
    }
};
