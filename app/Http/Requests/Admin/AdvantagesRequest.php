<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdvantagesRequest extends FormRequest
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
                'title_ar'=>'required',
                'title_en'=>'required',
                'icon'=>'required|mimes:jpg,jpeg,bmp,png',
            );
         }
         case 'PUT':
         {
             return array(
                  'title_ar'=>'required',
                'title_en'=>'required',
                'icon'=>'mimes:jpg,jpeg,bmp,png',
            );
         }
         case 'PATCH':

     }
    }
}
