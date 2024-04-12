<?php

namespace App\Models;

use App\Enums\LearnableGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Learnable extends Model
{
    use HasFactory;

    protected $casts = [
        'group' => LearnableGroup::class,
    ];

    public function languageType(): BelongsTo
    {
        return $this->belongsTo(LanguageType::class);
    }

    public function projects():BelongsToMany 
    {
        return $this->belongsToMany(Project::class, LearnableProject::class);
    }
}
