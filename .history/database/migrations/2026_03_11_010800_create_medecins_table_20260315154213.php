<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medecins', function (Blueprint $table) {

            $table->id();

            $table->string('nom');

            $table->string('email')->unique();

            $table->string('telephone')->nullable();

            $table->foreignId('section_id')->nullable()->constrained('sections');

            $table->string('adresse')->nullable();

            $table->integer('experience')->nullable();

            $table->text('description')->nullable();

            $table->string('image')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};