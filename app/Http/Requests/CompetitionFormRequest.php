<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitionFormRequest extends FormRequest
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
            'competition_image' => 'required|mimes:jpeg,jpg,bmp,png'
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
            'competition_image.required' => 'Slika je obavezna',
            'competition_image.mimes' => 'Dozvoljeni formati: jpeg,jpg,bmp,png'
        ];
    }
}
