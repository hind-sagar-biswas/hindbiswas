<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "UI/UX Design",
            "Database Design",
            "Critical Thinking",
            "Problem Solving",
            "Fluent English",
        ];
        foreach ($data as $skill) {
            \App\Models\Skill::create([
                'name' => $skill
            ]);
        }
    }
}
