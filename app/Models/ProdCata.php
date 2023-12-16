<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCata extends Model
{
    use HasFactory;

    protected $fillable = ['products_id', 'category_id'];

    public function produk(): BelongsTo{
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
