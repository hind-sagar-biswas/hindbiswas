<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory, HasUlids;

    protected $casts = [
        'tags' => 'array',
        'status' => ProjectStatus::class,
    ];

    public function learnables(): BelongsToMany
    {
        return $this->belongsToMany(Learnable::class, LearnableProject::class);
    }
}
