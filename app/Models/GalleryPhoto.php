<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class GalleryPhoto extends Model
{
    public const MAX_PHOTOS = 24;

    protected $fillable = [
        'title',
        'description',
        'category',
        'image_path',
        'image_name',
        'size',
        'sort_order',
        'is_active',
        'uploaded_by',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public const CATEGORY_LABELS = [
        'becarios'      => 'Becarios',
        'voluntariados' => 'Voluntariados',
        'eventos'       => 'Eventos',
        'comunidades'   => 'Comunidades',
    ];

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORY_LABELS[$this->category] ?? ucfirst($this->category);
    }

    public static function hasReachedLimit(): bool
    {
        return static::count() >= static::MAX_PHOTOS;
    }
}
