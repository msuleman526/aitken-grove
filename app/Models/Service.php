<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'meta_title',
        'meta_description',
        'canonical_url',
        'meta_robots',
        'button_text',
        'about_title',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected function canonicalUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?: url("/service/{$this->slug}"),
        );
    }

    protected function metaRobots(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?: 'index, follow',
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getHeroBackgroundUrl(): string
    {
        // For now, always use the default background
        return asset('images/service-cover.png');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('title', 'asc');
    }

    public function getColoredAboutTitle(): string
    {
        if (!$this->about_title) {
            return '';
        }

        $title = $this->about_title;

        // Define color mappings
        $colorMappings = [
            '#E62D5B' => [ // Primary color
                'good health', 'confidence', 'circumcision', "skin's health",
                'Immunisation is one of the safest', 'We help you', 'healthy weight loss',
                'Our doctors are trained', 'We provide compassionate care',
                'unique health concerns', "women's health services",
                'patients with low iron levels', 'safe and supportive space', 'thorough assessments'
            ],
            '#5EC6C8' => [ // Teal color
                'support for patients', 'mental health', 'fast', 'reliable results',
                'care at every stage of life', 'proactive', 'confidential, and professional',
                'pregnancy', 'safe use', 'just dieting', 'expert medical guidance',
                'prevent serious illness', 'skin cancer care services', 'highest safety standards',
                'cosmetic care services', 'family health care services'
            ],
            '#00000080' => [ // Gray color
                'compassionate', 'continuous', 'restore', 'refresh, and rejuvenate',
                'important decision', 'checks', 'timely diagnoses', 'all recommended',
                'preventive care', 'expert guidance', 'tailoring treatment plans',
                'medical guidance', 'professional care', 'transport accidents'
            ],
            '#17687F' => [ // Dark teal color
                'return to normal life', 'emotional', 'psychological, and social wellbeing',
                'professional supervision', 'motherhood and beyond', 'support every stage of life',
                'support for both mother and baby', 'your individual needs', 'reach your goals safely',
                'your destination', 'children, adults, and seniors', 'expert treatment',
                'supportive environment for families', 'feel comfortable and confident',
                'no matter the age or stage of life'
            ]
        ];

        // Sort phrases by length (longest first) to avoid partial matches
        $allPhrases = [];
        foreach ($colorMappings as $color => $phrases) {
            foreach ($phrases as $phrase) {
                $allPhrases[] = ['phrase' => $phrase, 'color' => $color];
            }
        }
        
        usort($allPhrases, function($a, $b) {
            return strlen($b['phrase']) - strlen($a['phrase']);
        });

        // Apply colors
        foreach ($allPhrases as $item) {
            $phrase = $item['phrase'];
            $color = $item['color'];
            
            // Case-insensitive search and replace
            $pattern = '/' . preg_quote($phrase, '/') . '/i';
            $replacement = '<span style="color: ' . $color . ';">$0</span>';
            $title = preg_replace($pattern, $replacement, $title, 1); // Replace only first occurrence
        }

        return $title;
    }
}
