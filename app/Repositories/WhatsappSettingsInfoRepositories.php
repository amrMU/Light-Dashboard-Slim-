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
	* Get Phone with   
	* primary info    
	* @param $primary_id 		 
	*
    ** @auther Amr Muhamed <amrmuhamed9@gmail.com>
     * @return $info
	*/
	public function index($primary_id)
	{
		$info = $this->findWhere(['contactinfo_id'=>$primary_id],['*']);
		return $info;
	}

	/**
	* Function make decision
	* for save all whatsapp related with  
	* main settings 			      	 
	* @param $primary_id 		 		  	 
	* @param $data 		 		      	 
	*
    * @auther Amr Muhamed <amrmuhamed9@gmail.com>
    * @return $save
    **/
	public function GetProgress($primary_id,$data)
	{
		$result = $this->index($primary_id);
		if ($result->count() > 0) {
			$delete_whatsapp =  $this->deletWhere('contactinfo_id',$primary_id);
		}

		$save = [];
		foreach ($data['whatsapp'] as $key =>  $value) {
            if($value != ''){
               $save = $this->model->create([
               	'contactinfo_id'=>$primary_id,
               	'whatsapp'=>$value
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
        return "App\ContactInfoWhatsapp";
    }
}