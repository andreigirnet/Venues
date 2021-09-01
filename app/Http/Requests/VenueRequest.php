<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenueRequest extends FormRequest
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
            'name'=>['required', 'max:25'],
            'slug'=>['required', 'max:25'],
            'address'=>['required', 'max:50'],
            'people_minimum'=>['required', 'integer'],
            'people_maximum'=>['required', 'integer'],
            'description'=>['required','min:5'],
            'price_per_hour'=>['required',],
            'location_id'=>['required']
        ];
    }
}
