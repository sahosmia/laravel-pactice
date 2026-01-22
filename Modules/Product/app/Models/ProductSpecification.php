<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSpecification extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'spec_key',
        'spec_value',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
