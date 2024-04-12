<?php

namespace Database\Seeders;

use App\Models\Learnable;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode('[{"type":"PHP Framework","languages":["php"],"tags":["framework"],"source_code_link":"https://github.com/hind-sagar-biswas/php_launcher/","image":null,"status":"beta","title":"PHP Launcher","description":"It is a framework for PHP developers to get a quick start with their projects with the highest control and lowest learning curve!"},{"type":"Composer Library","languages":["php"],"tags":["library","query builder"],"cmd":"composer require hindbiswas/quebee","project_link":"https://packagist.org/packages/hindbiswas/quebee","source_code_link":"https://github.com/hind-sagar-biswas/quebee/","image":null,"status":"stable","title":"QueBee","description":"The QueBee Class is a lightweight composer package to help you through MySQL query build and management like breeze."},{"type":"Composer Library","languages":["php"],"tags":["library","env","env manager"],"cmd":"composer require hindbiswas/phpdotenv","project_link":"https://packagist.org/packages/hindbiswas/phpdotenv","source_code_link":"https://github.com/hind-sagar-biswas/phpdotenv/","image":null,"status":"stable","title":"PHP dotEnv","description":"The phpdotenv Class is a lightweight composer package to help you load and manage PHP .env variables."},{"type":"PyPI Package","languages":["py"],"tags":["library","web scrapper"],"cmd":"pip install ScrapPyJS","project_link":"https://pypi.org/project/ScrapPyJS/","source_code_link":"https://github.com/hind-sagar-biswas/ScrapPyJS/","image":null,"status":"stable","title":"ScrapPyJS","description":"The ScrapPyJS class provides functionality for web scraping using Selenium were you can Scrap data via running JS script directly from python."},{"type":"Web Tool","languages":["js","html","css"],"tags":["tool","generator"],"cmd":null,"project_link":"http://coderaptors.epizy.com/cssgen/","source_code_link":"https://github.com/hind-sagar-biswas/cssgen","image":null,"status":"stable","title":"CSS Gen","description":"A Free GUI (Graphical User Interface) web tool to generate CSS codes visually. Change the values and see those changes live!"},{"type":"Web App","languages":["php","mysql","js","laravel","django"],"tags":["bookmarking site","ajax","bookmarking site"],"cmd":null,"project_link":null,"source_code_link":"https://github.com/hind-sagar-biswas/shiniMark","image":"https://github.com/hind-sagar-biswas/shiniMark/blob/c801a8a7feb6375d990331b0cc38caf280eeba75/assets/images/logo.png","status":"stable","title":"ShiniMark","description":"A personal bookmark management site using AJAX & PHP. There are other versions in Djang and Laravel in other branches."},{"type":"GUI App","languages":["py"],"tags":["native app","gui","qt5","reader"],"cmd":null,"project_link":null,"source_code_link":"https://github.com/hind-sagar-biswas/Ramayana","image":"https://github.com/hind-sagar-biswas/Ramayana/blob/817b680ed82c7109377e31b378c0051e1c91fe0a/src/images/ramayana.png","status":"stable","title":"Ramayana Reader","description":"A python GUI reader for Valmiki Ramayana with Sanskrit Slokas and English meanings with Sloka breakdowns."},{"type":"Web tool","languages":["js","html","css"],"tags":["algorithm","visualizer","bfs","dfs"],"cmd":null,"project_link":"https://hind-sagar-biswas.github.io/pathfindr/","source_code_link":"https://github.com/hind-sagar-biswas/pathfindr","image":null,"status":"stable","title":"PathFindr","description":"A visualizer of path finder algorithms. Both The BFS and DFS algorithms. DFS -> Maze generator, BFS -> pathfinder"},{"type":"PHP Object","languages":["php","mysql"],"tags":["package","OOP","user login"],"cmd":null,"project_link":null,"source_code_link":"https://github.com/hind-sagar-biswas/logger","image":null,"status":"stable","title":"Logger","description":"PHP login and registration system in OOP with Remember me system implemented securely with cookies!"},{"type":"PHP Object","languages":["php","mysql"],"tags":["package","OOP","like-unlike"],"cmd":null,"project_link":null,"source_code_link":"https://github.com/hind-sagar-biswas/unLaiked","image":null,"status":"stable","title":"unLaiked","description":"PHP OOP Like-unlike system (along with MySQL) for comments and posts. Ready to implement to your project!"},{"type":"Web App","languages":["php","js","mysql","css"],"tags":["cheatsheet","compiler","mcq test"],"cmd":null,"project_link":"http://coderaptors.epizy.com/c/","source_code_link":"https://github.com/hind-sagar-biswas/c-made-easy","image":null,"status":"alpha","title":"C Made Easy","description":"Cheatsheet, MCQ Tests, begginer to intermediate problems and Online compiler for C programmers."},{"type":"Web App","languages":["js","css","react"],"tags":["react","weather app","fetch api"],"cmd":null,"project_link":"https://hind-sagar-biswas.github.io/weather-react/","source_code_link":"https://github.com/hind-sagar-biswas/weather-react","image":null,"status":"stable","title":"Weather React","description":"React based weather app with sleek minimalistic design. Uses Fetch API and Geolocation to retract weather data."}]', true);

        foreach ($data as $project) {
            $fields = ['name', 'type', 'tags', 'cmd', 'project_link', 'source_code_link', 'status', 'title', 'description'];
            $project_data = [];
            foreach ($fields as $key) {
                if (array_key_exists($key, $project)) {
                    $project_data[$key] = $project[$key];
                }
            }

            $p = Project::create($project_data);

            foreach ($project['languages'] as $slug) {
                $language = Learnable::where('slug', $slug)->first();
                $p->learnables()->attach($language->id);
            }
        }
    }
}
