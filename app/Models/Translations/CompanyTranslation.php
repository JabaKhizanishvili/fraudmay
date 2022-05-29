<?php
/**
 *  app/Models/Translations/ProjectTranslation.php
 *
 * Date-Time: 30.07.21
 * Time: 10:34
 * @author suspended values
 */

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends BaseTranslationModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'content_1',
        'content_2',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
}
