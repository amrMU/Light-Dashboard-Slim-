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

use Illuminate\Support\Facades\Input;

class SettingsRepositories extends Repository
{

    /*
    *****************
    * Count Check   *
    *****************
    */
    public function check()
    {
      return $this->all()->count();
    }

    /*
    ***************************
    * Function make decision  *
    * if create new or make   *
    *       update  only      *
    ***************************
    */
    public function progress($data)
    {   
        
        $count =  $this->check();

        if ($count > 0 ) {
            $info = $this->findByFirst(['*']);
           return $this->save($info->id,$data);
        }else{
           return $this->store($data);
        }
       
    }

    /*
    ***************************
    * Function make order     *
    *    to create new        *
    ***************************
    */
    public function store( $data)
    {
        $info  = $this->create($data);

        if (Input::hasFile('logo')) {
           $file = Input::hasFile('logo');
           $upload = $this->logo($id,$file);
        }
        return $this->findByFirst(['*'])->with('whatsapp','phone');
    }

    /*
    *****************************
    *    Function make order    *
    *    to update information  *
    *    @Param $id             *
    *    @Param $data =[]       *
    *****************************
    */
    public function save($id,$data)
    {
        $info  = $this->update($data,$id,'id');

        if (Input::hasFile('logo')) {
           $file = Input::file('logo');
           $upload = $this->logo($id,$file);
        }
        return $this->findByFirst(['*'])->with('whatsapp','phone');

    }

    /*
    ************
    * Set Logo *
    ************
    */
    public function logo($id,$file)
    {
        $time = time();
        $ext  =Input::file('logo')->getClientOriginalExtension();
        $fullname = $time . '.' . $ext;
       $move =  Input::file('logo')->move(public_path() .'/uploads/images/logo', $fullname);
        // dd($move);
        $path ='/uploads/images/logo';

        $this->attributes['logo'] =$path.'/'.$fullname;
        $this->update(['logo'=>$this->attributes['logo']],$id,'id');
        // dd($this->findByFirst(['*']));
        // return "OK";
    }
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return "App\ContactUsSetting";
    }
}