<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSeo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
