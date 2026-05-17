<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incident_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incident_id')->constrained('incidents')->cascadeOnDelete();
            $table->foreignId('analyst_id')->constrained('analysts')->cascadeOnDelete();
            $table->timestamp('assigned_at');
            $table->timestamps();

            $table->unique(['incident_id', 'analyst_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incident_assignments');
    }
};