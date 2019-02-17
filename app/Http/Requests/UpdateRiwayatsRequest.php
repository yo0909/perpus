<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRiwayatsRequest extends StoreRiwayatsRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }
}