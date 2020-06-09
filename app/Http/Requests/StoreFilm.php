<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilm extends FormRequest
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
            'name' => 'required|max:100',
            'description' => 'required',
            'release_date' => 'required|date',
            'rating' => 'required|between:0,5',
            'ticket_price' => 'required|integer',
            'country' => 'required',
            'genre' => 'required|array',
            'photo' => 'required|mimes:jpeg,jpg,bmp,png,PNG'
        ];
    }
}
