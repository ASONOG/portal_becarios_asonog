<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InternshipApplication extends Model
{
    protected $fillable = [
        'email',
        'full_name',
        'phone',
        'department',
        'municipality',
        'academic_level',
        'academic_level_other',
        'institution',
        'field_of_study',
        'semester',
        'requires_agreement',
        'internship_type',
        'availability',
        'available_from',
        'estimated_duration',
        'motivation',
        'has_community_experience',
        'source',
        'source_other',
        'cv_path',
        'status',
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'requires_agreement'       => 'boolean',
        'has_community_experience' => 'boolean',
        'available_from'           => 'date',
        'reviewed_at'              => 'datetime',
    ];

    // -------------------------
    // Constantes y labels
    // -------------------------

    public const TYPES = [
        'practica_profesional' => 'Práctica profesional (3–6 meses)',
        'pasantia'             => 'Pasantía (1–3 meses)',
        'voluntariado'         => 'Voluntariado',
        'no_definido'          => 'Aún no lo tengo claro',
    ];

    public const AVAILABILITY = [
        'tiempo_completo' => 'Tiempo completo',
        'medio_tiempo'    => 'Medio tiempo',
        'flexible'        => 'Flexible',
    ];

    public const DURATION = [
        '1_mes'     => '1 mes',
        '2_3_meses' => '2–3 meses',
        '3_6_meses' => '3–6 meses',
    ];

    public const ACADEMIC_LEVELS = [
        'estudiante_universitario'    => 'Estudiante universitario',
        'recien_egresado'             => 'Recién egresado/a',
        'profesional_con_experiencia' => 'Profesional con experiencia',
        'otro'                        => 'Otro',
    ];

    public const SOURCES = [
        'sitio_web'      => 'Sitio web de Gestión del Conocimiento',
        'redes_sociales' => 'Redes sociales',
        'universidad'    => 'Universidad',
        'recomendacion'  => 'Recomendación personal',
        'otro'           => 'Otro',
    ];

    public const STATUSES = [
        'pendiente' => 'Pendiente',
        'revisada'  => 'Revisada',
        'aceptada'  => 'Aceptada',
        'rechazada' => 'Rechazada',
    ];

    public const DEPARTMENTS = [
        'Atlántida',
        'Choluteca',
        'Colón',
        'Comayagua',
        'Copán',
        'Cortés',
        'El Paraíso',
        'Francisco Morazán',
        'Gracias a Dios',
        'Intibucá',
        'Islas de la Bahía',
        'La Paz',
        'Lempira',
        'Ocotepeque',
        'Olancho',
        'Santa Bárbara',
        'Valle',
        'Yoro',
    ];

    // -------------------------
    // Accessors
    // -------------------------

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->internship_type] ?? $this->internship_type;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? ucfirst($this->status);
    }

    public function getAcademicLevelLabelAttribute(): string
    {
        if ($this->academic_level === 'otro') {
            return $this->academic_level_other ?: 'Otro';
        }

        return self::ACADEMIC_LEVELS[$this->academic_level] ?? $this->academic_level;
    }

    public function getAvailabilityLabelAttribute(): string
    {
        return self::AVAILABILITY[$this->availability] ?? $this->availability;
    }

    public function getDurationLabelAttribute(): string
    {
        return self::DURATION[$this->estimated_duration] ?? $this->estimated_duration;
    }

    public function getSourceLabelAttribute(): string
    {
        if ($this->source === 'otro') {
            return $this->source_other ?: 'Otro';
        }

        return self::SOURCES[$this->source] ?? $this->source ?? '—';
    }

    // -------------------------
    // Relaciones
    // -------------------------

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
