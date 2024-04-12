<?php

use App\Enums\ProjectStatus;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->string('type');
            $table->string('cmd')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('project_link')->nullable();
            $table->string('source_code_link')->nullable();
            $table->json('tags')->default(json_encode([]));
            $table->enum('status', ProjectStatus::toArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
