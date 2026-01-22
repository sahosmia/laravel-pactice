<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'   => 'sometimes|required|string|max:255',
            'logo'   => 'nullable|string',
            'status' => 'boolean',
        ];
    }
}
