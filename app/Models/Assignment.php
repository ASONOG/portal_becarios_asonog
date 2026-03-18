<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assignment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'due_date',
        'created_by',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    /** Entrega de un becario específico para esta solicitud */
    public function submissionByUser(int $userId): ?Document
    {
        return $this->documents()->where('user_id', $userId)->first();
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'informe'   => 'Informe',
            'documento' => 'Documento',
            'otro'      => 'Otro',
            default     => ucfirst($this->type),
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'activa'  => 'Activa',
            'cerrada' => 'Cerrada',
            default   => ucfirst($this->status),
        };
    }

    public function isActive(): bool
    {
        return $this->status === 'activa';
    }

    public function isOverdue(): bool
    {
        return $this->due_date && $this->due_date->isPast() && $this->status === 'activa';
    }
}
