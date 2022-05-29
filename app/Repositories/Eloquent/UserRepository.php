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
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Profiler\Profile;

/**
 * Class LanguageRepository
 * @package App\Repositories\Eloquent
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
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
        $attributes['balance'] = json_encode($attributes['balance']);
        $attributes['crypto_address'] = json_encode($attributes['crypto_address']);
        $attributes['password'] = Hash::make($attributes['password']);

        $attributes['is_send_email'] = isset($attributes['is_send_email']) ?? false;

        $userAttributes = Arr::except($attributes, ['name', 'surname', 'phone']);

        try {
            $user = $this->model->create($userAttributes);
            UserProfile::create([
                'user_id' => $user->id,
                'name' => $attributes['name'],
                'surname' => $attributes['surname'],
                'phone' => $attributes['phone'],
            ]);


            if ($userAttributes['is_send_email']) {
                $sendData = [
                    'status' => $user->status == "approved",
                    'type' => 'create',
                    'subject' => $user->status == "approved" ? 'Your Account has been Approved' : "Your account has been created",
                    'view' => 'admin.email.status-change',
                ];
                Mail::to($user->email)->send(new ContactEmail($sendData));
            }


            return $user;

        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }
    }

    public function update(int $id, array $data = [])
    {

        $this->model = $this->findOrFail($id);

        $data['balance'] = json_encode($data['balance']);
        $data['crypto_address'] = json_encode($data['crypto_address']);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data['password'] = $this->model->password;
        }

        $data['is_send_email'] = isset($data['is_send_email']) ?? false;


        try {
            $this->model->profile->update([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'phone' => $data['phone']
            ]);
//
//            if ($data['status'] !== $this->model->getOriginal('status') && $data['status'] == 'approved') {
//                $sendData = [
//                    'name' => $this->model->profile->name,
//                    'subject' => 'Your Status is Changed',
//                    'view' => 'admin.email.status-change',
//                    'email' => $this->model->email
//                ];
//                Mail::to($this->model->email)->send(new ContactEmail($sendData));
//            }

            if ($data['is_send_email']) {
                $sendData = [
                    'status' => $data['status'] !== $this->model->getOriginal('status') && $data['status'] == 'approved',
                    'type' => 'update',
                    'subject' => $data['status'] !== $this->model->getOriginal('status') && $data['status'] == 'approved' ? 'Your Account is Approved' : "Your account has been updated",
                    'view' => 'admin.email.status-change',
                ];
                Mail::to($this->model->email)->send(new ContactEmail($sendData));
            }

            return $this->model->update($data);
        } catch (\Illuminate\Database\QueryException $exception) {
            return $exception->errorInfo;
        }

    }

}
