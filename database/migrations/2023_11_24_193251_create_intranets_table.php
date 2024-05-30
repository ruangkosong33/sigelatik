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
        Schema::create('intranets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('instance')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->string('bandwith')->nullable();
            $table->string('download')->nullable();
            $table->string('upload')->nullable();
            $table->string('manage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intranets');
    }
};
