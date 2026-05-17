<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Analyst extends Model
{
    protected $fillable = [
        'name',
        'shift',
        'email',
    ];

    public function assignments(): HasMany
    {
        return $this->hasMany(IncidentAssignment::class);
    }

    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incident_assignments')
            ->withPivot('assigned_at')
            ->withTimestamps();
    }
}