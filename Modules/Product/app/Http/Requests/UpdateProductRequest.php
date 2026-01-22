<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'              => 'sometimes|required|string|max:255',
            'sku'               => 'sometimes|required|string|unique:products,sku,' . $this->route('product'),
            'category_id'       => 'sometimes|required|exists:categories,id',
            'brand_id'          => 'nullable|exists:brands,id',
            'short_description' => 'nullable|string',
            'description'       => 'sometimes|required|string',
            'price'             => 'sometimes|required|numeric|min:0',
            'discount_value'    => 'nullable|numeric|min:0',
            'discount_type'     => 'nullable|in:fixed,percentage',
            'stock_qty'         => 'sometimes|required|integer|min:0',
            'status'            => 'boolean',
            'is_featured'       => 'boolean',

            // Related data validation
            'images'                   => 'nullable|array',
            'images.*.image'           => 'required|string',
            'images.*.is_thumbnail'    => 'boolean',
            'seo'                      => 'nullable|array',
            'seo.meta_title'           => 'nullable|string|max:255',
            'seo.meta_description'     => 'nullable|string',
            'seo.meta_keywords'        => 'nullable|string',
            'specifications'           => 'nullable|array',
            'specifications.*.spec_key'   => 'required|string',
            'specifications.*.spec_value' => 'required|string',
            'tag_ids'                  => 'nullable|array',
            'tag_ids.*'                => 'exists:tags,id',
        ];
    }
}
