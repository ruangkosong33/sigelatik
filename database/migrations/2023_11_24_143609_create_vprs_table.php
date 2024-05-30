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
        Schema::create('vprs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('needs')->nullable();
            $table->date('date')->nullable();
            $table->string('ip_public')->nullable();
            $table->string('ip_local')->nullable();
            $table->string('storage')->nullable();
            $table->string('core')->nullable();
            $table->string('ram')->nullable();
            $table->string('port')->nullable();
            $table->string('database')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vprs');
    }
};
