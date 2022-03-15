<?php

namespace Products\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Products\Infrastructure\Factories\ProductSetFactory;

class ProductSet extends Model
{
    use HasFactory;

    protected static function newFactory(): ProductSetFactory
    {
        return new ProductSetFactory();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_product_set', 'product_set_id', 'product_id')
            ->withoutGlobalScope('published');
    }
}
