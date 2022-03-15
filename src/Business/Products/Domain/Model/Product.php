<?php

namespace Products\Domain\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Products\Infrastructure\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const PRODUCT_TYPES = [
        'device',
        'service',
    ];

    public const PRODUCT_CONDITIONS = [
        'new',
        'used',
        'refurbished',
    ];

    protected $fillable = [
        'sku_code',
        'name',
        'type',
        'condition',
        'description_title',
        'description_text',
        'price',
        'published',
    ];

    protected $casts = [
        'sku_code' => 'integer',
        'published' => 'boolean',
        'price' => 'float',
    ];

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function productSet(): BelongsToMany
    {
        return $this->belongsToMany(ProductSet::class);
    }
}
