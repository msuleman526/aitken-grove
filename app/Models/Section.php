<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    protected $fillable = [
        'page_id',
        'key',
        'heading',
        'subheading',
        'content_json',
        'position',
        'is_visible'
    ];

    protected $casts = [
        'content_json' => 'array',
        'is_visible' => 'boolean'
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
