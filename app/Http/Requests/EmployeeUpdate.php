<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeUpdate extends Request
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
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:80',
            'email' => 'unique:employees,email,'.$this->employee->email.',email',
            'phone' => 'string|max:50',
            'avatar' => 'file|image|mimes:jpeg,jpg,gif,png|max:1024|dimensions:min_width=150,min_height=150',
        ];
    }
}
