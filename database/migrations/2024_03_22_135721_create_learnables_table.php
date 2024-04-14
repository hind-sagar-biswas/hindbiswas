<?php

use App\Enums\LearnableGroup;
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
        Schema::create('learnables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('icon')->nullable();
            $table->smallInteger('level')->default(1);
            $table->enum('group', LearnableGroup::toArray());
            $table->foreignId('language_type_id')->nullable()->constrained('language_types')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learnables');
    }
};
