<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['brand_name'];

    public function ProdukBrand():HasMany{
        return $this->hasMany(Produk::class,'brand','id');
    }
}
