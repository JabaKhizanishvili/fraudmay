<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends BaseTranslationModel
{
    use HasFactory;

    protected $fillable = [
        'title_1',
        'title_2',
        'content_1',
        'content_2',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];
}
