<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProviderRequest extends FormRequest
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
        $provider = $this->segment(2);
        return [
            'name' => 'required|unique:providers,name,' .$provider,
            'description' => 'required|min:15',
        ];
    }
}
