<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable=[
        "title",
        "description",
        "status",
        "priority",
        "created_by",
        "assignated_to",
        "list_id",
        "due_date",
        "position"
    ];


    protected $dates = ['due_date'];


    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }


    public function list(): BelongsTo
    {
        return $this->belongsTo(Lists::class, 'list_id');
    }
}
