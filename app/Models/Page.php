<?php

namespace App\Models;

use App\Models\Translations\PageTranslation;
use App\Traits\ScopeFilter;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, Translatable, HasFactory, ScopeFilter;


    protected $table = 'pages';

    protected $fillable = [
        'key',
        'video_link'
    ];

    protected $translationModel = PageTranslation::class;

    public $translatedAttributes = [
        'title_1',
        'title_2',
        'content_1',
        'content_2',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];


    public function getFilterScopes(): array
    {
        return [
            'id' => [
                'hasParam' => true,
                'scopeMethod' => 'id'
            ],
            'key' => [
                'hasParam' => true,
                'scopeMethod' => 'key'
            ],
            'title_1' => [
                'hasParam' => true,
                'scopeMethod' => 'title1Translation'
            ],
            'title_2' => [
                'hasParam' => true,
                'scopeMethod' => 'title2Translation'
            ]
        ];
    }


    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
