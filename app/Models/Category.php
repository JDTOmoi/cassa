<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['category_name'];

    public function pcs(): HasMany{
        return $this->hasMany(ProdCata::class, 'id', 'id');
    }
}
