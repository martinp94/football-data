<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaFormRequest extends FormRequest
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
        return [
            'country_name' => 'required|min:2|max:25',
            'country_code' => 'required|min:3|max:4',
            'country_area' => 'required',
            'country_flag' => 'mimes:jpeg,jpg,bmp,png'
        ];
    }

    /**

     * Get the error messages for the defined validation rules.

     *

     * @return array

     */

    public function messages()
    {
        return [
            'country_name.required' => 'Naziv države mora biti unijet',
            'country_name.min' => 'Naziv države mora biti dugacak minimalno 2 karaktera',
            'country_name.max' => 'Naziv države mora biti kraći od 25 karaktera',

            'country_code.required' => 'Kod države mora biti unijet',
            'country_code.min' => 'Kod države mora biti dugacak minimalno 3 karaktera',
            'country_code.max' => 'Kod države mora biti kraći od 5 karaktera',

            'country_area.required' => 'Oblast države mora biti unijeta',

            'country_flag.mimes' => 'Dozvoljeni formati: jpeg,jpg,bmp,png',
        ];
    }

}
