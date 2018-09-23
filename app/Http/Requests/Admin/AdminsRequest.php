<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
             return array();
         }
         case 'POST':
         {
             return [
             'email'=>'required|email',
             'name'=>'required',
             'phone'=>'required|numeric',
             'password'=>'required|min:8'
             ];
         }
         case 'PUT':
         {
             return [
             'email'=>'required|email',
             'name'=>'required',
             'phone'=>'numeric',
             'password'=>'min:8'
             ];
         }
         case 'PATCH':

     }

        
    }
}
