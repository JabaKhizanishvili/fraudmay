<?php
/**
 *  app/Repositories/ProductRepositoryInterface.php
 *
 * Date-Time: 30.07.21
 * Time: 10:35
 * @author suspended values
 */

namespace App\Repositories;


use App\Http\Requests\Admin\CompanyRequest;


interface CompanyRepositoryInterface
{

    /**
     * @param CompanyRequest $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData(CompanyRequest $request, array $with = []);

    public function create(array $attributes = [], array $projects = null);

    public function update(int $id, array $attributes = [], array $projects = null);
}
