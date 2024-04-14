<?php

namespace App\Http\Controllers;

use App\Enums\LearnableGroup;
use App\Models\Learnable;
use App\Models\Project;
use App\Models\Skill;
use App\Utils\ApiResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioDataApiController extends Controller
{
    protected function formatLearnable(Learnable $learnable): array
    {
        return  [
            'id' => $learnable->id,
            'name' => $learnable->name,
            'icon' => $learnable->icon,
            'level' => $learnable->level,
            'group' => $learnable->group->value,
        ];
    }

    protected function formatLearnables(Collection $learnableCollection): array
    {
        $data = [];
        foreach ($learnableCollection as $learnable) {
            $data[$learnable->slug] = $this->formatLearnable($learnable);
        }
        return $data;
    }

    protected function formatProject(Project $project, $full = false): array
    {
        return [
            'id' => $project->id,
            'cmd' => $project->cmd,
            'type' => $project->type,
            'title' => $project->title,
            'status' => $project->status->value,
            'description' => $project->description,
            'project_link' => $project->project_link,
            'source_code_link' => $project->source_code_link,
            'languages' => (!$full) ?$project->learnables()->pluck('slug')->toArray() : $this->formatLearnables($project->learnables),
            'image' => $project->image ? url(Storage::url($project->image)) : null,
        ];
    }

    protected function formatProjects(Collection $projectCollection, $full = false): array
    {
        $data = [];
        foreach ($projectCollection as $project) {
            $data[] = $this->formatProject($project, $full);
        }
        return $data;
    }

    public function skills(): JsonResponse
    {
        return response()->json(Skill::pluck('name')->toArray());
    }

    public function learnables(Request $request): JsonResponse
    {
        $search = $request->query('search');
        return ApiResponse::json($this->formatLearnables(Learnable::when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))->get()));
    }

    public function learnablesByGroup($group, Request $request): JsonResponse
    {
        $group = LearnableGroup::tryFrom($group);
        $search = $request->query('search');

        if (!$group) {
            return ApiResponse::json(LearnableGroup::toArray(), 400, 'Invalid group. Possible values are provided in the response.');
        }
        return ApiResponse::json($this->formatLearnables(Learnable::where('group', $group)->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))->get()));
    }

    public function learnable(Learnable $learnable): JsonResponse
    {
        return ApiResponse::json($this->formatLearnable($learnable));
    }

    public function projects(Request $request): JsonResponse
    {
        $search = $request->query('search');
        return ApiResponse::json($this->formatProjects(Project::when($search, fn ($query) => $query->where('title', 'like', "%{$search}%"))->get()));
    }

    public function project(Project $project): JsonResponse
    {
        return ApiResponse::json($this->formatProject($project));
    }
}
