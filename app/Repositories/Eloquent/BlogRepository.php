<?php
/**
 *  app/Repositories/Eloquent/ProjectRepository.php
 *
 * Date-Time: 30.07.21
 * Time: 10:36
 * @author suspended values
 */

namespace App\Repositories\Eloquent;


use App\Models\Blog;
use App\Models\Project;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\ProjectRepositoryInterface;

/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    /**
     * @param \App\Models\Blog $model
     */
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

}
