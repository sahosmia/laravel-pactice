<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'status'    => 'boolean',
        ];
    }
}
