<?php
/**
 * 
 * User: Amr Muhamed
 * Date: 1/5/2019
 * Time: 2:42 PM
 */

namespace App\Repositories;


use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;


class PhoneSettingsInfoRepositories extends Repository
{

	/*
	**********************
	*	Get Phone with   *
	*	 primary info    *
	*	@param $id 		 *
	**********************
	*/
	public function index($primary_id)
	{
		$info = $this->findWhere(['contactinfo_id'=>$primary_id],['*']);
		return $info;
	}

	/*
	***************************************
	*	Function make decision  		  *
	*	 for save all phone related with  *
	*		 main settings 			      *
	*	@param $primary_id 		 		  *
	*	@param $data 		 		      *
	***************************************
	*/
	public function progress($primary_id,$data)
	{

		$result = $this->index($primary_id);

		if ($result->count() > 0) {
			$delete_phone =  $this->deletWhere('contactinfo_id',$primary_id);
		}

		$save = [];
		foreach ($data['phone'] as $key =>  $value) {
            if($value != ''){
               $save = $this->model->create([
               	'contactinfo_id'=>$primary_id,
               	'phone'=>$value
               ]);
            }
        }
        return $save;
	}

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return "App\ContactInfoPhone";
    }
}