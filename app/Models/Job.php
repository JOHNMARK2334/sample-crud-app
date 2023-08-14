<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable=['name','salary','work_hours'];
    /**
     * week
     * @return HasMany
     */
    public function week(): HasMany
    {
        return $this->hasMany(Week::class);
    }
}
