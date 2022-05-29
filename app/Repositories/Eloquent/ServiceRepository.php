<?php
/**
 *  app/Repositories/Eloquent/ServiceRepository.php
 *
 * Date-Time: 06.08.21
 * Time: 14:58
 * @author Suspended Values
 */

namespace App\Repositories\Eloquent;


use App\Models\Service;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\ServiceRepositoryInterface;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    /**
     * @param Service $model
     */
    public function __construct(Service $model)
    {
        parent::__construct($model);
    }

}
