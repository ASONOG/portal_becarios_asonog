<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'assignment_id',
        'title',
        'type',
        'description',
        'file_path',
        'file_name',
        'file_mime_type',
        'file_size',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'file_size' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function getFileSizeFormattedAttribute(): string
    {
        $bytes = $this->file_size ?? 0;
        if ($bytes < 1024) return "{$bytes} B";
        if ($bytes < 1048576) return round($bytes / 1024, 1) . ' KB';
        return round($bytes / 1048576, 1) . ' MB';
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pendiente'  => 'Pendiente',
            'aprobado'   => 'Aprobado',
            'rechazado'  => 'Rechazado',
            default      => ucfirst($this->status),
        };
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'informe'    => 'Informe',
            'documento'  => 'Documento',
            'asignacion' => 'Asignación',
            'otro'       => 'Otro',
            default      => ucfirst($this->type),
        };
    }

    public function getDownloadUrlAttribute(): string
    {
        return Storage::url($this->file_path);
    }
}
