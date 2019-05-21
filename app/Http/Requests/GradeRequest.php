<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GradeRequest extends FormRequest
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
            'g1st' => 'min:0|max:100|numeric|nullable',
            'g2nd' => 'min:0|max:100|numeric|nullable',
            'g3rd' => 'min:0|max:100|numeric|nullable',
            'g4th' => 'min:0|max:100|numeric|nullable',
        ];
    }
}
