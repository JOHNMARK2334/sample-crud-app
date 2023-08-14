<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','photo','email','address'];

    /**
     * week
     * @return HasMany
     */
    public function week(): HasMany 
    {
        return  $this->hasMany(Week::class);
    }

}
