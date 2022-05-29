<?php
/**
 *  app/Repositories/ProductRepositoryInterface.php
 *
 * Date-Time: 30.07.21
 * Time: 10:35
 * @author suspended values
 */
namespace App\Repositories;


use App\Http\Requests\Admin\UserRequest;


interface ModeratorRepositoryInterface
{

    /**
     * @param UserRequest $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData(UserRequest $request, array $with = []);
}
