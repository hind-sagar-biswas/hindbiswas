<?php

namespace Database\Seeders;

use App\Enums\LearnableGroup;
use App\Models\Learnable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LearnableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            'html' => ['icon' => ["fa-brands", "fa-html5"], 'name' => "HTML 5", 'level' => 5],
            'css' => ['icon' => ["fa-brands", "fa-css3"], 'name' => "CSS 3", 'level' => 5],
            'js' => ['icon' => ["fa-brands", "fa-js"], 'name' => "JavaScript", 'level' => 5],
            'py' => ['icon' => ["fa-brands", "fa-python"], 'name' => "Python", 'level' => 5],
            'php' => ['icon' => ["fa-brands", "fa-php"], 'name' => "PHP 8", 'level' => 5],
            'mysql' => ['icon' => ["fa-solid", "fa-database"], 'name' => "MySQL", 'level' => 5],
            'sqlite' => ['icon' => ["fa-solid", "fa-database"], 'name' => "SQLite", 'level' => 5],
            'node' => ['icon' => ["fa-brands", "fa-node-js"], 'name' => "NodeJS", 'level' => 5],
            'c' => ['icon' => ["fa-solid", "fa-file-code"], 'name' => "C", 'level' => 4],
            'cpp' => ['icon' => ["fa-solid", "fa-file-code"], 'name' => "C++", 'level' => 4],
            'rust' => ['icon' => ["fa-brands", "fa-rust"], 'name' => "Rust", 'level' => 2],
            'lua' => ['icon' => ["fa-solid", "fa-microchip"], 'name' => "Lua", 'level' => 4],
        ];

        $frameworks = [
            'laravel' => ['icon' => ["fa-brands", "fa-laravel"], 'name' => "Laravel 10", 'level' => 5,],
            'django' => ['icon' => ["fa-brands", "fa-python"], 'name' => "Django", 'level' => 4],
            'uikit' => ['icon' => ["fa-brands", "fa-uikit"], 'name' => "UiKit", 'level' => 5],
            'bs' => ['icon' => ["fa-brands", "fa-bootstrap"], 'name' => "Bootstrap", 'level' => 5],
            'vue' => ['icon' => ["fa-brands", "fa-vuejs"], 'name' => "Vue", 'level' => 5],
            'react' => ['icon' => ["fa-brands", "fa-react"], 'name' => "React", 'level' => 2],
            'reactNative' => ['icon' => ["fa-brands", "fa-react"], 'name' => "React Native", 'level' => 3],
            'nextJs' => ['icon' => ["fa-brands", "fa-node-js"], 'name' => "Next JS", 'level' => 2],
            'tailwind' => ['icon' => ["fa-brands", "fa-tailwind"], 'name' => "Tailwind", 'level' => 5],
        ];


        foreach ($languages as $slug => $language) {
            Learnable::create([
                'slug' => $slug,
                'name' => $language['name'],
                'level' => $language['level'],
                'group' => LearnableGroup::LANGUAGE,
                'icon' => json_encode($language['icon']),
            ]);
        }

        foreach ($frameworks as $slug => $framework) {
            Learnable::create([
                'slug' => $slug,
                'name' => $framework['name'],
                'level' => $framework['level'],
                'group' => LearnableGroup::FRAMEWORK,
                'icon' => json_encode($framework['icon']),
            ]);
        }
    }
}
