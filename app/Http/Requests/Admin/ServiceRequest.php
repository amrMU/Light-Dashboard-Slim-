<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Validation\Rule;


class ServiceRequest extends FormRequest
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
               return array(
                'name_ar'=>'required',
                'icon'=>'required|mimes:jpeg,jpg,png|max:2000',
                );
           }
           case 'PUT':
           {
               return array(
                'name_ar'=>'required',
               'icon'=>'mimes:jpeg,jpg,png|max:2000',
                   );
           }
           case 'PATCH':

       }
    }
}
