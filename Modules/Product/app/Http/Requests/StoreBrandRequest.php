<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'logo'   => 'nullable|string',
            'status' => 'boolean',
        ];
    }
}
