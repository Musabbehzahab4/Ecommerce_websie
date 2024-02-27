<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class Product_size extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    // protected $fillable = ['size_id', 'product_id'];

    public function size()
    {
        return $this->belongsTo(Size::class,'size_id');
    }
}
