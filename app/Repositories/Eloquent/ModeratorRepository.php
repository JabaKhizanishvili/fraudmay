<?php

/**
 *  app/Repositories/Eloquent/ProjectRepository.php
 *
 * Date-Time: 30.07.21
 * Time: 10:36
 * @author suspended values
 */

namespace App\Repositories\Eloquent;


use App\Jobs\SendEmailJob;
use App\Mail\ContactEmail;
use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Eloquent\Base\BaseRepository;
use App\Repositories\ModeratorRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class ModeratorRepository extends BaseRepository implements ModeratorRepositoryInterface
{
    /**
     * @param \App\Models\User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes = [])
    {
        // $attributes['crypto_address'] = json_encode($attributes['crypto_address']);
        $attributes['balance'] = 5000;
        // $attributes['crypto_address'] = "";
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['is_moderator'] = 1;
        $userAttributes = Arr::except($attributes, ['name', 'surname', 'phone']);
        try {
            $user = $this->model->create($userAttributes);
            UserProfile::create([
                'user_id' => $user->id,
                'name' => $attributes['name'],
                'surname' => $attributes['surname'],
                'phone' => $attributes['phone']
            ]);

            return $user;
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }

    public function update(int $id, array $data = [])
    {

        $this->model = $this->findOrFail($id);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $this->model->password;
        }

        try {
            $this->model->profile->update([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'phone' => $data['phone']
            ]);

            return $this->model->update($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }
}
