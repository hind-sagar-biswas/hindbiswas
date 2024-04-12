<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LanguageType extends Model
{
    use HasFactory;
   
    public function learnables(): HasMany
    {
        return $this->hasMany(Learnable::class);
    }
}
