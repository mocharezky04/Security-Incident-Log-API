<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incident extends Model
{
    protected $fillable = [
        'title',
        'severity',
        'status',
        'detected_at',
    ];

    protected function casts(): array
    {
        return [
            'detected_at' => 'datetime',
        ];
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(IncidentAssignment::class);
    }

    public function analysts(): BelongsToMany
    {
        return $this->belongsToMany(Analyst::class, 'incident_assignments')
            ->withPivot('assigned_at')
            ->withTimestamps();
    }
}