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

    protected $casts = [
        'sku_code' => 'integer',
        'published' => 'boolean',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', '=', true);
        });
    }

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function productSet(): BelongsToMany
    {
        return $this->belongsToMany(ProductSet::class);
    }

    public function scopePublished($query): Builder
    {
        return $query->where('published', '=', true);
    }
}
