<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
                'name'=>'required|min:30',
                'email'=>'required|email',
                'message'=>'required|min:150',

            );
           }
           case 'PUT':
           {
            return array(
                
            );
           }
           case 'PATCH':

       }
    }
}
