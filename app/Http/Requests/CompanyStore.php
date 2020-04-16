<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyStore extends Request
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
            'name' => 'required|string|max:256',
            'email' => 'unique:companies',
            'website' => 'string|max:256',
            'logo' => 'file|image|mimes:jpeg,jpg,gif,png|max:1024|dimensions:min_width=100,min_height=100',
        ];
    }
}
