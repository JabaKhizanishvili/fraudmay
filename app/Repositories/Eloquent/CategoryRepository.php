<?php
/**
 *  app/Repositories/Eloquent/CategoryRepository.php
 *
 * Date-Time: 07.06.21
 * Time: 17:02
 * @author suspended values
 */

namespace App\Repositories\Eloquent;


use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquent\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param \App\Models\Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}