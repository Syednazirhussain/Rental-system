<?php

namespace App\Http\Requests\Company\Conference;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Equipments;

class CreateEquipmentsRequest extends FormRequest
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
        return Equipments::$rules;
    }
}
