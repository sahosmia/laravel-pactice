<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rating'  => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'status'  => 'sometimes|required|in:pending,approved',
        ];
    }
}
