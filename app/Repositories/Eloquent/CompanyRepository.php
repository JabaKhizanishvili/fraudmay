<?php
/**
 *  app/Repositories/Eloquent/ProjectRepository.php
 *
 * Date-Time: 30.07.21
 * Time: 10:36
 * @author suspended values
 */

namespace App\Repositories\Eloquent;


use App\Models\Company;
use App\Models\Project;
use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\Eloquent\Base\BaseRepository;
use Illuminate\Support\Arr;


/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    /**
     * @param \App\Models\Company $model
     */
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes = [], array $projects = null): Company
    {
        try {
            $model = $this->model->create($attributes);
            if ($projects) {
                Project::whereIn('id', $projects)->update([
                    'company_id' => $model->id
                ]);
            }
            return $model;
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }

    public function update(int $id, array $attributes = [], array $projects = null): Company
    {
        $model = $this->findOrFail($id);
        try {
            $model->update($attributes);

            Project::where(['company_id' => $model->id])->update([
                'company_id' => null
            ]);

            if ($projects) {
                Project::whereIn('id', $projects)->update([
                    'company_id' => $model->id
                ]);
            }

            return $model;
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }
}
