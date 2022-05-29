<?php
/**
 *  app/Models/Translations/ServiceTranslation.php
 *
 * Date-Time: 06.08.21
 * Time: 14:53
 * @author Suspended Values
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends BaseTranslationModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
    ];
}
