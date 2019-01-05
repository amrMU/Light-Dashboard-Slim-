<?php
/**
 * Created by PhpStorm.
 * User: Amr Muhamed
 * Date: 1/5/2019
 * Time: 2:42 PM
 */

namespace App\Repositories;


use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;


class WhatsappSettingsInfoRepositories  extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return "App\ContactInfoWhatsapp";
    }
}