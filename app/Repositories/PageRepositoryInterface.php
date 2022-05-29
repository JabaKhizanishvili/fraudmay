<?php
/**
 *  app/Repositories/ProductRepositoryInterface.php
 *
 * Date-Time: 30.07.21
 * Time: 10:35
 * @author suspended values
 */
namespace App\Repositories;


use App\Http\Requests\Admin\PageRequest;


interface PageRepositoryInterface
{

    /**
     * @param PageRequest $request
     * @param array $with
     *
     * @return mixed
     */
    public function getData(PageRequest $request, array $with = []);
}
