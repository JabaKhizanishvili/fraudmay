<?php
/**
 *  app/Repositories/Eloquent/ProjectRepository.php
 *
 * Date-Time: 30.07.21
 * Time: 10:36
 * @author suspended values
 */

namespace App\Repositories\Eloquent;


use App\Models\Project;
use App\Models\Team;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\TeamRepositoryInterface;

/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
    /**
     * @param \App\Models\Team $model
     */
    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

}
