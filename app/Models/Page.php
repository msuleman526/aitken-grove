<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'hero_cta_label',
        'hero_cta_url',
        'hero_title',
        'hero_description',
        'hero_stats',
        'opening_hours',
        'contact_phone',
        'contact_email',
        'meta_title',
        'meta_description',
        'canonical_url',
        'meta_robots',
        'open_graph_json',
        'published_at'
    ];

    protected $casts = [
        'open_graph_json' => 'array',
        'hero_stats' => 'array',
        'published_at' => 'datetime'
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class)->orderBy('position');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }
}
