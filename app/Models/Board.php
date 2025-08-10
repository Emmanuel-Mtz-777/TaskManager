<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function lists(): HasMany
    {
        return $this->hasMany(Lists::class);
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'board_user')->withPivot('role')->withTimestamps();
    }
}
