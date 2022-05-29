<?php
/**
 *  app/Models/File.php
 *
 * Date-Time: 10.06.21
 * Time: 09:55
 * @author suspended values
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * @package App\Models
 * @property integer $id
 * @property string $fileable_type
 * @property integer $fileable_id
 * @property string $title
 * @property string $path
 * @property string $format
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class File extends Model
{
    use HasFactory, softDeletes;

    public const FILE_DEFAULT = 1;
    public const FILE_MAIN = 2;
    public const DRIVER_LICENSE = 3;
    public const PASSPORT = 4;
    public const NATIONAL_ID = 5;
    public const BANK_STATEMENT = 6;
    public const SELFIE_WITH_DOCUMENT = 7;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'path',
        'format',
        'type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function fileable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user's file full url.
     *
     * @return string
     */
    public function getFileUrlAttribute(): string
    {
        return $this->path . '/' . $this->title;
    }
}
